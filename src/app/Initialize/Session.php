<?php

session_status() == PHP_SESSION_NONE ? session_start() : false;

if (!isset($_SESSION["app_key"])) {
    $_SESSION["app_key"] = "appKey";
}
