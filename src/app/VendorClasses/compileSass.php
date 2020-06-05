<?php

require "scssphp-master/scss.inc.php";

use Leafo\ScssPhp\Compiler;

$css_directory = "./css";
$sass_directory = "./sass";

$css_files;
$scss_files = glob("$sass_directory/*.scss");

$scss = new Compiler();
$scss->addImportPath(function () use ($scss_files) {
    for ($i = 0; $i < count($scss_files); $i++) {
        return $scss_files[$i];
    }
});

if (!file_exists($css_directory)) {
    mkdir($css_directory);
}

for ($i = 0; $i < count($scss_files); $i++) {
    $current_file = pathinfo($scss_files[$i])["filename"];
    $sass_content = $scss->compile(file_get_contents("$sass_directory/" . $current_file . ".scss"));
    if (($current_file[0] !== "_") && (!file_exists("$css_directory/$current_file" . ".css")) || (file_exists("$css_directory/$current_file" . ".css") && (strcmp(file_get_contents("$css_directory/$current_file.css"), $sass_content) !== 0))) {
        $fp = fopen("$css_directory/$current_file.css", "wb");
        fwrite($fp, $sass_content);
    }
}
