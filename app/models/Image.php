<?php
namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;

class Image extends CRUD {
    protected $table = "image";
    protected $primaryKey = "id_image";
    protected $fillable = ['id_image', 'id_timbre', 'chemin_image', 'principale'];

    public function getAll() {
        return $this->select(); 
    }
}