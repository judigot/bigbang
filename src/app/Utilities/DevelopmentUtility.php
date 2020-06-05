<?php

function logString($content)
{
    $outputLocation = dirname(dirname(__DIR__)) . "\storage\logs\\"; // storage/mysql/backups
    $fp = fopen($outputLocation . "log.txt", "wb");
    fwrite($fp, $content);
}

// function log($content)
// {
//     $outputLocation = "C:/Users/" . getenv("USERNAME") . "/Desktop/";
//     $fp = fopen($outputLocation . "Log.txt", "wb");
//     fwrite($fp, $content);
// }

function logLegacy($content, $outputLocation)
{
    if ($outputLocation != null && file_exists($outputLocation)) {
        $outputLocation = str_replace(chr(92), "/", $outputLocation);
        if (substr($outputLocation, -1) != "/") {
            $outputLocation .= "/";
        }
    } else if ($outputLocation == "current") {
        $outputLocation = "";
    } else {
        $outputLocation = "C:/Users/" . getenv("USERNAME") . "/Desktop/";
    }
    $fp = fopen($outputLocation . "Log.txt", "wb");
    fwrite($fp, $content);
}
