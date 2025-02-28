<?php

require_once 'Produit.php';
//creation un nouveau objet de la classe produit

// Mon Code qui marche pas
//$produit = new Produit();
//
//
//$nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
//$prix = isset($_POST['prix']) ? trim($_POST['prix']) : "";
//$stock = isset($_POST['stock']) ? trim($_POST['stock']) : "";
//
//$produit->add($nom, $prix, $stock);
//header('location: index.php');

//----- lui de chatgtp

if (is_numeric($prix)) {
    $prix = (float) $prix;  // Convertir en float
} else {
    $error = "Le prix doit être un nombre valide.";
}

// Si aucune erreur, ajouter le produit
if (!isset($error)) {
    $produitObj->add($nom, $prix, $stock);
    header('Location: index.php'); // Rediriger vers la page des produits après ajout
    exit;
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
<form action="add.php" method="post">
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
