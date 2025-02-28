<?php

require 'Database.php';
class Produit
{
    // propriété privée
    private PDO $pdo;

    // Constructeur
    public function __construct()
    {
        // Retourne une instance de Database
        $this->pdo = Database::getInstance()->getConnexion();
    }

    /** Ajout d'un nouveau produit dans la bdd
     * @param string $nom Le nom du produit
     * @param float $prix Le prix
     * @param int $stock La quantité
     * @return boolean true si ajout OK sinon false
     */


    public function add($nom, $prix, $stock)
    {
        // Requête préparée
        $stmt = $this->pdo->prepare("INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $prix, $stock]);
    }

    /** Liste de produits dans la bdd
     * @return array Tableau associatif contenant des produits
     */

    public function lister()
    {
        $stmt = $this->pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        // Requête préparée
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $this->pdo->prepare('DELETE from produits where id = ?');
            if ($stmt->execute([$id])) {
                return true;
            } else {
                return false;
            }

        }
    }
}
//creation un nouveau objet de la classe produit
$produit = new Produit();

//$produit->add("poubelle", 49.99, 10);


//ajout produit

$produit->delete();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
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
                <td> <a href="Produit.php=<?= $p['id']?>">Modifier</a></td>
                <td> <a href="Produit.php?id=<?= $p['id']?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button><a href="Produit.php?id=<?= $p['id'] ?>">Ajouter un nouveau produit</a></button>
<?php else: ?>
    <p>Aucun Produit</p>
<?php endif; ?>
</body>
</html>
