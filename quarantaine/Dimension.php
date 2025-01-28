<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Dimension extends CRUD {
    protected $table = "dimension";
    protected $primaryKey = "id_dimensions";
    protected $fillable = ['id_dimensions', 'largeur', 'hauteur'];

    public function getAll() {
        return $this->select(); 
    }
}