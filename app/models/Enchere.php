<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;
use App\Providers\Database;

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
        $stmt = $this->query($sql);

        return $stmt ? $stmt->fetchAll() : [];
    }
}

