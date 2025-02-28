<?php
require_once 'Produit.php';

$produitObj = new Produit();

//Liste des produits
$produits = $produitObj->lister();
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
<?php if (!empty($produits)):  ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>stock</th>
        </tr>
        </thead>
        <tbody>
        <!-- PHP -->
        <?php foreach ($produits as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['id']) ?></td>
                <td><?= htmlspecialchars($p['nom']) ?></td>
                <td><?= htmlspecialchars($p['prix']) ?></td>
                <td><?= htmlspecialchars($p['stock']) ?></td>
                <td> <a href="edit.php=<?= $p['id']?>">Modifier</a></td>
                <td> <a href="delete.php?id=<?= $p['id']?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button><a href="add.php?id=<?= $p['id'] ?>">Ajouter un nouveau produit</a></button>
<?php else: ?>
    <p>Aucun Produit</p>
<?php endif; ?>
</body>
</html>
