<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Favoris extends CRUD {
    protected $table = "favoris";
    protected $primaryKey = "id_favoris";
    protected $fillable = ['id_favoris', 'id_utilisateur', 'id_timbre', 'id_enchere', 'date_favoris'];

    public function getAll() {
        return $this->select(); 
    }
}