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
}