<?php
require_once ("Includes/simplecms-config-sample.php");
require_once  ("Includes/connectDB.php");
include("Includes/header.php");
if(logged_on())  {
?>
<div class="container">
    <h4>Gestion des locataires</h4> <br>
    <div class=row>
        <fieldset>
            <legend> Nom / Prénom </legend>
            <form action="actions/search_locataire.php" method="post">
                <div class="input-field col s12">
                    <input id="search" type="search" name="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </fieldset>
    </div>
    
    <table class="responsive-table striped">
        <thead>
            <tr>
                <th>Monsieur/Madame</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Téléphone</th>
                <th>Cautionnaire</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $locataires = show_locataires($databaseConnection);
                    $locataires->bind_result($civilite,$nom,$prenom,$mail,$tel,$idCautionnaire);
                    
                while($locataires->fetch()){
                    echo "
                        <tr>
                            <th>".$civilite."</th>
                            <th>".$nom."</th>
                            <th>".$prenom."</th>
                            <th>".$mail."</th>
                            <th>".$tel."</th>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</div>
<?php
}
include ("Includes/footer.php");
?>