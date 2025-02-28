<?php

require 'Database.php';
class Produit
{
    // propriété privée
    private $pdo;

    // Constructeur
    public function __construct(){
        // Retourne une instance de Database
        $this->pdo = Database::getInstance()->getConnexion();
    }

    /** Ajout d'un nouveau produit dans la bdd
     * @param string $nom Le nom du produit
     * @param float $prix Le prix
     * @param int $stock La quantité
     * @return boolean true si ajout OK sinon false
     */


    public function ajouter( $nom, $prix, $stock) {
        // Requête préparée
        $stmt = $this->pdo->prepare("INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $prix, $stock]);
    }

    /** Liste de produits dans la bdd
     * @return array Tableau associatif contenant des produits
     */

    public function lister() {
        $stmt = $this->pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}