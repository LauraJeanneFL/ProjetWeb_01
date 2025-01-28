<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Providers\View;

class CatalogueController {
    public function index() {
        $encheres = new Enchere;
        $encheres = $encheres->select('nom');
        
        return View::render('catalogue/index', ['encheres' => $encheres]);
    }
}