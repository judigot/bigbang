<?php

$root_path = $_SERVER['DOCUMENT_ROOT'];

$project_path = str_replace(chr(92), "/", getcwd());

$base_path = str_replace($root_path, "", $project_path);

ob_start();
?>
RewriteEngine on
#========================================DEFAULT========================================#
#NC makes the rule non case sensitive
#L makes this the last rule that this specific condition will match

#Secure .htaccess file
<Files .htaccess>
    Order allow,deny
    Deny from all
</Files>

#Deny access to file types
#<FilesMatch "\.(css|js|txt)">
    # Order allow,deny
    # Deny from all
    #</FilesMatch>
<FilesMatch "app.(json)">
    Order allow,deny
    Deny from all
</FilesMatch>

#Remove server signature
ServerSignature Off

#Unlist all file types from index
IndexIgnore *

#Parse custom file type
AddType application/x-httpd-php .sample

#====================PHP Values====================#
php_value date.timezone "Asia/Manila"
php_value post_max_size 20M
php_value max_file_uploads 20M
php_value upload_max_filesize 20M
#====================PHP Values====================#

#====================Error Pages====================#
ErrorDocument 400 <?php echo "$base_path/error_pages/error.php" ?>

ErrorDocument 401 <?php echo "$base_path/error_pages/error.php" ?>

ErrorDocument 403 <?php echo "$base_path/error_pages/error.php" ?>

ErrorDocument 404 <?php echo "$base_path/error_pages/error.php" ?>

ErrorDocument 504 <?php echo "$base_path/error_pages/error.php" ?>

#====================Error Pages====================#

#Remove .php extension
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^\.]+)$ $1.php [NC,L]

#Clean URL variables
#RewriteRule ^page/([a-zA-Z0-9_-]+) page.php?var1=$1 [NC,L]
#RewriteRule ^page/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+) page.php?var1=$1&var2=$2 [NC,L]

#========================================DEFAULT========================================#

#---Set Landing Page---#
#DirectoryIndex example.php

#Redirect Irrelevant URL to index.php
#RewriteRule ^([0-9a-zA-Z_-]+)$ index.php

#Unlist Folders/Files
#IndexIgnore *
#IndexIgnore nbproject

#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteRule ^(.*/([a-zA-Z0-9_-]+)|([a-zA-Z0-9_-]+))$ profile.php?username=$1 [L]

#Redirect any string to check.php
#RewriteRule ^exampleString check.php [NC,L]

#Rewrite for user.php?u=xxxx
#RewriteRule ^([0-9a-zA-Z]+) index.php?user=$1 [NC,L]

#Rewrite for article.php?id=1&title=Title-Goes-Here
RewriteRule ^article/([0-9]+)/([0-9a-zA-Z_-]+) article.php?id=$1&title=$2 [NC,L]

#Allow number variables only
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteRule ^([0-9]+)$ profile.php?idNumber=$1 [L]

RewriteRule ^home/([a-zA-Z0-9_-]+) home.php?content=$1 [NC,L]

<?php

$createFile = false;

$htaccess = ob_get_clean();

if (file_exists(".htaccess")) {
    $content = file_get_contents(".htaccess");

    if (strcmp($htaccess, $content)) {

        $createFile = true;
    }
} else {

    $createFile = true;
}

if ($createFile) {

    $fp = fopen(".htaccess", "wb");

    fwrite($fp, $htaccess);
}
