<?php

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $connectstr_dbname);
/** MySQL database username */
define('DB_USER', $connectstr_dbusername);
/** MySQL database password */
define('DB_PASSWORD', $connectstr_dbpassword);
/** MySQL hostname */
define('DB_HOST', $connectstr_dbhost);


//Admin User 
define('DEFAULT_ADMIN_USERNAME', getenv('SITE_ADMIN_USER'));
define('DEFAULT_ADMIN_PASSWORD', getenv('SITE_ADMIN_PASSWORD'));

?>
