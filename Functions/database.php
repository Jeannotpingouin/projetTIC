<?php
    require_once ($_SERVER["DOCUMENT_ROOT"]."/projetTIC/Includes/simplecms-config-sample.php");

    function prep_DB_content ()
    {
        global $databaseConnection;
        $admin_role_id = 1;

        create_tables($databaseConnection);
        create_roles($databaseConnection, $admin_role_id);
        create_admin($databaseConnection, $admin_role_id);
    }

    function create_tables($databaseConnection)
    {
        $query_users = "CREATE TABLE IF NOT EXISTS users (id INT NOT NULL AUTO_INCREMENT, username VARCHAR(50), password CHAR(40), PRIMARY KEY (id))";
        $databaseConnection->query($query_users);

        $query_roles = "CREATE TABLE IF NOT EXISTS roles (id INT NOT NULL, name VARCHAR(50), PRIMARY KEY (id))";
        $databaseConnection->query($query_roles);

        $query_users_in_roles = "CREATE TABLE IF NOT EXISTS users_in_roles (id INT NOT NULL AUTO_INCREMENT, user_id INT NOT NULL, role_id INT NOT NULL, ";
        $query_users_in_roles .= " PRIMARY KEY (id), FOREIGN KEY (user_id) REFERENCES users(id), FOREIGN KEY (role_id) REFERENCES roles(id))";
        $databaseConnection->query($query_users_in_roles);

        $query_pages = "CREATE TABLE IF NOT EXISTS pages (id INT NOT NULL AUTO_INCREMENT, menulabel VARCHAR(50), content TEXT, PRIMARY KEY (id))";
        $databaseConnection->query($query_pages);
    }

    function create_roles($databaseConnection, $admin_role_id)
    {
        $query_check_roles_exist = "SELECT id FROM roles WHERE id <= 2";
        $statement_check_roles_exist = $databaseConnection->prepare($query_check_roles_exist);
        $statement_check_roles_exist->execute();
        $statement_check_roles_exist->store_result();
        if ($statement_check_roles_exist->num_rows == 0)
        {
            $query_insert_roles = "INSERT INTO roles (id, name) VALUES ($admin_role_id, 'admin'), (2, 'user')";
            $statement_inser_roles = $databaseConnection->prepare($query_insert_roles);
            $statement_inser_roles->execute();
        }
    }

    function create_admin($databaseConnection, $admin_role_id)
    {
        // HACK: Storing config values in variables so that they aren't passed by reference later.
        $default_admin_username = DEFAULT_ADMIN_USERNAME;
        $default_admin_password = DEFAULT_ADMIN_PASSWORD;

        $query_check_admin_exists = "SELECT id FROM users WHERE username = ? LIMIT 1";
        $statement_check_admin_exists = $databaseConnection->prepare($query_check_admin_exists);
        $statement_check_admin_exists->bind_param('s', $default_admin_username);
        $statement_check_admin_exists->execute();
        $statement_check_admin_exists->store_result();
        if($statement_check_admin_exists->num_rows == 0)
        {
            $query_insert_admin = "INSERT INTO users (username, password) VALUES (?, SHA(?))";
            $statement_insert_admin = $databaseConnection->prepare($query_insert_admin);
            $statement_insert_admin->bind_param('ss', $default_admin_username, $default_admin_password);
            $statement_insert_admin->execute();
            $statement_insert_admin->store_result();

            $admin_user_id = $statement_insert_admin->insert_id;
            $query_add_admin_to_role = "INSERT INTO users_in_roles(user_id, role_id) VALUES (?, ?)";
            $statement_add_admin_to_role = $databaseConnection->prepare($query_add_admin_to_role);
            $statement_add_admin_to_role->bind_param('dd', $admin_user_id, $admin_role_id);
            $statement_add_admin_to_role->execute();
            $statement_add_admin_to_role->close();
        }
    }
   /* continuer a sécuriser le tout */
    function show_bail($databaseConnection,$nomLoc,$nomCaut,$rue,$ville,$codePostal)
    {

        $query_check_bail_exists = "SELECT * FROM louer";
        $statement_check_bail_exists = $databaseConnection->query($query_check_bail_exists);

        
                if( $statement_check_bail_exists->num_rows != 0)
                {               
                            $query_show_bail = "SELECT l.ID,loc.nom, loc.prenom,loc.tel, loc.mail,c.nom,c.prenom,c.tel,c.mail, a.rue, a.codePostal,a.ville,DATE_FORMAT(l.dateDebut,'%m-%d-%Y'), DATE_FORMAT(l.dateFin,'%m-%d-%Y')
                                        FROM louer l, locataire loc,bien b, cautionnaire c, adresse a
                                        WHERE l.idLocataire = loc.ID and ((loc.idCautionnaire iS NULL) OR (c.ID = loc.idCautionnaire)) and l.idBien = b.ID and  b.idAdresse = a.ID";
                            if (!empty($nomLoc)) {
                                 $query_show_bail .= " AND ";
                                 $query_show_bail .= "loc.nom= '$nomLoc'";
                            }
                             if (!empty($nomCaut)) {
                                 $query_show_bail .= " AND ";
                                 $query_show_bail .= "c.nom= '$nomCaut'";
                            }
                              if (!empty($rue)) {
                                 $query_show_bail .= " AND ";
                                 $query_show_bail .= "a.rue= '$rue'";
                            }
                                if (!empty($ville)) {
                                 $query_show_bail .= " AND ";
                                 $query_show_bail .= "a.ville= '$ville'";
                            }
                                if (!empty($codePostal)) {
                                 $query_show_bail .= " AND ";
                                 $query_show_bail .= "a.codePostal= '$codePostal'";
                            }
            
                    $statement_show_bail = $databaseConnection->query($query_show_bail); 
  
                    return $statement_show_bail->fetch_all();
             }

    }



function delete_bail($databaseConnection,$identifiant)
    {

        $query_check_bail_exists = "SELECT * FROM louer where ID = ?";
        $statement_check_bail_exists = $databaseConnection->prepare($query_check_bail_exists);
        $statement_check_bail_exists->bind_param('s', $identifiant);
        $statement_check_bail_exists->execute();
        $statement_check_bail_exists->store_result();
        
                if( $statement_check_bail_exists->num_rows != 0)
                {               
                    //selectionner le locataire dans louer 
                    $query_id_locataire = "SELECT idLocataire FROM louer WHERE ID=".$identifiant;
                    $statement_id_locataire = $databaseConnection->query($query_id_locataire);
                    $row = $statement_id_locataire->fetch_row();
                    $idLocataire = $row[0];
                    //selectionner l'idCautionnaire
                    $query_id_cautionnaire = "SELECT idCautionnaire FROM locataire WHERE ID=".$idLocataire;
                    $statement_id_cautionnaire = $databaseConnection->query($query_id_cautionnaire);
                    $row = $statement_id_cautionnaire->fetch_row();
                    $idCautionnaire = $row[0];

                    //selection idAdresse dans la table cautionnaire
                    $query_id_adresse = "SELECT idAdresse FROM cautionnaire WHERE ID=".$idCautionnaire;
                    $statement_id_adresse = $databaseConnection->query($query_id_adresse);
                    $row = $statement_id_adresse->fetch_row();
                    $idAdresse = $row[0];
                    
                    //supression de l'adresse du cautionnaire
                    $query_delete_adresse_cautionnaire ="DELETE FROM adresse WHERE ID=".$idAdresse;
                    $databaseConnection->query($query_delete_adresse_cautionnaire);

                    $query_delete_cautionnaire = "DELETE FROM cautionnaire WHERE ID=".$idCautionnaire;
                    $databaseConnection->query($query_delete_cautionnaire);   

                    $query_delete_louer = "DELETE FROM louer WHERE ID=".$identifiant;
                    $databaseConnection->query($query_delete_louer); 

                    return "ok";

             }

    }

function search_ensemble_bien($databaseConnection){
        
        $query_check_bien_exists = "SELECT * FROM bien";
        $statement_check_bien_exists = $databaseConnection->query($query_check_bien_exists);
                if( $statement_check_bien_exists->num_rows != 0)
                {               
                    $query_search_bien = "SELECT * FROM bien b, adresse a WHERE  b.idAdresse = a.ID";
                    $statement_search_bien =$databaseConnection->query($query_search_bien);
                    return $statement_search_bien;
                }

}

function add_edit_baux($databaseConnection,$action,$nomLoc,$prenomLoc, $telLoc,$mailLoc,$dateDebutLoc,$dateFinLoc,$idBienLoc,$nomCaut,$prenomCaut,$telCaut,$mailCaut,$adrPrincipCaut,$adrComplCaut,$villeCaut,$codePostalCaut,$idSelected){
    
    if($action == "insert"){
    //INSERT DANS LA TABLE ADRESSE - ADRESSE CAUTIONNAIRE
    $query_insert_adresse = "INSERT INTO adresse(rue,complement,codePostal,ville) VALUES ('$adrPrincipCaut', '$adrComplCaut','$codePostalCaut','$villeCaut')"; 
    $statement_insert_adresse = $databaseConnection->query($query_insert_adresse);
    $idAdresse = $databaseConnection->insert_id;
    //INSERT DANS LA TABLE CAUTIONNAIRE
    $query_insert_cautionnaire = "INSERT INTO cautionnaire(nom,prenom,mail,tel,idAdresse) VALUES ('$nomCaut','$prenomCaut','$mailCaut','$telCaut','$idAdresse')";           
    $statement_insert_cautionnaire = $databaseConnection->query($query_insert_cautionnaire);
    $idCautionnaire = $databaseConnection->insert_id;
    //INSERT DANS LA TABLE LOCATAIRE
    $query_insert_locataire = "INSERT INTO locataire(nom,prenom,mail,tel,idCautionnaire) VALUES ('$nomLoc','$prenomLoc','$mailLoc','$telLoc','$idCautionnaire')";
    $statement_insert_locataire = $databaseConnection->query($query_insert_locataire);
    $idLocataire = $databaseConnection->insert_id;

    //INSERT DANS LA TABLE LOUER
    $query_insert_louer = "INSERT INTO louer(idLocataire,idBien,dateDebut,dateFin) VALUES ('$idLocataire','$idBienLoc','$dateDebutLoc','$dateFinLoc')" ;
    $statement_insert_louer = $databaseConnection->query($query_insert_louer);
      return "ok";
}
else if($action == "edition"){
    //differentes selections

    $query_id_locataire = "SELECT idLocataire FROM louer WHERE ID=".$idSelected;
    $statement_id_locataire = $databaseConnection->query($query_id_locataire);
    $row = $statement_id_locataire->fetch_row();
    $idLocataire = $row[0];

    //selectionner l'idCautionnaire
    $query_id_cautionnaire = "SELECT idCautionnaire FROM locataire WHERE ID=".$idLocataire;
    $statement_id_cautionnaire = $databaseConnection->query($query_id_cautionnaire);
    $row = $statement_id_cautionnaire->fetch_row();
    $idCautionnaire = $row[0];

    $query_id_adresse = "SELECT idAdresse FROM cautionnaire WHERE ID=".$idCautionnaire;
    $statement_id_adresse = $databaseConnection->query($query_id_adresse);
    $row = $statement_id_adresse->fetch_row();
    $idAdresse = $row[0];  

    //Mettre à jour dans un premier temps l'adresse 
    //rue,complement,codePostal,ville FROM adresse WHERE ID="
    $query_update_adresse="UPDATE adresse SET rue = '$adrPrincipCaut', complement = '$adrComplCaut', codePostal = '$codePostalCaut', ville = '$villeCaut' WHERE ID=".$idAdresse;
     $statement_update_adresse = $databaseConnection->query($query_update_adresse);
 
    //Mettre a jour la table cautionnaire 
    $query_update_cautionnaire="UPDATE cautionnaire SET nom = '$nomCaut', prenom = '$prenomCaut', mail = '$mailCaut', tel = '$telCaut' WHERE ID=".$idCautionnaire;
     $statement_update_cautionnaire = $databaseConnection->query($query_update_cautionnaire);
     //mettre à jour la table locataire 
     $query_update_locataire="UPDATE locataire SET nom = '$nomLoc', prenom = '$prenomLoc', mail = '$mailLoc', tel = '$telLoc' WHERE ID=".$idLocataire;
     $statement_update_locataire = $databaseConnection->query($query_update_locataire);
     //mettre a jour la table louer
     $query_update_louer="UPDATE louer SET idBien = '$idBienLoc', dateDebut = '$dateDebutLoc', dateFin = '$dateFinLoc' WHERE ID=".$idSelected;
     $statement_update_louer = $databaseConnection->query($query_update_louer);
     return  "ok"; 
}
    

}


function search_baux($databaseConnection,$identifiant){
        //Permet de vérifier l'existence d'un bail pour l'identifiant passe en parametre
        $query_check_bail_exists = "SELECT * FROM louer where ID = ?";
        $statement_check_bail_exists = $databaseConnection->prepare($query_check_bail_exists);
        $statement_check_bail_exists->bind_param('s', $identifiant);
        $statement_check_bail_exists->execute();
        $statement_check_bail_exists->store_result();
        
        //initialisaion de mon tableau qui va contenir toutes les données du formulaire
        $donnees_bail = array();

                if( $statement_check_bail_exists->num_rows != 0)
                {          
                     //recuperer les donnees dans la table louer 
                    $query_id_locataire = "SELECT idLocataire,idBien,dateDebut,dateFin FROM louer WHERE ID=".$identifiant;
                    $statement_id_locataire = $databaseConnection->query($query_id_locataire);
                    $row = $statement_id_locataire->fetch_row();
                    $idLocataire = $row[0];
                    $idBien = $row[1];
                    //date debut & date fin du bail
                    $dateDebut = strtotime($row[2]);
                    $dateDebut = date('d F, Y',$dateDebut);
                    $dateFin = strtotime($row[3]);
                    $dateFin = (date('d F, Y',$dateFin));
                    //selectionner l'idCautionnaire
                    $query_id_cautionnaire = "SELECT idCautionnaire,nom,prenom,mail,tel FROM locataire WHERE ID=".$idLocataire;
                    $statement_id_cautionnaire = $databaseConnection->query($query_id_cautionnaire);
                    $row = $statement_id_cautionnaire->fetch_row();
                    $idCautionnaire = $row[0];

                    //nom,prenom, mail & telephone du locataire
                    $nomLocataire = $row[1];
                    $prenomLocataire = $row[2];
                    $mailLocataire = $row[3];
                    $telLocataire = $row[4];

                    //selection idAdresse dans la table cautionnaire
                    $query_id_adresse = "SELECT idAdresse,nom,prenom,mail,tel FROM cautionnaire WHERE ID=".$idCautionnaire;
                    $statement_id_adresse = $databaseConnection->query($query_id_adresse);
                    $row = $statement_id_adresse->fetch_row();
                    $idAdresse = $row[0];  

                    //nom,prenom, mail & telephone du cautionnaire
                    $nomCautionnaire = $row[1];
                    $prenomCautionnaire = $row[2];
                    $mailCautionnaire = $row[3];
                    $telCautionnaire = $row[4];

                    $query_adresse = "SELECT rue,complement,codePostal,ville FROM adresse WHERE ID=".$idAdresse;
                    $statement_adresse = $databaseConnection->query($query_adresse);
                    $row = $statement_adresse->fetch_row();
                    $rueCautionnaire = $row[0];
                    $complementCautionnaire = $row[1];
                    $codePostalCautionnaire = $row[2];
                    $villeCautionnaire = $row[3];

                    array_push($donnees_bail,$nomLocataire,$prenomLocataire,$telLocataire,$mailLocataire,$dateDebut,$dateFin,
                        $idBien,$nomCautionnaire,$prenomCautionnaire,$telCautionnaire,$mailCautionnaire,$rueCautionnaire,
                        $complementCautionnaire,$codePostalCautionnaire,$villeCautionnaire);

                    return $donnees_bail;

                }



}
?>
