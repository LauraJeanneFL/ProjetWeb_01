<?php
namespace App\Controllers;

class HomeController {
    public function index() {
        // Charger la vue d'accueil
        require_once '../app/views/home/index.php';
    }
}