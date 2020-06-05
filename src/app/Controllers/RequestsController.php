<?php

require dirname(__DIR__) . '/Environment/Environment.php';

if ($_GET || $_POST || $_FILES) {
    try {
        
        session_status() == PHP_SESSION_NONE ? session_start() : false;

        require 'AuthenticationController.php';
    } catch (Exception $exception) {
        throw $exception;
    }
} else {
    header("Location: ..");
}
