<?php

function login($Connection, $userTable, $accountName, $accountPassword)
{
    require 'Database.php';
    $Result = Database::read($Connection, "SELECT * FROM $userTable WHERE `email` = '$accountName'");
    if (!empty($Result)) {
        $Data = array();
        if (verifyPassword($accountPassword, $Result[0]["password"])) {
            $Data[] = 0;
        } else {
            $Data[] = 1;
        }
        array_push($Data, $Result);
    } else {
        $Data[] = "null";
    }
    return $Data;
}

function verifyPassword($password, $hash)
{
    return password_verify($password, $hash);
}

function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function getMACAddress()
{
    ob_start();
    system('getmac');
    $MACAddress = ob_get_contents();
    ob_clean();
    return substr($MACAddress, strpos($MACAddress, '\\') - 20, 17);
}

function verifyUser($filePath)
{
    $jsonPath = (file_exists($filePath)) ? $filePath : $filePath;
    $json = json_decode(file_get_contents($jsonPath), true);
    $licenseKey = getMACAddress();
    $isVerified;
    if (array_key_exists("licenseKey", $json)) {
        if (is_array($json["licenseKey"])) {
            for ($i = 0; $i < count($json["licenseKey"]); $i++) {
                if (verifyPassword($licenseKey, $json["licenseKey"][$i])) {
                    $isVerified = true;
                    break;
                } else {
                    $isVerified = false;
                }
            }
        } else {
            $isVerified = verifyPassword($licenseKey, $json["licenseKey"]);
        }
    } else {
        $json["licenseKey"] = hashPassword($licenseKey);
        $fp = fopen($filePath, "wb");
        fwrite($fp, json_encode($json));
        $isVerified = true;
    }
    return $isVerified;
}

function verifyUserRemote($filePath)
{
    $filePath = "https://raw.githubusercontent.com/judigot/main/master/data.json";
    $jsonPath = (file_exists($filePath)) ? $filePath : $filePath;
    $json = json_decode(file_get_contents($jsonPath), true);
    $allowed = $json["users"]["igot"];
    return in_array(getMACAddress(), $allowed);
}
