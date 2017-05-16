<?php
require_once (dirname(__FILE__)."/Includes/simplecms-config-sample.php");
require_once  (dirname(__FILE__)."/Includes/connectDB.php");
include(dirname(__FILE__)."/Includes/header.php");
?>


    <div class="row">
    <form class="col s12">
        <div class="col s12"><h4>Création de bien </h4></div>
      <div class="row">
        <div class="input-field col s4">
		    <select>
		      <option value="" disabled selected>Choisir votre option</option>
		      <option value="1">Louer</option>
		      <option value="2">Acheter</option>
		      <option value="3">Vendre</option>
		    </select>
		    <label>Type d'annonce</label>
		  </div>
       <div class="input-field col s4">
		    <select>
		      <option value="" disabled selected>Choisir votre option</option>
		      <option value="1">Appartement</option>
		      <option value="2">Maison</option>
		      <option value="3">Château</option>
		      <option value="3">Bureau</option>
		      <option value="3">Boutique</option>
		    </select>
		    <label>Type de Bien</label>
		  </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <input id="email" type="email" class="validate">
            <label for="email" data-error="wrong" data-success="right">Email</label>
          </div>
        </div>
      </div>
    </form>
  </div>

<?php
	include("Includes/footer.php")
?>
