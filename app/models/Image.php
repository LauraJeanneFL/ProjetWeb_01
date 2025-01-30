<?php
namespace App\Models;

use App\Models\CRUD;

class Image extends CRUD {
    protected $table = "image";
    protected $primaryKey = "id_image";
    protected $fillable = ["id_timbre", "chemin_image", "principale"];
}