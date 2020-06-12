<?php

$appInfoFilename = "app.json";
$jsonPath = dirname(__DIR__) . "/Environment/$appInfoFilename";
$appInfo = json_decode(file_get_contents($jsonPath), true);

//============================================================//

/************
 * APP INFO *
 ************/

$app_name = $appInfo["appName"];
$app_id = $appInfo["appId"];

/*****************
 * DATABASE INFO *
 *****************/

// Connection
$DatabaseName = $appInfo["database"][0];
$Host = $appInfo["host"];
$Username = $appInfo["username"];
$Password = $appInfo["password"];

// Tables
$app_user = $appInfo["table"][0];
