<?php
include ("closeDB.php");        
?>
       </div>
</main>
        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Agence de location</h5>
                <p class="grey-text text-lighten-4">Ce site est une application pour les agences de location.</p>
              </div>
 
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Projet TIC - Agence de location
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
          <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="bower_components/materialize/dist/js/materialize.min.js"></script>
      <script>
          $(".button-collapse").sideNav();
            $(document).ready(function() {
                $('select').material_select();
              });
      </script>
    </body>
</html>


