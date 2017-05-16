<?php
require_once (dirname(__FILE__)."/Includes/simplecms-config-sample.php");
require_once  (dirname(__FILE__)."/Includes/connectDB.php");
include(dirname(__FILE__)."/Includes/header.php");
if(logged_on())  {
?>
<div class="main">
	<h4 >Création/Edition d'un bail</h4> <br>
	<form  id="formAddBail" action="src/ajax/add_baux.php" method="POST">
	<?php
	if(isset($_GET["action"])){
		if(isset($_GET["id"])){
			  echo '<input type="hidden" id="action" name="action" value="' . $_GET["id"] . '" />'."\n";

			  $donneesBaux = search_baux($databaseConnection,$_GET["id"]);
		}

	}
	else {
		  echo '<input type="hidden" id="action" name="action" value="insert" />'."\n";
		  $donneesBaux = null;
	}

	?>
	<div class="row">
		<div class="input-field col m3">
			<div class="row">
				<h5>Le locataire</h5>
			</div>
			<div class="row">
				<div class="input-field col m12">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="add_edit_nomLocataire" type="text" class="validate" name="add_edit_nomLocataire" required value=<?php if(isset($donneesBaux[0]))echo($donneesBaux[0]); ?> >
						<label for="add_edit_nomLocataire">* Nom du locataire</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="add_edit_prenomLocataire" type="text" class="validate" name="add_edit_prenomLocataire" required value=<?php if(isset($donneesBaux))echo($donneesBaux[1]); ?> >
						<label for="add_edit_prenomLocataire">* Prénom du locataire</label>
					</div>
					<div class="input-field col s12">

						<i class="material-icons prefix">call</i>
						<input id="add_edit_telLocataire" type="tel" class="validate" name="add_edit_telLocataire" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" required value=<?php if(isset($donneesBaux))echo($donneesBaux[2]); ?> >
						<label for="add_edit_telLocataire">* Téléphone du locataire</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">mail</i>
						<input id="add_edit_mailLocataire" type="email" class="validate" name="add_edit_mailLocataire" value=<?php if(isset($donneesBaux))echo($donneesBaux[3]); ?>>
						<label for="add_edit_mailLocataire"  data-error="Incorrect" data-success="Bon">Mail du locataire</label>
					</div>
				</div>

			</div>
		</div>

		<div class="input-field col m3">
			<div class=row>
				<h5>Contrat</h5>
			</div>
			<div class="row">
				<div class="input-field col m12">
					<div class="input-field col s12">
						<i class="material-icons prefix">today</i>
						 <input id="add_edit_dateDebutLocataire" name="add_edit_dateDebutLocataire" type="date" class="datepicker" required data-value="<?php echo($donneesBaux[4]); ?>" >
						<label for="add_edit_dateDebutLocataire">* Date du début</label>

			 		</div>

			 			<div class="input-field col s12">
						<i class="material-icons prefix">today</i>
						 <input id="add_edit_dateFinLocataire" name="add_edit_dateFinLocataire" type="date" class="datepicker" required data-value="<?php echo($donneesBaux[5]); ?>" >
						<label for="add_edit_dateFinLocataire">* Date de fin</label>

			 		</div>
			 	</div>
			 </div>
			 <div class=row>
				<h5>Le bien</h5>
			</div>
			<div class=row>
				<div class="input-field col s12">
						<i class="material-icons prefix">search</i>
						<select id="add_edit_bienLocataire" required>

					<?php

						$result = search_ensemble_bien($databaseConnection);

						if(isset($donneesBaux[6])){
							if($donneesBaux[6] == $row[0])
								$selected = "selected";
						}
						if($result != FALSE){

								$row = $result->fetch_array();

								echo("<option $selected id=".$row[0]." >".$row[1]."m²&nbsp;".$row[2]."&nbsp;pièces,&nbsp;".$row[9]."&nbsp;".$row[11]." </option>");

						}

					?>
					 </select>
				</div>
			</div>
		</div>
		<div class="input-field col m3">
			<div class=row>
				<h5>Le cautionnaire</h5>
			</div>
			<div class="row">

		<div class="input-field col m12">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="add_edit_nomCautionnaire" type="text" class="validate" name="add_edit_nomCautionnaire" required value="<?php if(isset($donneesBaux))echo($donneesBaux[7]); ?> ">
						<label for="add_edit_nomCautionnaire">* Nom du Cautionnaire</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="add_edit_prenomCautionnaire" type="text" class="validate" name="add_edit_prenomCautionnaire" required value="<?php if(isset($donneesBaux))echo($donneesBaux[8]); ?>" >
						<label for="add_edit_prenomCautionnaire">* Prénom du Cautionnaire</label>
					</div>
					<div class="input-field col s12">

						<i class="material-icons prefix">call</i>
						<input id="add_edit_telCautionnaire" type="tel" class="validate" name="add_edit_telCautionnaire" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" required value="<?php if(isset($donneesBaux))echo($donneesBaux[9]); ?>" >
						<label for="add_edit_telCautionnaire">* Téléphone du Cautionnaire</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">mail</i>
						<input id="add_edit_mailCautionnaire" type="email" class="validate" name="add_edit_mailCautionnaire" value="<?php if(isset($donneesBaux))echo($donneesBaux[10]); ?>" >
						<label for="add_edit_mailCautionnaire"  data-error="Incorrect" data-success="Bon">Mail du Cautionnaire</label>
					</div>
				</div>

			</div>
			</div>
			<div class="input-field col m3">
			<div class=row>
				<h5>L'adresse du cautionnaire</h5>
			</div>
			<div class="row">

		<div class="input-field col m12">
					<div class="input-field col s12">
						<i class="material-icons prefix">location_on</i>
						<input id="add_edit_addresseCautionnaire" type="text" class="validate" name="add_edit_addresseCautionnaire" required value="<?php if(isset($donneesBaux))echo(htmlspecialchars($donneesBaux[11])); ?>">
						<label for="add_edit_addresseCautionnaire">* Adresse 1 </label>
					</div>

					<div class="input-field col s12">
						<i class="material-icons prefix">location_on</i>
						<input id="add_edit_addresseCompleCautionnaire" type="text" class="validate" required name="add_edit_addresseCompleCautionnaire" value="<?php if(isset($donneesBaux))echo(htmlspecialchars($donneesBaux[12])); ?>" >
						<label for="add_edit_addresseCompleCautionnaire"> Adresse 2 </label>
					</div>

					<div class="input-field col s12">

						<i class="material-icons prefix">location_on</i>
						<input id="add_edit_villeCautionnaire" type="text" class="validate" name="add_edit_villeCautionnaire" required value="<?php if(isset($donneesBaux))echo($donneesBaux[14]); ?>"  >
						<label for="add_edit_villeCautionnaire">* Ville</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">location_on</i>
						<input id="add_edit_codePostalCautionnaire" type="text" class="validate" required name="add_edit_codePostalCautionnaire"
						pattern='^[0-9]{5}$' value="<?php echo($donneesBaux[13]); ?>"   >
						<label for="add_edit_codePostalCautionnaire" data-error="Incorrect" data-success="Bon">Code Postal</label>
					</div>
				</div>


	</div>
	</div>
	<div class="row align-wrapper">
	<div class="col s12 m12 center">
		<button class="btn waves-effect waves-light btn-large" type="submit" name="action">Valider
		    <i class="material-icons right">send</i>
		  </button>
	</div>
	</div>
</div>


</form>
</div>



<?php
}
include ("Includes/footer.php");
?>
