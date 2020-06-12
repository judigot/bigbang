<?php

require dirname(__DIR__) . '/Initialize/Htaccess.php';

require dirname(__DIR__) . '/Initialize/Session.php';

require dirname(__DIR__) . '/Initialize/Routes.php';

require dirname(__DIR__) . '/Initialize/Autoload.php';

require dirname(__DIR__) . '/Environment/Environment.php';

/***************
 * CODE TESTER *
 ***************/

$tester = file_get_contents(dirname(__DIR__) . '/Initialize/Tester.php');
if ($tester) {
    require dirname(__DIR__) . '/Initialize/Tester.php';
    exit;
}

ob_start();
