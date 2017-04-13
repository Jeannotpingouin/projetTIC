<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$identifiant =  strip_tags($_POST['idBaux']);

	$reponse = delete_bail($databaseConnection,$identifiant);

   	echo $reponse; 


?>