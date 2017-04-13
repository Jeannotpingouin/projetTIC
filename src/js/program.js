 			$(".button-collapse").sideNav();
        	$.clickDelete = null;
            	$.clickEdit = null;
            


 			function ajaxDeleteBaux(identifiant){
 				  $.ajax({
			                url: 'src/ajax/delete_baux.php', // Le nom du fichier indiqué dans le formulaire
			                type: 'POST', // La méthode indiquée dans le formulaire (get ou post)
			                data: 'idBaux='+identifiant, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
			                success: function(data,statut) { // Je récupère la réponse du fichier PHP
			 
			                }
			            });
 			}


            $(document).ready(function() {
    			
  					
				  $('.datepicker').pickadate({
				    selectMonths: true, // Creates a dropdown to control month
				    selectYears: 15 // Creates a dropdown of 15 years to control year
				  });
				  
				$('#deleteBaux').on('click',function(e){
					if(!$(this).hasClass("red")){
							$(this).addClass("red")
						 $('#editBaux').removeClass("orange lighten-1")
						 $('#addBaux').removeClass("blue darken-4")
					} else{
					 $('#editBaux').toggleClass("orange lighten-1")
					 $('#addBaux').toggleClass("blue darken-4")
					}

					if( $.clickDelete == null){
						 $.clickDelete = "checked"
					} else{
						 $.clickDelete = null
					}
					 $.clickEdit = null

				});


				$('#editBaux').on('click',function(e){
					if(!$(this).hasClass("orange lighten-1")){
						$(this).addClass("orange lighten-1")
						$('#deleteBaux').removeClass("red")
					 	$('#addBaux').removeClass("blue darken-4")
					} else{
					 $('#deleteBaux').toggleClass("red")
					 $('#addBaux').toggleClass("blue darken-4")
					}

					if( $.clickEdit == null){
						 $.clickEdit = "checked"
					} else{
						 $.clickEdit = null
					}
					 $.clickDelete = null
				});
				$('#addBaux').on('click',function(e){
					if(!$(this).hasClass("blue darken-4")){
						$(this).addClass("blue darken-4")
						$('#deleteBaux').removeClass("red")
					 	$('#editBaux').removeClass("orange lighten-1")
					} else{
					 $('#deleteBaux').toggleClass("red")
					 $('#editBaux').toggleClass("orange lighten-1")
					}
					 $.clickDelete = null
					 $.clickEdit = null
				});

				$('#tbodyBail').on('mouseover','tr',function(){
					if($.clickDelete != null){
						$(this).addClass("red");
							}
					if($.clickEdit != null){
						$(this).addClass("orange");
					}
				});
				$('#tbodyBail').on('mouseout','tr',function(){
						$(this).removeClass("red");
						$(this).removeClass("orange");
				});

				$("#tbodyBail").on('click','tr',function() {
					 	if($.clickDelete != null){
					 		//ajaxDeleteBaux(attr("id"));
						}
					});

                $('select').material_select();
			    // Lorsque je soumets le formulaire

			    $('#formBail').on('submit', function(e) {
			        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
			        $('#tbodyBail').empty();
			        var $this = $(this); // L'objet jQuery du formulaire
			 	
			            // Envoi de la requête HTTP en mode asynchrone
			            $.ajax({
			                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
			                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
			                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
			                success: function(data,statut) { // Je récupère la réponse du fichier PHP
			      
			                     $.each(JSON.parse(data), function(key, val){
						
				 					$('#tbodyBail').append('<tr id='+val[0]+'><th>'+val[1]+' '+val[2]+'</th><th>'+val[3]+'</th><th>'+val[4]+'</th><th>'+val[5]+' '+val[6]+'</th><th>'+val[7]+'</th><th>'+val[8]+'</th><th>'+val[9]+'</th><th>'+val[11]+'-'+val[10]+'</th><th>'+val[12]+'</th><th>'+val[13]+'</th></tr>');
                             
                        			});
							  		
			                }
			            });
				});

			    /********************************************************************************************************
			    ****************************************FONCTION DE CREATION BAIL****************************************
			    ********************************************************************************************************/
			       $('#formAddBail').on('submit', function(e) {
			        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
			        var $this = $(this); // L'objet jQuery du formulaire
			
			 		var g =$('#add_edit_bienLocataire').val();  
					var id = $('#browsers option').filter(function() { return $.trim( $(this).val() ) === $.trim(g); }).attr('id');
					 
					var myObject = {
						add_edit_bienLocataire : id
					};
			
					$formSerialize = $this.serialize() + "&" + $.param(myObject);
				
			            $.ajax({
			                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
			                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
			                data: $formSerialize, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
			                success: function(data,statut) { // Je récupère la réponse du fichier PHP
			         				if(data == "ok"){
			         					$(location).attr('href', '/projetTIC/creation-et-modif-bail.php');
			         				}
			                }
			            });
			
				});


              });