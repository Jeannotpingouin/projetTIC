    <?php 
        require_once ("Includes/simplecms-config-sample.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php");         
     ?>


      <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-1">Gestion des agences de location</h1>
        <div class="row center">
          <h5 class="header col s12 white-text text-darken-1" style="font-size: 1.35em" >Cette application permet de gérer les locations de bien.</h5>
        </div>
        <div class="row center">
        <?php 
        	if (!logged_on()) { 
		?>
          <a href="logon.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Se connecter</a>
         <?php 
     		}
     	?>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="src/bandeau6.jpg" alt="Unsplashed background img 1" style="display: block; transform: translate3d(-50%, 233px, 0px);"></div>
  </div>
  
<?php 
    include ("Includes/footer.php");
 ?>
