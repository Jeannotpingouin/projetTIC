<?php
	require_once (dirname(__FILE__)."/../../Includes/simplecms-config-sample.php");
	require_once  (dirname(__FILE__)."/../../Includes/connectDB.php");

	$nomSyndic = $databaseConnection->real_escape_string($_POST['search_nomSyndic']);
	$emailSyndic = $databaseConnection->real_escape_string($_POST['search_emailSyndic']);

	$syndics = show_syndic($databaseConnection,$nomSyndic,$emailSyndic);

   	echo json_encode($syndics);


?>
