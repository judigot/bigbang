<?php

$current_page = basename($_SERVER['PHP_SELF'], '.php');

$page_title;

/***************************
 * PAGE TITLE DECLARATIONS *
 ***************************/

switch ($current_page) {
    case 'index':
        $page_title = "$app_name";
        break;

    case 'login':
        $page_title = "Log in to $app_name - $app_name";
        break;

    case 'signup':
        $page_title = "Sign up for $app_name - $app_name";
        break;

    case 'theme':
        $page_title = "Color Theme - $app_name";
        break;

    case 'home':
        $page_title = "Home - $app_name";
        break;

    case 'print':
        $page_title = "Print - $app_name";
        break;

    default:
        $page_title = "Untitled page!";
}
?>
<title><?php echo $page_title; ?></title>