<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$identifiant =  strip_tags($_POST['idBiens']);

	$reponse = delete_bien($databaseConnection,$identifiant);

   	echo $reponse; 


?>