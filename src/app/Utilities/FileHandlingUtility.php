<?php

function createFile($isDownloadable, $Content, $Location, $FileName, $FileType)
{
    $FileType = strtolower($FileType);
    if ($isDownloadable == true) {
        header("Content-type: application/$FileType");
        header("Content-disposition: attachment; filename=$FileName.$FileType");
        $File = fopen('php://output', 'w');
    } else {
        $File = fopen("$Location\\$FileName.$FileType", 'w');
    }

    switch ($FileType) {
        case "csv":
            foreach ($Content as $Value) {
                //MySQL Data to CSV
                fputcsv($File, $Value);
                //Array Data to CSV
                //fputcsv($File,explode(',',$Value));
            }
            break;
    }
    fclose($File);
}

function getDirectoryItems($root)
{
    $tree = getDirectoryTree($root);
    $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($tree));
    $items = [];
    foreach ($iterator as $file) {
        if ($file) {
            $items[] = $file;
        }
    }
    return $items;
}

function getDirectoryTree($root)
{
    $tree = [];
    if (is_dir($root)) {
        $branches = scandir($root);
        foreach ($branches as $branch) {
            if ($branch != '.' && $branch != '..') {
                if (is_dir("$root/$branch")) {
                    $leaf = array("folder" => "$root/$branch");
                    if (getDirectoryTree("$root/$branch")) {
                        $leaf['subfolders'] = getDirectoryTree("$root/$branch");
                    }
                    $tree[] = $leaf;
                }
            }
        }
    }
    return $tree ? $tree : false;
}
