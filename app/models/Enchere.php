<?php
namespace App\Models;

use PDO; 
use App\Models\CRUD;
use App\Providers\View;
use App\Providers\Database;
use Exception;

class Enchere extends CRUD  {
    protected $table = "enchere";
    protected $primaryKey = "id_enchere";
    protected $fillable = 
        [
            'id_enchere', 
            'nom', 
            'date_debut', 
            'date_fin', 
            'prix_debut', 
            'coup_coeur_Lord', 
            'id_timbrer', 
            'status'
        ];
    
    public function getAll() {
        $sql = "SELECT * FROM enchere";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function getActives() {
        $sql = "SELECT * FROM $this->table WHERE status = 1";
        $stmt = $this->pdo->query($sql);

        return $stmt ? $stmt->fetchAll() : [];
    }

    public function search($query) {
        $sql = "SELECT * FROM enchere WHERE nom LIKE :query";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['query' => "%$query%"]);
        return $stmt->fetchAll();
    }

    public function selectWhere(array $conditions) {
        $whereClause = implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($conditions)));
        $sql = "SELECT * FROM {$this->table} WHERE $whereClause";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($conditions);
        return $stmt->fetchAll();
    }

   public function getEncheresWithImages() {
        $sql = "SELECT e.*, i.chemin_image 
                FROM enchere e
                LEFT JOIN timbre t ON e.id_timbre = t.id_timbre
                LEFT JOIN image i ON t.id_timbre = i.id_timbre
                WHERE e.status = 1";

        try {
            $stmt = $this->pdo->query($sql);

            if (!$stmt) {
                throw new Exception("Erreur lors de l'exécution de la requête SQL.");
            }

            $encheres = $stmt->fetchAll();

            return $encheres;
        } catch (Exception $e) {
            die("🔥 Erreur SQL : " . $e->getMessage());
        }
    }

    public function getEncheresActives() {
        try {
            $sql = "SELECT * FROM enchere WHERE status = 1";
            $stmt = $this->pdo->query($sql);

            if ($stmt === false) {
                $errorInfo = $this->pdo->errorInfo();
                throw new Exception("Erreur SQL : " . $errorInfo[2]);
            }

            $encheres = $stmt->fetchAll();


            return $encheres;
        } catch (Exception $e) {
            error_log("Erreur dans getEncheresActives : " . $e->getMessage());
            return [];
        }
    }

    public function getAllEncheres() {
        $sql = "SELECT * FROM enchere";
        
        try {
            $stmt = $this->pdo->query($sql);
            $encheres = $stmt->fetchAll(PDO::FETCH_ASSOC);

            var_dump("Test sans jointure :", count($encheres));
            var_dump("Données récupérées :", $encheres);
            exit;

            return $encheres;
        } catch (Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }
}

