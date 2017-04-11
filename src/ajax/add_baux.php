<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$nomLocataire =  strip_tags($_POST['add_edit_nomLocataire']);
	$prenomLocataire = strip_tags($_POST['add_edit_prenomLocataire']);
	$telLocataire = strip_tags($_POST['add_edit_telLocataire']);
	$mailLocataire = strip_tags($_POST['add_edit_mailLocataire']);
	$dateDebutLocataire = mysql_real_escape_string($_POST['add_edit_dateDebutLocataire']);
	$dateFinLocataire = mysql_real_escape_string($_POST['add_edit_dateFinLocataire']);
	$idBienLocataire= strip_tags($_POST['add_edit_bienLocataire']);
	$nomCautionnaire = strip_tags($_POST['add_edit_nomCautionnaire']);
	$prenomCautionnaire = strip_tags($_POST['add_edit_prenomCautionnaire']);
	$telCautionnaire = strip_tags($_POST['add_edit_telCautionnaire']);
	$mailCautionnaire = strip_tags($_POST['add_edit_mailCautionnaire']);
	$adressePrincipaleCautionnaire = strip_tags($_POST['add_edit_addresseCautionnaire']);
	$adresseComplementaireCautionnaire= strip_tags($_POST['add_edit_addresseCompleCautionnaire']);
	$villeCautionnaire = strip_tags($_POST['add_edit_villeCautionnaire']);
	$codePostalCautionnaire= strip_tags($_POST['add_edit_codePostalCautionnaire']);

	





?>