    <?php 
        require_once ("Includes/simplecms-config-sample.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php");  


        if(logged_on())  {    
     ?>
<div class="container">
    <h4>Gestion des syndics</h4> <br>
    <div class=row>
        <fieldset>
            <legend> Edition syndic </legend>
             <form  id="formCreationSyndic" action="src/ajax/create_syndics.php" method="POST">
              <?php 
                  if(isset($_GET["action"])){
                    if(isset($_GET["id"])){
                        echo '<input type="hidden" id="action" name="action" value="' . $_GET["id"] . '" />'."\n";

                        $donneesSyndic = search_syndics($databaseConnection,$_GET["id"]);
                    }

                    }
                    else {
                        echo '<input type="hidden" id="action" name="action" value="insert" />'."\n";
                        $donneesSyndic = null;
                    }
                  ?>
            <table class = "responsive-table">
            <tr>
            	<td class="input-field col s4">
            	 <div class="row">
                <h5 style="text-align:center"> Le Syndic </h5>
                        <div class="input-field col s12"> 
                            <input id="create_nomSyndic" type="text" class="validate" name="create_nomSyndic" required value=<?php if(isset($donneesSyndic[0]))echo($donneesSyndic[0]); ?> >
                            <label for="create_nomSyndic">* Nom syndic </label>
                        </div>
                 
                        <div class="input-field col s12">
                      
                            <input id="create_emailSyndic" type="text" class="validate" name="create_emailSyndic" value=<?php if(isset($donneesSyndic[1]))echo($donneesSyndic[1]); ?> >
                            <label for="create_emailSyndic">* Email syndic</label>
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
