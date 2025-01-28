<?php
namespace App\Controllers;

use App\Models\Utilisateur;

class AdminController {
    public function dashboard() {
        $user = new Utilisateur();
        if (!$user->hasAccess('admin')) {
            http_response_code(403);
            echo "Accès refusé. Vous devez être administrateur.";
            exit;
        }

        echo "Bienvenue dans le tableau de bord de l'administrateur.";
    }
}