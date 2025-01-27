<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Enchere extends CRUD {
    protected $table = "enchere";
    protected $primaryKey = "id_enchere";
    protected $fillable = ['id_enchere', 'nom', 'date_debut', 'date_fin', 'prix_debut', 'coup_coeur_Lord', 'id_timbrer', 'status'];
    
    public function getAll() {
        return $this->select(); 
    }
}

