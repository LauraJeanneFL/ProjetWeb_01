<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Timbre extends CRUD {
    protected $table = "timbre";
    protected $primaryKey = "id_timbre";
    protected $fillable = [
        'id_timbre', 
        'nom', 
        'date_creation', 
        'tirage', 
        'certifier', 
        'id_pays', 
        'id_dimensions',
        'id_condition', 
        'id_utilisateur' 
    ];

     public function getAll() {
        return $this->select(); 
    }

    public function uploadImage($file) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            throw new \Exception("Erreur lors de l'upload de l'image.");
        }
    }

    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

}