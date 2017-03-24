    <?php 
        require_once ("Includes/simplecms-config-sample.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php");  


        if(logged_on())  {    
     ?>

     <h3 style="text-align:center"> Edition bien</h3>
      <form method="post">
     <table>
         <tr>
         	 <th>	
	     		<h4 style="text-align:center"> Le bien </h4>
	     	</th>
	     	 <th>	
	     		<h4 style="text-align:center"> Adresse </h4>
	     	</th>
	     	 <th>	
	     		<h4 style="text-align:center"> Autre </h4>
	     	</th>
         </tr>
	     <tr>
	     	 <td>	
	     		<div style="border-style:none; border-style-left:groove; padding:15px; width:400px; height:400px">
			        <label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Propriétaire: </label> 
			        <input type="text" name="proprietaire" value="" style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Superficie: </label>
					<input type="text" name="Superficie" value=""  style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black"> Nombre de pièces: </label>
					<input type="text" name="nbPieces" value=""  style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">Nombre de chambres: </label>
					<input type="text" name="nbChambres" value="" style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">Etage: </label> 
					<input type="text" name="nbPieces" value="" style="width:30%"><br>
				</div>
	     	</td>

	     	<td>
			     <div style="border-style:none; border-left-style:groove; padding:15px;width:400px;height:400px">
			        <label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Adresse 1: </label> 
			        <input type="text" name="proprietaire" value="" style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">Adresse 2: </label>
					<input type="text" name="Superficie" value=""  style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Ville: </label>
					<input type="text" name="nbPieces" value=""  style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Code Postal</label>
					<input type="text" name="nbChambres" value="" style="width:30%"><br>
				</div>
	     	</td>
	     	<td>
			      <div style="border-style:none; border-left-style:groove; padding:15px;width:400px;height:400px">
			        <label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Secteur: </label> 
			        <input type="text" name="proprietaire" value="" style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">Agent: </label>
					<input type="text" name="Superficie" value=""  style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Ville: </label>
					<input type="text" name="nbPieces" value=""  style="width:30%"><br>

					<label style="display: block; width: 200px; float: left; font-size:16px; color:black">* Code Postal</label>
					<input type="text" name="nbChambres" value="" style="width:30%"><br>
				</div>
				</div>
	     	</td>
	     </tr>
     </table>
       </form>
    
        <!-- Page Content goes here -->

	<?php 
	} 
	    include ("Includes/footer.php");
	 ?>
