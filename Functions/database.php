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
                            $query_show_bail = "SELECT l.ID,loc.nom, loc.prenom,loc.tel, loc.mail,c.nom,c.prenom,c.tel,c.mail, a.rue, a.codePostal,a.ville,l.dateDebut, l.dateFin
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
                    $query_delete_bail ="DELETE FROM louer  WHERE ID=".$identifiant;
                    if($databaseConnection->query($query_delete_bail) == TRUE) 
                        return "yes";
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

function add_edit_baux($databaseConnection,$action,$nomLoc,$prenomLoc, $telLoc,$mailLoc,$dateDebutLoc,$dateFinLoc,$idBienLoc,$nomCaut,$prenomCaut,$telCaut,$mailCaut,$adrPrincipCaut,$adrComplCaut,$villeCaut,$codePostalCaut){

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

}
    

}
?>
