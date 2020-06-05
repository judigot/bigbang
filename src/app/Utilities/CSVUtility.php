<?php

function downloadCSV($fileName, $Data, $rowCount, $includeColumnNames)
{
    if ($rowCount) {
        $Data = resetRowCount($Data, 0);
    }
    if ($includeColumnNames) {
        // Insert Column Names into the Array ($Data)
        array_unshift($Data, array_keys($Data[0]));
    }
    createFile(true, $Data, null, $fileName ? $fileName : "Untitled", "csv");
}

function exportCSV($fileName, $Data, $rowCount, $includeColumnNames)
{
    if ($rowCount) {
        $Data = resetRowCount($Data, 0);
    }
    if ($includeColumnNames) {
        // Insert Column Names into the Array ($Data)
        array_unshift($Data, array_keys($Data[0]));
    }
    $Path = getenv("HOMEDRIVE") . getenv("HOMEPATH") . "/Desktop/";
    createFile(false, $Data, $Path, $fileName ? $fileName : "Untitled", "csv");
}
