<?php
	require_once (dirname(__FILE__)."/../../Includes/simplecms-config-sample.php"); 
	require_once  (dirname(__FILE__)."/../../Includes/connectDB.php");

	$identifiant =  strip_tags($_POST['idSyndics']);
	$reponse = delete_syndic($databaseConnection,$identifiant);

   	echo $reponse;


?>
