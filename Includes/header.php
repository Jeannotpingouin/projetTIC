<?php require_once ("Includes/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
     <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
    </head>
    <body>
        <div class="container">
        <header>
                        <?php
                        if (logged_on())
                        {
                            echo '<li><a href="/logoff.php">Sign out</a></li>' . "\n";
                            if (is_admin())
                            {
                                
                                echo '<li><a href="/addpage.php">Add</a></li>' . "\n";
                                echo '<li><a href="/selectpagetoedit.php">Edit</a></li>' . "\n";
                                echo '<li><a href="/deletepage.php">Delete</a></li>' . "\n";
                                                           
                            }
                        }
                        else
                        {
                            echo '<li><a href="/projet_tic/projetTIC/logon.php">Login</a></li>' . "\n";
                            echo '<li><a href="/register.php">Register</a></li>' . "\n";
                        }
                        ?>
                        </ul>
                    </section>
                </div>
  <nav>
    <div class="nav-wrapper">
      <a href="/index.php" class="brand-logo">Agence de location</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/projet_tic/projetTIC/creation-et-modif-locataires.php">Créer/Modifier des locataires</a></li>
        <li><a href="/projet_tic/projetTIC/creation-et-modif-biens.php">Créer des biens</a></li>
        <li><a href="/projet_tic/projetTIC/creation-et-modif-bails.php">Créer un bail</a></li>
        
      <ul class="side-nav" id="mobile-demo">
        <li><a href="/projet_tic/projetTIC/creation-et-modif-locataires.php">Créer/Modifier des locataires</a></li>
        <li><a href="/projet_tic/projetTIC/creation-et-modif-biens.php">Créer des biens</a></li>
        <li><a href="/projet_tic/projetTIC/creation-et-modif-bails.php">Créer un bail</a></li>
      </ul>
    </div>
  </nav>

                            <!-- ON PEUT EFFACER CETTE PARTIE INUTILE-->
                            <?php
                                /*
                                $statement = $databaseConnection->prepare("SELECT id, menulabel FROM pages");
                                $statement->execute();

                                if($statement->error)
                                {
                                    die("Database query failed: " . $statement->error);
                                }

                                $statement->bind_result($id, $menulabel);
                                while($statement->fetch())
                                {
                                    echo "<li><a href=\"/page.php?pageid=$id\">$menulabel</a></li>\n";
                                }
                                */
                            ?>
      
        </header>

