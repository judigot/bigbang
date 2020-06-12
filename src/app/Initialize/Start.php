<?php

$tester = file_get_contents(dirname(__DIR__) . '/Initialize/Tester.php');

if ($tester) {
    require dirname(__DIR__) . '/Initialize/Tester.php';
    exit;
}

session_status() == PHP_SESSION_NONE ? session_start() : false;

if (!isset($_SESSION["app_key"])) {
    $_SESSION["app_key"] = "appKey";
}

require dirname(__DIR__) . '/Initialize/Htaccess.php';

require dirname(__DIR__) . '/Initialize/Routes.php';

require dirname(__DIR__) . '/Initialize/Autoload.php';

require dirname(__DIR__) . '/Environment/Environment.php';

ob_start();
