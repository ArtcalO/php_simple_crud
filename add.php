<html>
<head>
	<title>Ajouter Livre</title>
</head>

<body>
	<a href="index.php">Accueil</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>nom</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr> 
				<td>categorie</td>
				<td><input type="text" name="categorie"></td>
			</tr>
			<tr> 
				<td>date_sortie</td>
				<td><input type="date" name="date_sortie"></td>
			</tr>
			<tr> 
				<td>auteur</td>
				<td><input type="text" name="auteur"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nom = $_POST['nom'];
		$categorie = $_POST['categorie'];
		$date_sortie = $_POST['date_sortie'];
		$auteur = $_POST['auteur'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO livre(nom,categorie,date_sortie,auteur) VALUES('$nom','$categorie','$date_sortie','$auteur')");
		
		// Show message when user added
		echo "Livre ajoute avec success";
		header("Location:index.php");
	}
	?>
</body>
</html>
