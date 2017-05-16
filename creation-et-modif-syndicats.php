    <?php
        require_once (dirname(__FILE__)."/Includes/simplecms-config-sample.php");
        require_once  (dirname(__FILE__)."/Includes/connectDB.php");
        include(dirname(__FILE__)."/Includes/header.php");


        if(logged_on())  {
     ?>
<div class="container">
    <h4>Gestion des syndics</h4> <br>
    <div class=row>
        <fieldset>
            <legend> Champs de recherche </legend>
             <form  id="formSyndic" action="src/ajax/search_syndics.php" method="POST">
            <table>
            <tr>
                <td>
                 <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="search_nomSyndic" type="text" class="validate" name="search_nomSyndic">
                        <label for="search_nomSyndic">Nom syndic</label>
                    </div>
                       <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="search_emailSyndic" type="text" class="validate" name="search_emailSyndic">
                        <label for="search_emailSyndic">Email syndic</label>
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

    <table class="responsive-table striped" id="tableSyndics">
        <thead>
            <tr>
                <th>Nom syndic</th>
                <th>Email syndic</th>
            </tr>
        </thead>
          <tbody id="tbodySyndic">

        </tbody>
    </table>
    <div class="fixed-action-btn horizontal click-to-toggle">
    <a id="menuBaux" class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating blue darken-4"  id="addSyndic" href="creation-syndics.php"><i class="material-icons">add</i></a></li>
      <li><a class="btn-floating orange lighten-1" id="editSyndic" ><i class="material-icons">mode_edit</i></a></li>
      <li><a class="btn-floating red" id="deleteSyndic" ><i class="material-icons">delete</i></a></li>
    </ul>
  </div>
</div>


        <!-- Page Content goes here -->

    <?php
    }
        include ("Includes/footer.php");
     ?>
