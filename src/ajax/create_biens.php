<?php
	require_once (dirname(__FILE__)."/../../Includes/simplecms-config-sample.php");
	require_once  (dirname(__FILE__)."/../../Includes/connectDB.php");

	/* Données du bien */

	$superficieBien =  $databaseConnection->real_escape_string($_POST['create_superficieBien']);
	$nbPiecesBien = $databaseConnection->real_escape_string($_POST['create_nbPiecesBien']);
	$nbChambresBien = $databaseConnection->real_escape_string($_POST['create_nbChambresBien']);
	$etageBien = $databaseConnection->real_escape_string($_POST['create_etageBien']);
	$descriptionBien = $databaseConnection->real_escape_string($_POST['create_descriptionBien']);
	$rueBien = $databaseConnection->real_escape_string($_POST['create_rueBien']);
	$complementAdresseBien= $databaseConnection->real_escape_string($_POST['create_complementAdresseBien']);
	$codePostalBien = $databaseConnection->real_escape_string($_POST['create_codePostalBien']);
	$villeBien = $databaseConnection->real_escape_string($_POST['create_villeBien']);
	$nomSyndicBien =$databaseConnection->real_escape_string($_POST['create_nomSyndicBien']);
	$mailSyndicBien = $databaseConnection->real_escape_string($_POST['create_mailSyndicBien']);

	/* Données du propriétaire du bien */
	$civilitePBien = $databaseConnection->real_escape_string($_POST['create_civilitePBien']);
	$namePBien = $databaseConnection->real_escape_string($_POST['create_namePBien']);
	$prenomPBien = $databaseConnection->real_escape_string($_POST['create_prenomPBien']);
	$numTelPBien = $databaseConnection->real_escape_string($_POST['create_numTelPBien']);
	$mailPBien = $databaseConnection->real_escape_string($_POST['create_mailPBien']);
	$ruePBien = $databaseConnection->real_escape_string($_POST['create_ruePBien']);
	$codePostalPBien = $databaseConnection->real_escape_string($_POST['create_codePostalPBien']);
	$villePBien = $databaseConnection->real_escape_string($_POST['create_villePBien']);
	$complementAdressePBien = $databaseConnection->real_escape_string($_POST['create_complementAdressePBien']);
 	$actionForm =  $databaseConnection->real_escape_string($_POST['action']);
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

	$addBiens = add_edit_biens($databaseConnection,$action,	$superficieBien,$nbPiecesBien,$nbChambresBien,$etageBien,$descriptionBien,$rueBien,$complementAdresseBien,$codePostalBien,$villeBien,$nomSyndicBien,$mailSyndicBien,$civilitePBien,$namePBien,$prenomPBien,$numTelPBien,$mailPBien,$ruePBien,$codePostalPBien,$villePBien,$complementAdressePBien,$idSelected);

	echo $addBiens;
?>
