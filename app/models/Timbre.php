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

}