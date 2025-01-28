<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Condition extends CRUD {
    protected $table = "condition";
    protected $primaryKey = "id_condition";
    protected $fillable = ['id_condition', 'nom'];

    public function getAll() {
        return $this->select(); 
    }
}