<?php
require_once ("Includes/simplecms-config-sample.php");
require_once  ("Includes/connectDB.php");
include("Includes/header.php");
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
                <th>Adresse du Cautionnaire</th>
                <th>Ville du Cautionnaire</th>
                <th>Date du début du Bail</th>
                <th>Date de fin du Bail</th>    
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<?php
}
include ("Includes/footer.php");
?>