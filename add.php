<?php

require_once 'Produit.php';
//creation un nouveau objet de la classe produit

 //Mon Code qui marche
$produit = new Produit();

// On vérifie si le champ 'nom' existe dans le formulaire (via POST) et on le récupère
$nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";

// On vérifie si le champ 'prix' existe dans le formulaire (via POST) et on le récupère
$prix = isset($_POST['prix']) ? floatval($_POST['prix']) : 0.0;

// On vérifie si le champ 'stock' existe dans le formulaire (via POST) et on le récupère
$stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;


//Ici, on vérifie si les trois variables $nom, $prix, et $stock ne sont pas vides
if(!empty($nom) && !empty($prix) && !empty($stock)){

    // Si tous les champs sont remplis, on appelle la méthode 'add' de l'objet $produit
    // pour ajouter un nouveau produit à la base de données avec les valeurs fournies.
    $produit->add($nom, $prix, $stock);

    // Après l'ajout, on redirige l'utilisateur vers la page 'index.php' pour actualiser l'affichage des produits
    header('location: index.php');


    exit();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="add.php" method="post" autocomplete="off">
    <label for="nom"> Nom</label>
    <input type="text" id="nom" name="nom" required> <br>
    <label for="prix"> Prix</label>
    <input type="text" id="prix" name="prix" required><br>
    <label for="stock"> Stock</label>
    <input type="text" id="stock" name="stock" required> <br>
    <button type="submit">Ajouter</button>

</form>
</body>
</html>
