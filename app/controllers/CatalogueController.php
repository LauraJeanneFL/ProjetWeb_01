<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Providers\View;

class CatalogueController {
    public function index($filtre = null, $ordre = 'ASC') {
        $encheres = new Enchere;
        $encheres = $encheres->select('nom, chemin_image');
        $filtres = $_GET;

        
    
        if (empty($encheres)) {
            return View::render('/catalogue/index', ['message' => 'Aucune enchère disponible.']);
        }
        
        return View::render('/catalogue/index', ['encheres' => $encheres]);
    }

    public function show($id) {
        $enchere = new Enchere;
        $enchere = $enchere->selectId($id); 
        
        if (!$enchere) {
            return View::render('/catalogue/show', ['message' => 'Enchère non trouvée.']);
        }
        return View::render('/catalogue/show', ['enchere' => $enchere]);
    }
    
}