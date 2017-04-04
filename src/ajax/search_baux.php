<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$nomLocataire =  strip_tags($_POST['search_nomLocataire']);
	$nomCautionnaire = strip_tags($_POST['search_nomCautionnaire']);
	$rue = strip_tags($_POST['search_rue']);
	$ville = strip_tags($_POST['search_ville']);
	$codePostal = strip_tags($_POST['search_codePostal']);

	$locataires = show_bail($databaseConnection,$nomLocataire,$nomCautionnaire,$rue,$ville,$codePostal);

   	echo json_encode($locataires); 


?>