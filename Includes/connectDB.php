<?php

    require_once (dirname(__FILE__)."/../Functions/database.php");



    // Create database connection
    $databaseConnection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $databaseConnection->set_charset("utf8");
    if ($databaseConnection->connect_error)
    {
        die("Database selection failed: " . $databaseConnection->connect_error);
    }

    // Create tables if needed.
    prep_DB_content();
?>
