<?php 
    require_once ("Includes/session.php");
    require_once ("Includes/simplecms-config-sample.php"); 
    require_once ("Includes/connectDB.php");
    include ("Includes/header.php");

    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT id, username FROM users WHERE username = ? AND password = SHA(?) LIMIT 1";
        $statement = $databaseConnection->prepare($query);
        $statement->bind_param('ss', $username, $password);

        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows == 1)
        {
            $statement->bind_result($_SESSION['userid'], $_SESSION['username']);
            $statement->fetch();
            header ("Location: index.php");
        }
        else
        {
            echo "Username/password combination is incorrect.";
        }
    }
?>
<div class="container">
<div id="main"  class="center-align">
    <h4> Bonjour. </h4>
    <center>
        <form action="logon.php" method="post" >
         <div class="row" >
            <div class="input-field col s6 offset-m3">
             <i class="material-icons prefix">account_circle</i>
              <input id="username" name="username" type="text" class="validate" value="">
              <label for="username">Identifiant</label>
             </div>
         </div>
         <div class="row" >
             <div class="input-field col m6 offset-m3">
             <i class="material-icons prefix">vpn_key</i>
              <input id="password" name="password" type="password" class="validate" >
              <label for="password">Mot de passe</label>
             </div>
         </div>
         <div class="row">
            <div class="input-field col m6 offset-m3">
             <button class="btn waves-effect waves-light" type="submit" name="submit">Connexion
                <i class="material-icons right">send</i>
            </button>
            </div>  
        </div>
    </form>
    </center>
</div>
</div> <!-- End of outer-wrapper which opens in header.php -->

<?php include ("Includes/footer.php"); ?>
