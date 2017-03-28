<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$nomLocataire =  strip_tags($_POST['search_nomLocataire']);
	$nomCautionnaire = strip_tags($_POST['search_nomCautionnaire']);
	$rue = strip_tags($_POST['search_rue']);
	$ville = strip_tags($_POST['search_ville']);
	$codePostal = strip_tags($_POST['search_codePostal']);

 
	//On a recupéré les données du champ de recherche
	$locataires = show_bail($databaseConnection,$nomLocataire,$nomCautionnaire,$rue,$ville,$codePostal);
    $locataires->bind_result($civilite,$nom,$prenom,$mail,$tel,$idCautionnaire);
  	echo json_encode($locataires->fetch_all());   


?>