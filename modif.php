<?php

require_once "Produit.php";
require_once "database.php";
session_start();

$pdo = database::getInstance()->getConnexion();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM produits WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $produits = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si des résultats ont été trouvés
    if (!$produits) {
        // Si aucun produit n'est trouvé, rediriger ou afficher un message d'erreur
        $_SESSION['message'] = "Produit non trouvé!";
        header('Location: index.php'); // Rediriger vers la page d'accueil ou une page d'erreur
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
    $prix = isset($_POST['prix']) ? floatval($_POST['prix']) : 0.0;
    $stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;

    // Vérifie que tous les champs sont remplis
    if ($nom !== '' && $prix !== '' && $stock !== '') {
        try {
            // Mise à jour du produit dans la base de données
            $stmt = $pdo->prepare('UPDATE produits SET nom = ?, prix = ?, stock = ? WHERE id = ?');
            $stmt->execute([$nom, $prix, $stock, $id]);

            // Message de succès
            $_SESSION['message'] = "Le produit a été mis à jour avec succès.";
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            // Gestion des erreurs
            $_SESSION['message'] = "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    } else {
        // Message d'erreur si un champ est vide
        $_SESSION['message'] = "Veuillez remplir tous les champs.";
    }
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
<form action="modif.php" method="post">
    <!-- Champ caché pour l'ID -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($produits['id']) ?? '' ?>">

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($produits['nom'] ?? '') ?>"><br>

    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" value="<?= htmlspecialchars($produits['prix'] ?? '') ?>"><br>

    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" value="<?= htmlspecialchars($produits['stock'] ?? '') ?>"><br>

    <button type="submit">Modifier</button>
</form>

</body>
</html>

