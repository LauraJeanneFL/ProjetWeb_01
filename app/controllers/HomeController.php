<?php

namespace App\Controllers;

//use App\Models\Utilisateur;
use App\Providers\View;

class HomeController {
    public function index() {
        return View::render('home/index', [
        ]);
    }
}