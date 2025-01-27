<?php
namespace App\Providers;

use PDO;

class Database {
    private static $instance = null;

    private function __construct() {} 
    public static function getInstance() {
        if (self::$instance === null) {
            try {
                $dsn = "mysql:host=localhost;dbname=e2495693;charset=utf8mb4";
                $username = "root"; 
                $password = "";
                self::$instance = new PDO($dsn, $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (\PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}