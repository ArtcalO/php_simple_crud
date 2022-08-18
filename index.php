<?php

// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM livre ORDER BY id DESC");
?>

<html>
<head>    
    <title>Accueil</title>
</head>

<body>
<a href="add.php">Ajouter un livre</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>NOM</th> <th>CATEGORIE</th> <th>DATE DE SORTIE</th> <th>AUTEUR</th><th>ACTIONS</th>
    </tr>
    <?php  
    while($liste_livre = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$liste_livre['nom']."</td>";
        echo "<td>".$liste_livre['categorie']."</td>";
        echo "<td>".$liste_livre['date_sortie']."</td>";   
        echo "<td>".$liste_livre['auteur']."</td>";   
        echo "<td><a href='edit.php?id=$liste_livre[id]'>Modifier</a> | <a href='delete.php?id=$liste_livre[id]'>Supprimer</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>
