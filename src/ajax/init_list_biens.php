<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php"); 
	require_once  ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/connectDB.php");

	$queryGetAllBiens = "SELECT * FROM bien";
	echo json_encode($databaseConnection->query($queryGetAllBiens)->fetch_all());
	/*$idAdresseProprio = json_encode(intval($databaseConnection->query($getIdAdresseProprio)->fetch_all()[0][0]));
        $statement_check_bail_exists = $databaseConnection->prepare($query_check_bail_exists);
        $statement_check_bail_exists->execute();
        $statement_check_bail_exists->store_result();

        if($statement_check_bail_exists->num_rows != 0)
        {
                    $query_show_bail = "SELECT loc.nom, loc.prenom,c.nom,c.prenom, 
                                FROM louer l, locataire loc,bien b, cautionnaire c, adresse a
                                WHERE l.idLocataire = loc.ID and loc.idCautionnaire = c.ID and l.idBien = b.ID and  b.idAdresse = a.ID";
                    if (!empty($nomLoc)) {
                         $query_show_bail .= " AND ";
                         $query_show_bail .= "loc.nom= '. $nomLoc . %'";
                    }
                     if (!empty($nomCaut)) {
                         $query_show_bail .= " AND ";
                         $query_show_bail .= "c.nom= '. $nomCaut . %'";
                    }
                      if (!empty($rue)) {
                         $query_show_bail .= " AND ";
                         $query_show_bail .= "c.nom= '. $rue . %'";
                    }
                        if (!empty($ville)) {
                         $query_show_bail .= " AND ";
                         $query_show_bail .= "c.nom= '. $ville . %'";
                    }
                        if (!empty($codePostal)) {
                         $query_show_bail .= " AND ";
                         $query_show_bail .= "c.nom= '. $codePostal . %'";
                    }
                    echo $query_show_bail;
             $statement_show_bail = $databaseConnection->prepare($query_show_bail);
            $statement_show_bail->execute();
            $statement_show_bail->store_result();*/
           // return "bonjou


?>