<?php

$current_page = basename($_SERVER["PHP_SELF"], '.php');

$project_root = str_replace($_SERVER["DOCUMENT_ROOT"], "", str_replace(chr(92), "/", getcwd()));


$auth_pages = ['home'];
$shared_pages = ['sharedPage'];


/******************
 * REDIRECT PAGES */
$auth_redirect = $auth_pages[0];
$unauth_redirect = "login";
/* REDIRECT PAGES *
 ******************/


if (in_array($current_page, $shared_pages) || in_array($current_page, $auth_pages)) {
    if (in_array($current_page, $auth_pages) && !in_array($current_page, $shared_pages)) {
        /*****************************
         * NOT AUTHENTICATED LANDING *
         *****************************/
        if (!isset($_SESSION[$app_id])) {
            header("Location: $project_root/$unauth_redirect");
        }
    }
} else {
    if (isset($_SESSION[$app_id])) {
        /*************************
         * AUTHENTICATED LANDING *
         *************************/
        header("Location: $project_root/$auth_redirect");
    }
}
