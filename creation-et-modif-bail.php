<?php
require_once (dirname(__FILE__)."/Includes/simplecms-config-sample.php");
require_once  (dirname(__FILE__)."/Includes/connectDB.php");
include(dirname(__FILE__)."/Includes/header.php");
if(logged_on())  {
?>
<div class="container">
    <h4>Gestion des baux</h4> <br>
    <div class=row>
        <fieldset>
            <legend> Champs de recherche </legend>
            <form  id="formBail" action="src/ajax/search_baux.php" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="search_nomLocataire" type="text" class="validate" name="search_nomLocataire">
                        <label for="search_nomLocataire">Nom du locataire</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="search_nomCautionnaire" type="text" class="validate" name="search_nomCautionnaire">
                        <label for="search_nomCautionnaire">Nom du cautionnaire</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <i class="material-icons prefix">navigation</i>
                            <input id="search_rue" type="text" class="validate" name="search_rue">
                            <label for="search_rue">Rue</label>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">navigation</i>
                            <input id="search_ville" type="text" class="validate" name="search_ville">
                            <label for="search_ville">Ville</label>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">navigation</i>
                            <input id="search_codePostal" type="text" class="validate" name="search_codePostal">
                            <label for="search_codePostal">Code Postal</label>
                        </div>
                    </div>
                    <div class="row">
                     <div class="input-field col s12 center-align ">
                        <button class="btn waves-effect waves-light " type="submit" name="action" id="rechercherBail">Rechercher
                        <i class="material-icons right">search</i>
                        </button>
                    </div>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>

    <table class="responsive-table striped" id="tableBail">
        <thead>
            <tr>
                <th>Nom / Prénom du Locataire</th>
                <th>Téléphone du Locataire</th>
                <th>Mail du Locataire</th>
                <th>Nom / Prénom du Cautionnaire</th>
                <th>Téléphone du Cautionnaire</th>
                <th>Mail du Cautionnaire</th>
                <th>Adresse du Bien</th>
                <th>Ville du Bien</th>
                <th>Date du début du Bail</th>
                <th>Date de fin du Bail</th>
            </tr>
        </thead>
        <tbody id="tbodyBail">

        </tbody>
    </table><br><br>
    <div class="fixed-action-btn horizontal click-to-toggle">
    <a id="menuBaux" class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating blue darken-4"  id="addBaux" href="creation-baux.php"><i class="material-icons">add</i></a></li>
      <li><a class="btn-floating orange lighten-1" id="editBaux" ><i class="material-icons">mode_edit</i></a></li>
      <li><a class="btn-floating red" id="deleteBaux" ><i class="material-icons">delete</i></a></li>
    </ul>
  </div>
</div>
<?php
}
    include ("Includes/footer.php");
?>
