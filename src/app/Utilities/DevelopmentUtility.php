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