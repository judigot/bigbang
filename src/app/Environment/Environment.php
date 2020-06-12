<?php

$appInfoFilename = "app.json";
$jsonPath = dirname(__DIR__) . "/Environment/$appInfoFilename";
$appInfo = json_decode(file_get_contents($jsonPath), true);

$app_name = $appInfo["appName"];
$app_id = $appInfo["appId"];

$DatabaseName = $appInfo["database"][0];
$Host = $appInfo["host"];
$Username = $appInfo["username"];
$Password = $appInfo["password"];

$app_user = $appInfo["table"][0];
