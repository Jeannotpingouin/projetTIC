<?php
	require_once (dirname(__FILE__)."/../../Includes/simplecms-config-sample.php"); 
	require_once  (dirname(__FILE__)."/../../Includes/connectDB.php");

	$nomLocataire =   $databaseConnection->real_escape_string($_POST['search_nomLocataire']);
	$nomCautionnaire =  $databaseConnection->real_escape_string($_POST['search_nomCautionnaire']);
	$rue =  $databaseConnection->real_escape_string($_POST['search_rue']);
	$ville =  $databaseConnection->real_escape_string($_POST['search_ville']);
	$codePostal =  $databaseConnection->real_escape_string($_POST['search_codePostal']);

	$locataires = show_bail($databaseConnection,$nomLocataire,$nomCautionnaire,$rue,$ville,$codePostal);

   	echo json_encode($locataires);


?>
