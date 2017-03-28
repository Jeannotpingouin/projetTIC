 			$(".button-collapse").sideNav();
            $(document).ready(function() {
                $('select').material_select();
			    // Lorsque je soumets le formulaire
			    $('#formBail').on('submit', function(e) {
			        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

			        var $this = $(this); // L'objet jQuery du formulaire
			 		alert($this.serialize());
			            // Envoi de la requête HTTP en mode asynchrone
			            $.ajax({
			                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
			                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
			                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
			                success: function(html,statut) { // Je récupère la réponse du fichier PHP
			                    alert(html); // J'affiche cette réponse
			                }
			            });
				});



              });