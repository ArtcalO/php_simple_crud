<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['modifier']))
{	
	$id = $_POST['id'];
	
	$nom=$_POST['nom'];
	$categorie=$_POST['categorie'];
	$date_sortie=$_POST['date_sortie'];
	$auteur=$_POST['auteur'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE livre SET nom='$nom',categorie='$categorie',date_sortie='$date_sortie',auteur='$auteur' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM livre WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$nom = $user_data['nom'];
	$categorie = $user_data['categorie'];
	$date_sortie = $user_data['date_sortie'];
	$auteur = $user_data['auteur'];
}
?>
<html>
<head>	
	<title>Modification du livre</title>
</head>

<body>
	<a href="index.php">Accueil</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nom</td>
				<td><input type="text" name="nom" value=<?php echo $nom;?>></td>
			</tr>
			<tr> 
				<td>Categorie</td>
				<td><input type="text" name="categorie" value=<?php echo $categorie;?>></td>
			</tr>
			<tr> 
				<td>Date_sortie</td>
				<td><input type="date" name="date_sortie" value=<?php echo $date_sortie;?>></td>
			</tr>
			<tr> 
				<td>Auteur</td>
				<td><input type="text" name="auteur" value=<?php echo $auteur;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="modifier" value="Modifier"></td>
			</tr>
		</table>
	</form>
</body>
</html>

