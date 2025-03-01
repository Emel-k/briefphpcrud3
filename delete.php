<?php
require_once("Produit.php");
require_once("database.php");

try {
    //Création d'une instance PDO
    $pdo = Database::getInstance()->getConnexion();
    //Configuration de PDO en cas d'exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //S'il y a une erreur de connexion
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('DELETE from produits where id = ?');
    $produits = $stmt->execute([$id]);

}