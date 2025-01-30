<?php

namespace App\Controllers;

use App\Models\Timbre;
use App\Models\Log;
use App\Models\Enchere;
use App\Providers\View;

class FicheProduitController {
    public function show($data = []) {
        if (isset($data['id'])) {
            $timbre = new Timbre;
            $produit = $timbre->selectId($data['id']);

            if ($produit) {
                return View::render('fiche/fiche-produit', ['produit' => $produit]);
            }
        }

        return View::render('error/404', ['msg' => 'Produit introuvable.']);
    }
}
