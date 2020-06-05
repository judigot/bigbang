<?php

require dirname(__DIR__) . '/Classes/Database.php';

require dirname(__DIR__) . '/Utilities/SecurityUtility.php';

use App\Classes\Database;

/**************************************************
 *                     CREATE                     */

if (isset($_POST['create'])) {
    if ($_POST['create'] == "insertUser") {
        $Data = array();
        $Result = Database::read("SELECT COUNT(*) FROM `$app_user` WHERE `email`='{$_POST['data']["email"]}'");
        if ($Result[0]["COUNT(*)"] == "0") {
            $lastName = $_POST["data"]["lastName"];
            $columns = array("first_name", "last_name", "email", "password", "birthdate", "gender", "address", "user_type");
            $data = array(ucwords($_POST["data"]["firstName"]), ucwords($_POST["data"]["lastName"]), $_POST["data"]["email"], hashPassword($_POST["data"]["password"]), null, null, null, "standard");
            Database::create($app_user, $columns, $data);
            $_SESSION["userEmail"] = $_POST["data"]["email"];
            array_push($Data, 0);
        } else if ($Result[0]["COUNT(*)"] == "1") {
            array_push($Data, 1);
        }
        echo json_encode($Data);
    }
}

/*                     CREATE                     */
/**************************************************/

/**************************************************
 *                     READ                     */

if (isset($_POST['read'])) {
    if ($_POST['read'] == "authenticateUser") {
        $Result = Database::read("SELECT * FROM $app_user WHERE `email`='{$_POST["data"]["email"]}'");
        if (!empty($Result)) {
            $Data = array();
            if (verifyPassword($_POST["data"]["password"], $Result[0]["password"])) {
                $_SESSION["user"] = array("user_id" => $Result[0]["user_id"], "first_name" => $Result[0]["first_name"], "last_name" => $Result[0]["last_name"], "email" => $Result[0]["email"], "password" => $Result[0]["password"], "birthdate" => $Result[0]["birthdate"], "gender" => $Result[0]["gender"], "address" => $Result[0]["address"], "user_type" => $Result[0]["user_type"]);
                $_SESSION["userEmail"] = $_SESSION["user"]["email"];
                $Data[] = 0;
            } else {
                $Data[] = 1;
            }
            $Data[] = $Result[0]["first_name"];
        } else {
            $Data[] = "null";
        }
        echo json_encode($Data);
    }

    if ($_POST['read'] == "logoutUser") {
        unset($_SESSION["user"]);
    }
}

/*                     READ                     */
/**************************************************/
