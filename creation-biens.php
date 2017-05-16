    <?php
        require_once (dirname(__FILE__)."/Includes/simplecms-config-sample.php");
        require_once  (dirname(__FILE__)."/Includes/connectDB.php");
        include(dirname(__FILE__)."/Includes/header.php");


        if(logged_on())  {
     ?>
<div class="container">
    <h4>Gestion des biens</h4> <br>
    <div class=row>
        <fieldset>
            <legend> Edition bien </legend>
             <form  id="formCreationBien" action="src/ajax/create_biens.php" method="POST">
              <?php
                  if(isset($_GET["action"])){
                    if(isset($_GET["id"])){
                        echo '<input type="hidden" id="action" name="action" value="' . $_GET["id"] . '" />'."\n";

                        $donneesBien = search_biens($databaseConnection,$_GET["id"]);
                    }

                    }
                    else {
                        echo '<input type="hidden" id="action" name="action" value="insert" />'."\n";
                        $donneesBien = null;
                    }
                  ?>
            <table class = "responsive-table">
            <tr>
            	<td class="input-field col s4">
            	 <div class="row">
                <h5 style="text-align:center"> Le bien </h5>
                    <div class="input-field col s12">

                        <input id="create_superficieBien" type="number" class="validate" name="create_superficieBien" required value=<?php if(isset($donneesBien[0]))echo($donneesBien[0]); ?> >
                        <label for="create_superficieBien">* Superficie</label>
                    </div>

                        <div class="input-field col s12">

                            <input id="create_nbPiecesBien" type="number" class="validate" name="create_nbPiecesBien" value=<?php if(isset($donneesBien[1]))echo($donneesBien[1]); ?> >
                            <label for="create_nbPiecesBien">Nombre pièces</label>
                        </div>
                        <div class="input-field col s12">

                            <input id="create_nbChambresBien" type="number" class="validate" name="create_nbChambresBien" value=<?php if(isset($donneesBien[2]))echo($donneesBien[2]); ?> >
                            <label for="create_nbChambresBien">Nombre chambres</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="create_etageBien" type="number" class="validate" name="create_etageBien" value=<?php if(isset($donneesBien[3]))echo($donneesBien[3]); ?> >
                            <label for="create_etageBien">Etage</label>
                        </div>
                         <div class="input-field col s12">
                            <textarea id="create_descriptionBien" type="text" class="validate" name="create_descriptionBien" value=<?php if(isset($donneesBien[4]))echo($donneesBien[4]); ?> ></textarea>
                            <label for="create_descriptionBien">Description</label>
                        </div>
                     </div>
                   </td>
                   <td  class="input-field col s4">

                    <div class="row">
                    <h5 style="text-align:center"> Adresse </h5>
                        <div class="input-field col s12">
                             <i class="material-icons prefix">navigation</i>
                            <input id="create_rueBien" type="text" class="validate" name="create_rueBien" required value=<?php if(isset($donneesBien[5]))echo($donneesBien[5]); ?> >
                            <label for="create_rueBien">* Rue</label>
                        </div>
                        </div>

                        <div class="input-field col s12">
                        <i class="material-icons prefix">navigation</i>
                            <input id="create_codePostalBien" type="text" class="validate" name="create_codePostalBien" pattern='^[0-9]{5}$' required value=<?php if(isset($donneesBien[6]))echo($donneesBien[6]); ?> >
                            <label for="create_codePostalBien"  data-error="Incorrect" data-success="Bon"> * Code postal</label>
                        </div>
                        <div class="input-field col s12">
                             <i class="material-icons prefix">navigation</i>
                            <input id="create_villeBien" type="text" class="validate" name="create_villeBien" required value=<?php if(isset($donneesBien[7]))echo($donneesBien[7]); ?> >
                            <label for="create_villeBien">* Ville </label>
                        </div>
                         <div class="input-field col s12">
                        <i class="material-icons prefix">navigation</i>
                            <input id="create_complementAdresseBien" type="text" class="validate" name="create_complementAdresseBien" value=<?php if(isset($donneesBien[8]))echo($donneesBien[8]); ?> >
                            <label for="create_complementAdresseBien"> Complément</label>
                        </div>

                        <div>



                            <input id="create_nomSyndicBien" type="text" class="validate" name="create_nomSyndicBien" value=<?php if(isset($donneesBien[9]))echo($donneesBien[9]); ?> >
                            <label for="create_nomSyndicBien">Nom</label>
                        </div>
                        <div class="input-field col s12">

                            <input id="create_mailSyndicBien" type="email" class="validate" name="create_mailSyndicBien" value=<?php if(isset($donneesBien[10]))echo($donneesBien[10]); ?> >

                            <label for="create_mailSyndicBien" data-error="Incorrect" data-success="Bon">Mail </label>
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
                        <input id="create_civilitePBien" type="text" class="validate" name="create_civilitePBien" required value=<?php if(isset($donneesBien[11]))echo($donneesBien[11]); ?> >
                        <label for="create_civilitePBien">* Civilité</label>
                    </div>

                    <div class="input-field col s12">
                         <i class="material-icons prefix">account_circle</i>
                        <input id="create_namePBien" type="text" class="validate" name="create_namePBien" required value=<?php if(isset($donneesBien[12]))echo($donneesBien[12]); ?> >
                        <label for="create_namePBien">* Nom</label>
                    </div>
                   <div class="input-field col s12">

                         <i class="material-icons prefix">account_circle</i>git
                        <input id="create_prenomPBien" type="text" class="validate" name="create_prenomPBien" required value=<?php if(isset($donneesBien[13]))echo($donneesBien[13]); ?> >

                        <label for="create_prenomPBien">* Prénom</label>
                    </div>

                        <div class="input-field col s12">


                            <input id="create_numTelPBien" type="tel" attern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="validate" name="create_numTelPBien" required value=<?php if(isset($donneesBien[14]))echo($donneesBien[14]); ?> >
                            <label for="create_numTelPBien">* Téléphone</label>
                        </div>
                        <div class="input-field col s12">

                            <input id="create_mailPBien" type="email" class="validate" name="create_mailPBien" value=<?php if(isset($donneesBien[15]))echo($donneesBien[15]); ?> >

                            <label for="create_mailPBien" data-error="Incorrect" data-success="Bon">Mail</label>
                        </div>
                     </div>
                   </td>
                   <td  class="input-field col s6">

                    <div class="row">
                    <h5 style="text-align:center"> Adresse </h5>
                        <div class="input-field col s12">


                            <input id="create_ruePBien" type="text" class="validate" name="create_ruePBien" required value=<?php if(isset($donneesBien[16]))echo($donneesBien[16]); ?> >

                            <label for="create_ruePBien">* Rue</label>
                        </div>

                        <div class="input-field col s12">


                            <input id="create_codePostalPBien" type="text" class="validate" name="create_codePostalPBien" pattern='^[0-9]{5}$' required value=<?php if(isset($donneesBien[17]))echo($donneesBien[17]); ?> >
                            <label for="create_codePostalPBien"  data-error="Incorrect" data-success="Bon" >* Code postal</label>
                        </div>
                        <div class="input-field col s12">

                            <input id="create_villePBien" type="text" class="validate" name="create_villePBien" required value=<?php if(isset($donneesBien[18]))echo($donneesBien[18]); ?> >

                            <label for="create_villePBien">* Ville </label>
                        </div>
                         <div class="input-field col s12">

                            <input id="create_complementAdressePBien" type="text" class="validate" name="create_complementAdressePBien" value=<?php if(isset($donneesBien[19]))echo($donneesBien[19]); ?> >

                            <label for="create_complementAdressePBien">Complément </label>
                        </div>
                      </div>
                   </td>
                   </tr>
                   </table>
                    <div class="row ">
  <div class="input-field col m12 align-wrapper">
    <button class="center btn waves-effect waves-light btn-large " type="submit" name="action">Valider
        <i class="material-icons right">send</i>
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
