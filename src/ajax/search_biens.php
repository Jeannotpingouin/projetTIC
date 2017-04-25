<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$nomProprietaire = $databaseConnection->real_escape_string($_POST['search_nomProprietaire']);
	$rue = $databaseConnection->real_escape_string($_POST['search_rue']);
	$ville = $databaseConnection->real_escape_string($_POST['search_ville']);
	$codePostal = $databaseConnection->real_escape_string($_POST['search_codePostal']);
	$nbPieces = $databaseConnection->real_escape_string($_POST['search_nbP']);
	$nbChambres = $databaseConnection->real_escape_string($_POST['search_nbC']);
	$superficieMin = $databaseConnection->real_escape_string($_POST['search_supMin']);
	$superficieMax = $databaseConnection->real_escape_string($_POST['search_supMax']);

	$biens = show_bien($databaseConnection,$nomProprietaire,$rue,$ville,$codePostal, $nbPieces, $nbChambres, $superficieMin, $superficieMax);

   	echo json_encode($biens); 


?>