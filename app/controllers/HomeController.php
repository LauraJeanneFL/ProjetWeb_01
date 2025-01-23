<?php

namespace App\Controllers;
use App\Models\ExampleModel;

class HomeController {
    public function index() {
        require_once 'views/home/index.php';
    }

    public function about() {
        // Charger une vue
        require_once 'views/home/about.php';
    }
}