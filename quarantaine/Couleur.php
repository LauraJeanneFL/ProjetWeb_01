<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Couleur extends CRUD {

    protected $table = "couleur";
    protected $primaryKey = "id_couleur";
    protected $fillable = ['id_couleur', 'nom'];

    public function getAll() {
        return $this->select(); 
    }
}