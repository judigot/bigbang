<?php

$dbInfoFileName = "app.json";
$jsonPath = dirname(__DIR__) . "/Environment/$dbInfoFileName";
$dbinfo = json_decode(file_get_contents($jsonPath), true);

$app_name = $dbinfo["appName"];

$DatabaseName = $dbinfo["database"][0];
$Host = $dbinfo["host"];
$Username = $dbinfo["username"];
$Password = $dbinfo["password"];

$app_user = $dbinfo["table"][0];
