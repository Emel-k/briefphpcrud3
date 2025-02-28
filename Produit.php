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


    public function add(string $nom, float $prix, int $stock)
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
////creation un nouveau objet de la classe produit
$produit = new Produit();

//$produit->add("poubelle", 49.99, 10);


//ajout produit

//$produit->delete();


?>

