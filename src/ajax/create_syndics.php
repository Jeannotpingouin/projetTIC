<?php
	require_once (dirname(__FILE__)."/../../Includes/simplecms-config-sample.php");
	require_once  (dirname(__FILE__)."/../../Includes/connectDB.php");

	/* Données du bien */

	$nomSyndic =  $databaseConnection->real_escape_string($_POST['create_nomSyndic']);
	$emailSyndic = $databaseConnection->real_escape_string($_POST['create_emailSyndic']);
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

	$addSyndics = add_edit_syndics($databaseConnection,$action,$nomSyndic,$emailSyndic,$idSelected);

	echo $addSyndics;
?>
