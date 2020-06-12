<?php

namespace App\Classes;

use PDO;
use PDOException;

class Database
{

    public static function create($tableName, $columnNames, $data)
    {
        $connection = self::connect();
        $columns = "";
        $values = "";
        if (is_array($columnNames)) {
            $columnNames = array_map(function ($value) {
                return "`$value`";
            }, $columnNames);
            $columns = " (" . implode(", ", $columnNames) . ")";
        }
        if (!is_array($data[0])) {
            $data = array_map(function ($value) use ($connection) {
                return $value != null ? $connection->quote($value) : "NULL";
            }, $data);
            $values = "(" . implode(", ", $data) . ")";
        } else {
            $arrayIndex = array();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i] = array_map(function ($value) use ($connection) {
                    return $value != null ? $connection->quote($value) : "NULL";
                }, $data[$i]);
                array_push($arrayIndex, implode(", ", $data[$i]));
            }
            $values = "(" . implode("), (", $arrayIndex) . ")";
        }
        $sql = "INSERT INTO `$tableName`$columns VALUES $values;";
        self::execute($sql);
        self::dump();
    }

    public static function read($sql)
    {
        $result = self::execute($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function update($tableName, $targetColumn, $newValue, $referenceColumn, $referenceValue)
    {
        $connection = self::connect();
        if ($newValue != null) {
            $newValue = $connection->quote($newValue);
        } else {
            $newValue = "NULL";
        }
        if ($referenceColumn == null) {
            $sql = "UPDATE `$tableName` SET `$targetColumn` = $newValue;";
        } else {
            $reference = $referenceValue;
            // Check if new  value is array
            if (is_array($referenceValue)) {
                // Check if array is associative
                if (!count(array_filter(array_keys($referenceValue), 'is_string')) > 0) {
                    $keys = array_keys($reference[0]);
                    $reference = array_map(function ($value) use ($keys) {
                        return $value[$keys[0]];
                    }, $reference);
                    $reference = "'" . implode("', '", $reference) . "'";
                    $conditions = array_map(function ($condition) use ($keys, $referenceColumn, $referenceValue) {
                        return "WHEN `$referenceColumn` = '" . $condition[$keys[0]] . "' THEN '" . $condition[$keys[1]] . "'";
                    }, $referenceValue);
                    $newValue = "CASE " . implode(" ", $conditions) . " END";
                } else {
                    $reference = "'" . implode("', '", $referenceValue) . "'";
                }
            }

            $sql = "UPDATE `$tableName` SET `$targetColumn` = $newValue WHERE `$tableName`.`$referenceColumn` IN ($reference);";
        }
        self::execute($sql);
        self::dump();
    }

    public static function delete($tableName, $referenceColumn, $referenceValue)
    {
        $reference = is_array($referenceValue) ? implode("', '", $referenceValue) : $referenceValue;
        $sql = "DELETE FROM `" . $tableName . "` WHERE `" . $referenceColumn . "` IN ('$reference');";

        $preparedStatement = self::execute($sql);
        self::dump();
        return $preparedStatement->rowCount();
    }

    public static function execute($sql)
    {
        $connection = self::connect();
        $preparedStatement = $connection->prepare($sql);
        $preparedStatement->execute();
        self::disconnect($connection);
        return $preparedStatement;
    }

    public static function duplicate($tableName, $referenceColumn, $referenceValue, $incrementColumn, $incrementString)
    {
        $sql = "CREATE TEMPORARY TABLE `temp` SELECT * FROM `{$tableName}` WHERE `{$referenceColumn}` = '{$referenceValue}';
		SELECT @newPK := (SELECT `{$referenceColumn}` FROM `{$tableName}` ORDER BY `{$referenceColumn}` DESC LIMIT 1)+1, @oldValue := (SELECT `{$incrementColumn}` FROM `{$tableName}` WHERE `{$referenceColumn}` = '{$referenceValue}');
                UPDATE `temp` SET `{$referenceColumn}`=@newPK, `{$incrementColumn}`=CONCAT('{$incrementString}', @oldValue) WHERE `{$referenceColumn}` = '{$referenceValue}';
                INSERT INTO `{$tableName}` SELECT * FROM `temp` WHERE `{$referenceColumn}`=@newPK;";
        self::execute($sql);
        self::dump();
    }

    public static function getCredentials()
    {
        $dbInfoFileName = "app.json";
        $jsonPath = dirname(__DIR__) . "/Environment/$dbInfoFileName";
        $dbinfo = json_decode(file_get_contents($jsonPath), true);

        return $dbinfo;
    }

    public static function connect()
    {
        $dbinfo = self::getCredentials();

        $databaseName = $dbinfo["database"][0];
        $host = $dbinfo["host"];
        $username = $dbinfo["username"];
        $password = $dbinfo["password"];

        $connection = null;

        try {
            $connection = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password, [PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
            return $connection;
        } catch (PDOException $exception) {
            throw $exception;
        }
    }

    public static function disconnect($connection)
    {
        $connection = null;
    }

    public static function dump()
    {
        $dbinfo = self::getCredentials();

        $databases = $dbinfo["database"];
        $username = $dbinfo["username"];
        $password = $dbinfo["password"];
        $appName = $dbinfo["appName"];
        $mysqlPath = $dbinfo["mysqlPath"];

        date_default_timezone_set("Asia/Manila");

        $msqlBinDirectory = str_replace(chr(92), "/", $mysqlPath);
        $outputDirectory = dirname(dirname(__DIR__)) . "\storage\mysql\backups"; // storage/mysql/backups

        $datetime = date("F j, Y") . " - " . "(" . date("g-i-s A") . ")";
        $filename = "$appName $datetime.sql";

        /*********************
         * DELETE OLD BACKUP *
         *********************/
        array_map("unlink", glob("$outputDirectory\*"));

        chdir($msqlBinDirectory);
        system("mysqldump --user=$username --password=$password --databases " . implode(" ", $databases) . " > \"$outputDirectory\\$filename\"");
    }

    public static function unionBuilder($iterator, $tableDetails)
    {
        /**************
         * SAMPLE USE *
         **************
        $table_name = "app_order";
        $iterator = ["January", "February"];
        $tableDetails = [
            "Month" => $iterator,
            "Week 1" => "SELECT 'Week 1 Data' AS `%s` from `$table_name`",
            "Week 2" => function () use ($table_name) {
                return [
                    "query" => "SELECT 'Week 1 Data' AS `%s` from `$table_name`",
                    "where" => "`iterator` = '%s'", // str_pad converts the iterator to string
                    "iterator" => true
                ];
            }
        ];
        $sql = unionBuilder($iterator, $tableDetails);
         */
        $sql = "";
        $monthsData = [];
        $columnNames = array_keys($tableDetails);
        for ($i = 0; $i < count($iterator); $i++) {
            $sql = "SELECT '$iterator[$i]' AS `" . implode("`, `", $columnNames) . "` FROM ";
            for ($j = 0; $j < count($tableDetails); $j++) {
                if ($j !== 0) {
                    $columnName = $columnNames[$j];
                    $columnQuery = $tableDetails[$columnName];
                    $iteratorIndex = str_pad($i + 1, 2, "0", STR_PAD_LEFT); // Add leading zeros
                    $where = null;

                    if (is_string($columnQuery)) {
                        $formattedQuery = sprintf($columnQuery, $columnName);
                    } else {
                        $formattedQuery = sprintf($columnQuery()["query"], $columnName);
                        if (array_key_exists("where", $columnQuery()) || $columnQuery()["where"]) {
                            if (array_key_exists("iterator", $columnQuery())) {
                                $where = sprintf($columnQuery()["where"], $iteratorIndex);
                            } else {
                                $where = $columnQuery()["where"];
                            }
                        }
                    }

                    if ($where) {
                        $formattedQuery .= " WHERE $where";
                    }
                    $sql .= "($formattedQuery) AS `$columnName`, ";
                }
            }
            $monthsData[] = substr($sql, 0, -2);
        }
        $sql = implode(" UNION ", $monthsData) . ";";
        return $sql;
    }
}
