<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Pays extends CRUD {
    protected $table = "pays";
    protected $primaryKey = "id_pays";
    protected $fillable = ['id_pays', 'nom'];

    public function getAll() {
        return $this->select(); 
    }
}