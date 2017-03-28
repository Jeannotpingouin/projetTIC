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
            <legend> Edition bien </legend>
             <form  id="formCreationBien" action="src/ajax/create_biens.php" method="POST">
            <table class = "responsive-table">
            <tr>
            	<td class="input-field col s4">
            	 <div class="row">
                <h5 style="text-align:center"> Le bien </h5>
                    <div class="input-field col s12">
                        
                        <input id="create_superficieBien" type="text" class="validate" name="create_superficieBien">
                        <label for="create_superficieBien">* Superficie</label>
                    </div>
                    <div class="input-field col s12">
                      
                        <input id="create_prixBien" type="text" class="validate" name="create_prixBien">
                        <label for="create_prixBien">* Prix</label>
                    </div>
                 
                        <div class="input-field col s12">
                      
                            <input id="create_nbPiecesBien" type="text" class="validate" name="create_nbPiecesBien">
                            <label for="create_nbPiecesBien">Nombre pièces</label>
                        </div>
                        <div class="input-field col s12">
                      
                            <input id="create_nbChambresBien" type="text" class="validate" name="create_nbChambresBien">
                            <label for="create_nbChambresBien">Nombre chambres</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="create_etageBien" type="text" class="validate" name="create_etageBien">
                            <label for="create_etageBien">Etage</label>
                        </div>
                       <div class="input-field col s12">
                            <select id="create_etatBien" type="text" class="validate" name="create_etatBien"></select>
                            <label for="create_etatBien">Etat</label>
                        </div>
                         <div class="input-field col s12">
                            <textarea id="create_descriptionBien" type="text" class="validate" name="create_descriptionBien"></textarea>
                            <label for="create_descriptionBien">Description</label>
                        </div>
                     </div>
                   </td>
                   <td  class="input-field col s4">
          
                    <div class="row">
                    <h5 style="text-align:center"> Adresse </h5>
                        <div class="input-field col s12">
                             <i class="material-icons prefix">navigation</i>
                            <input id="create_rueBien" type="text" class="validate" name="create_rueBien">
                            <label for="create_rueBien">* Rue</label>
                        </div>
                        </div>
                      
                        <div class="input-field col s12">
                        <i class="material-icons prefix">navigation</i>
                            <input id="create_codePostalBien" type="text" class="validate" name="create_codePostalBien">
                            <label for="create_codePostalBien"> * Code postal</label>
                        </div>
                        <div class="input-field col s12">
                             <i class="material-icons prefix">navigation</i>
                            <input id="create_villeBien" type="text" class="validate" name="create_villeBien">
                            <label for="create_villeBien">* Ville </label>
                        </div> 
                         <div class="input-field col s12">
                        <i class="material-icons prefix">navigation</i>
                            <input id="create_complementAdresseBien" type="text" class="validate" name="create_complementAdresseBien">
                            <label for="create_complementAdresseBien"> Complément</label>
                        </div>
                        <div cla 
                      </div>
                   </td>

                   <td class="input-field col s4">
                    <div class="row">
                      <h5 style="text-align:center"> Autre </h5>
                        <div class="input-field col s12">
                            
                            <input id="create_nomSyndicBien" type="text" class="validate" name="create_nomSyndicBien">
                            <label for="create_nomSyndicBien">Nom</label>
                        </div>
                        <div class="input-field col s12">
                          
                            <input id="create_mailSyndicBien" type="text" class="validate" name="create_mailSyndicBien">
                            <label for="create_mailSyndicBien">Mail </label>
                        </div> 
                      </div>
                   </td>


                   </tr>

            <tr>
              <td class="input-field col s6">
               <div class="row">
                <h5 style="text-align:center"> Propriétaire </h5>
                   <div class="input-field col s12">
                         <i class="material-icons prefix">account_circle</i>
                        <input id="create_civilitePBien" type="text" class="validate" name="create_civilitePBien">
                        <label for="create_civilitePBien">* Civilité</label>
                    </div>

                    <div class="input-field col s12">
                         <i class="material-icons prefix">account_circle</i>
                        <input id="create_namePBien" type="text" class="validate" name="create_namePBien">
                        <label for="create_namePBien">* Nom</label>
                    </div>
                   <div class="input-field col s12">
                         <i class="material-icons prefix">account_circle</i>git 
                        <input id="create_prenomPBien" type="text" class="validate" name="create_prenomPBien">
                        <label for="create_prenomPBien">* Prénom</label>
                    </div>
                 
                        <div class="input-field col s12">
                      
                            <input id="create_numTelPBien" type="number" class="validate" name="create_numTelPBien">
                            <label for="create_numTelPBien">* Téléphone</label>
                        </div>
                        <div class="input-field col s12">
                      
                            <input id="create_mailPBien" type="text" class="validate" name="create_mailPBien">
                            <label for="create_mailPBien">Mail</label>
                        </div>
                     </div>
                   </td>
                   <td  class="input-field col s6">
          
                    <div class="row">
                    <h5 style="text-align:center"> Adresse </h5>
                        <div class="input-field col s12">
                            
                            <input id="create_ruePBien" type="text" class="validate" name="create_ruePBien">
                            <label for="create_ruePBien">* Rue</label>
                        </div>
                     
                        <div class="input-field col s12">
                      
                            <input id="create_codePostalPBien" type="text" class="validate" name="create_codePostalPBien">
                            <label for="create_codePostalPBien">* Code postal</label>
                        </div>
                        <div class="input-field col s12">
                      
                            <input id="create_villePBien" type="text" class="validate" name="create_villePBien">
                            <label for="create_villePBien">* Ville </label>
                        </div>  
                         <div class="input-field col s12">
                      
                            <input id="create_complementAdressePBien" type="text" class="validate" name="create_complementAdressePBien">
                            <label for="create_complementAdressePBien">Complément </label>
                        </div>  
                      </div>
                   </td>
                   </tr>
                   </table>
                    <div class="row">
                     <div class="input-field col s12 center-align ">
                        <button class="btn waves-effect waves-light " type="submit" name="action" id="ajouterBien">Ajouter
                        <i class="material-icons right">playlist_add</i>
                        </button>
                    </div>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>

  
    
        <!-- Page Content goes here -->

	<?php 
	} 
	    include ("Includes/footer.php");
	 ?>
