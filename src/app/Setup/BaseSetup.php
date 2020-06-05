<?php

$root_path = $_SERVER['DOCUMENT_ROOT'];

$project_path = str_replace(chr(92), "/", getcwd());

$base_path = str_replace($root_path, "", $project_path) . "/";

?>

<base href="<?php echo $base_path; ?>">