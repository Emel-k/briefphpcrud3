<?php

require 'database.php';
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
            $stmt = $this->pdo->prepare('DELETE from produits where id = ?');
            return $stmt->execute([$id]);
    }

    public function modif(string $nom, float $prix, int $stock)
    {
        // Mise à jour du produit dans la base de données
        $stmt = $pdo->prepare('UPDATE produits SET nom = ?, prix = ?, stock = ? WHERE id = ?');
        $stmt->execute([$nom, $prix, $stock, $id]);
    }

}
////creation un nouveau objet de la classe produit
$produit = new Produit();

//$produit->add("poubelle", 49.99, 10);


//ajout produit

//$produit->delete();


?>

