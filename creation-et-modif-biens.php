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
            <legend> Champs de recherche </legend>
             <form  id="formBien" action="src/ajax/search_biens.php" method="POST">
            <table>
            <tr>
            	<td>
            	 <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="search_nomLocataire" type="text" class="validate" name="search_nomProprietaire">
                        <label for="search_nomLocataire">Nom propriétaire</label>
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
                            <input id="search_codePostal" type="text" class="validate" name="search_nbC">
                            <label for="search_codePostal">Nombre chambres</label>
                        </div>

                         <div class="input-field col s12">

                            <input id="search_codePostal" type="text" class="validate" name="search_nbP">
                            <label for="search_codePostal">Nombre pièces</label>
                        </div>
                        <div class="input-field col s12">

                            <input id="search_codePostal" type="text" class="validate" name="search_supMin">
                            <label for="search_codePostal">Superficie min</label>
                        </div>
                        <div class="input-field col s12">

                            <input id="search_codePostal" type="text" class="validate" name="search_supMax">
                            <label for="search_codePostal">Superficie max</label>
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

    <table class="responsive-table striped" id="tableBiens">
        <thead>
            <tr>
                <th>Superficie</th>
                <th>Nb pièces</th>
                <th>Nb chambres</th>
                <th>Propriétaire</th>
                <th>Rue</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Syndicat</th>
            </tr>
        </thead>
          <tbody id="tbodyBien">

        </tbody>
    </table>
    <div class="fixed-action-btn horizontal click-to-toggle">
    <a id="menuBaux" class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating blue darken-4"  id="addBien" href="creation-biens.php"><i class="material-icons">add</i></a></li>
      <li><a class="btn-floating orange lighten-1" id="editBien" ><i class="material-icons">mode_edit</i></a></li>
      <li><a class="btn-floating red" id="deleteBien" ><i class="material-icons">delete</i></a></li>
    </ul>
  </div>
</div>


        <!-- Page Content goes here -->

	<?php
	}
	    include ("Includes/footer.php");
	 ?>
