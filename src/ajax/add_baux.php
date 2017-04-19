<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	//reception des données
	$nomLocataire =  $databaseConnection->real_escape_string($_POST['add_edit_nomLocataire']);
	$prenomLocataire =  $databaseConnection->real_escape_string($_POST['add_edit_prenomLocataire']);
	$telLocataire =  $databaseConnection->real_escape_string($_POST['add_edit_telLocataire']);
	$mailLocataire =  $databaseConnection->real_escape_string($_POST['add_edit_mailLocataire']);
	$dateDebutLocataire =  $databaseConnection->real_escape_string($_POST['add_edit_dateDebutLocataire']);
	$dateFinLocataire =  $databaseConnection->real_escape_string($_POST['add_edit_dateFinLocataire']);
	$idBienLocataire=  $databaseConnection->real_escape_string($_POST['add_edit_bienLocataire']);
	$nomCautionnaire =  $databaseConnection->real_escape_string($_POST['add_edit_nomCautionnaire']);
	$prenomCautionnaire =  $databaseConnection->real_escape_string($_POST['add_edit_prenomCautionnaire']);
	$telCautionnaire =  $databaseConnection->real_escape_string($_POST['add_edit_telCautionnaire']);
	$mailCautionnaire =  $databaseConnection->real_escape_string($_POST['add_edit_mailCautionnaire']);
	$adressePrincipaleCautionnaire =  $databaseConnection->real_escape_string($_POST['add_edit_addresseCautionnaire']);
	$adresseComplementaireCautionnaire=  $databaseConnection->real_escape_string($_POST['add_edit_addresseCompleCautionnaire']);
	$villeCautionnaire =  $databaseConnection->real_escape_string($_POST['add_edit_villeCautionnaire']);
	$codePostalCautionnaire=  $databaseConnection->real_escape_string($_POST['add_edit_codePostalCautionnaire']);
	$actionForm =  $databaseConnection->real_escape_string($_POST['action']);
	//Conversion des dates du datepicker
	$dateDebutLocataire = strtotime(str_replace(",","",$dateDebutLocataire));
	$dateDebutLocataire = (date('Y-m-d',$dateDebutLocataire));
	$dateFinLocataire = strtotime(str_replace(",","",$dateFinLocataire));
	$dateFinLocataire = (date('Y-m-d',$dateFinLocataire));
	
	//la valeur action : ajouter ou edition
	$action = NULL;
		if($actionForm == "insert"){
			$action = "insert";
			$idSelected = NULL;
		}
		else{
			$action = "edition";
			$idSelected = $actionForm;
		}
		

	$addBaux = add_edit_baux($databaseConnection,$action,$nomLocataire,$prenomLocataire,$telLocataire,$mailLocataire,
		$dateDebutLocataire,$dateFinLocataire,$idBienLocataire,$nomCautionnaire,$prenomCautionnaire,$telCautionnaire,$mailCautionnaire,
		$adressePrincipaleCautionnaire,$adresseComplementaireCautionnaire,$villeCautionnaire,$codePostalCautionnaire,$idSelected);

	echo $addBaux;

?>