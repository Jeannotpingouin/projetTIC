    <?php 
        require_once ("Includes/simplecms-config-sample.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php");  


        if(logged_on())  {    
     ?>
<div class="container">
    <h4>Gestion des biens</h4> <br>
    <div class=row>
        <fieldset>
            <legend> Champs de recherche </legend>
             <form  id="formBail" action="src/ajax/search_biens.php" method="POST">
            <table>
            <tr>
            	<td>
            	 <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="search_nomLocataire" type="text" class="validate" name="search_nomLocataire">
                        <label for="search_nomLocataire">Nom propriétaire</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="search_nomCautionnaire" type="text" class="validate" name="search_nomCautionnaire">
                        <label for="search_nomCautionnaire">Nom du cautionnaire</label>
                    </div>
                 
                        <div class="input-field col s12">
                            <i class="material-icons prefix">navigation</i>
                            <input id="search_rue" type="text" class="validate" name="search_rue">
                            <label for="search_rue">Rue</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">navigation</i>
                            <input id="search_ville" type="text" class="validate" name="search_ville">
                            <label for="search_ville">Ville</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">navigation</i>
                            <input id="search_codePostal" type="text" class="validate" name="search_codePostal">
                            <label for="search_codePostal">Code Postal</label>
                        </div>
                  
                    </div>
                   </td>

                   <td>
            	 <div class="row">
                    <div class="input-field col s12">
              
                            <input id="search_codePostal" type="text" class="validate" name="search_codePostal">
                            <label for="search_codePostal">Syndicat</label>
                        </div>
                        <div class="input-field col s12">
              
                            <input id="search_codePostal" type="text" class="validate" name="search_codePostal">
                            <label for="search_codePostal">Superficie min</label>
                        </div>
                        <div class="input-field col s12">
              
                            <input id="search_codePostal" type="text" class="validate" name="search_codePostal">
                            <label for="search_codePostal">Superficie max</label>
                        </div>

                   	 <div class="input-field col s12">
              
                            <input id="search_codePostal" type="text" class="validate" name="search_codePostal">
                            <label for="search_codePostal">Prix min</label>
                        </div>

                         <div class="input-field col s12">
              
                            <input id="search_codePostal" type="text" class="validate" name="search_codePostal">
                            <label for="search_codePostal">Prix max</label>
                        </div>
                    </div>
                    </div>
                   </td>
                   </tr>
                   </table>
                    <div class="row">
                     <div class="input-field col s12 center-align ">
                        <button class="btn waves-effect waves-light " type="submit" name="action" id="rechercherBien">Rechercher
                        <i class="material-icons right">search</i>
                        </button>
                    </div>
                    </div>
                </div>
            </form>
        </fieldset>
        <div class="input-field col s12 center-align ">
             <button class="btn waves-effect waves-light " id="ajouterBien" onclick="window.open('/projetTIC/creation-biens.php')">Ajouter
                <i class="material-icons right">playlist_add</i>
            </button>
        </div>
    </div>

   
    
        <!-- Page Content goes here -->

	<?php 
	} 
	    include ("Includes/footer.php");
	 ?>
