<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$idBien = "\N";
	$idProprietaire = "\N";
	$idAdresse = "\N";

	/* Données du bien */

	$superficieBien =  strip_tags($_POST['create_superficieBien']);
	$prixBien = strip_tags($_POST['create_prixBien']);
	$nbPiecesBien = strip_tags($_POST['create_nbPiecesBien']);
	$nbChambresBien = strip_tags($_POST['create_nbChambresBien']);
	$etageBien = strip_tags($_POST['create_etageBien']);
	$descriptionBien = strip_tags($_POST['create_descriptionBien']);
	$rueBien = strip_tags($_POST['create_rueBien']);
	$complementAdresseBien= strip_tags($_POST['create_complementAdresseBien']);
	$codePostalBien = strip_tags($_POST['create_codePostalBien']);
	$villeBien = strip_tags($_POST['create_villeBien']);
	$nomSyndicBien = strip_tags($_POST['create_nomSyndicBien']);
	$mailSyndicBien = strip_tags($_POST['create_mailSyndicBien']);

	/* Données du propriétaire du bien */
	$civilitePBien = strip_tags($_POST['create_civilitePBien']);
	$namePBien = strip_tags($_POST['create_namePBien']);
	$prenomPBien = strip_tags($_POST['create_prenomPBien']);
	$numTelPBien = strip_tags($_POST['create_numTelPBien']);
	$mailPBien = strip_tags($_POST['create_mailPBien']);
	$ruePBien = strip_tags($_POST['create_ruePBien']);
	$codePostalPBien = strip_tags($_POST['create_codePostalPBien']);
	$villePBien = strip_tags($_POST['create_villePBien']);
	$complementAdressePBien = strip_tags($_POST['create_complementAdressePBien']);
 	

	$queryInsertAdresseBien = "INSERT IGNORE INTO adresse VALUES(NULL, '$rueBien', '$complementAdresseBien', '$codePostalBien', '$villeBien')";
	$databaseConnection->query($queryInsertAdresseBien);

	$queryInsertAdresseProprio = "INSERT IGNORE INTO adresse VALUES(NULL, '$ruePBien', '$complementAdressePBien', '$codePostalPBien', '$villePBien')";
	$databaseConnection->query($queryInsertAdresseProprio);

	$idAdresseProprio = NULL;
	$idAdresseBien = null;

	$getIdAdresseBien = "SELECT ID from adresse where rue='$rueBien' and complement='$complementAdresseBien' and codePostal='$codePostalBien' and ville='$villeBien'";
	$getIdAdresseProprio = "SELECT ID from adresse where rue='$ruePBien' and complement='$complementAdressePBien' and codePostal='$codePostalPBien' and ville='$villePBien'";

	$idAdresseProprio = json_encode(intval($databaseConnection->query($getIdAdresseProprio)->fetch_all()[0][0]));
	$idAdresseBien = json_encode(intval($databaseConnection->query($getIdAdresseBien)->fetch_all()[0][0]));

	$queryInsertProprio = "INSERT IGNORE INTO proprietaire VALUE(NULL, '$civilitePBien', '$namePBien', '$prenomPBien','$mailPBien', '$numTelPBien', '$idAdresseProprio')";
	$databaseConnection->query($queryInsertProprio);

	$idProprio = null;
	$getIdProprio ="SELECT ID from proprietaire where civilite='$civilitePBien' and nom='$namePBien' and prenom='$prenomPBien' and mail='$mailPBien' and tel = '$numTelPBien' and idAdresse='$idAdresseProprio'";

	$idProprio = json_encode(intval($databaseConnection->query($getIdProprio)->fetch_all()[0][0]));

	$queryInsertBien = "INSERT IGNORE INTO bien VALUE(NULL, '$superficieBien', '$nbPiecesBien', '$nbChambresBien','$etageBien', '$descriptionBien', '$idProprio', '$idAdresseBien')";
	$databaseConnection->query($queryInsertBien);

	$queryInsertSyndicat = "INSERT IGNORE INTO syndicat_copro VALUE(NULL, '$nomSyndicBien', '$mailSyndicBien')";
	$databaseConnection->query($queryInsertSyndicat);

 	header("Location: /projetTIC/creation-et-modif-biens.php"); /* Redirection du navigateur */
	exit;
?>