<?php
/* Class Database
    *Se connecter à la base de données
    *Bien gérer les ressources (pattern Singleton)
    * Simplidier l'utilisation de POO

 */
class database
{
    //Propriété privée - instance unique de la connexion
    private static $instance = null;

    //pour stocker l'objet $pdo
    private $pdo;

    //Constructeur privé (il ne peut être appelé qu'une fois)
    private function __construct()
    {
        //Configuration de la base de données
        $host = "localhost";// mettre le port si je suis sur le macbook
        $dbname = "briefphp";
        $user = "root";
        $pass = "";

        try{
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public static function getInstance(){
         if (self::$instance === null){
             self::$instance = new Database();
         }
         return self::$instance;
    }

    public function getConnexion(){
        //Retourne l'objet PDO. Pourquoi ? pour voir faire des requêtes
        return $this->pdo;
    }
}



//Exemple pour appeler cette classe
//$db = Database::getInstance()->getConnection();