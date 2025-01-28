<?php

namespace App\Controllers;
use App\Providers\View;

class HomeController {
    public function index() {
        $data = [
            'title' => 'Bienvenue',
            'message' => 'Ceci est la page d\'accueil.'
        ];
        return View::render('home/index', [
        ]);
    }
}