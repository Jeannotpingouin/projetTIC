<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$nomSyndic = $databaseConnection->real_escape_string($_POST['search_nomSyndic']);
	$emailSyndic = $databaseConnection->real_escape_string($_POST['search_emailSyndic']);

	$syndics = show_syndic($databaseConnection,$nomSyndic,$emailSyndic);

   	echo json_encode($syndics); 


?>