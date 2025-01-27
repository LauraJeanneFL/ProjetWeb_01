<?php
namespace App\Controllers;

use App\Providers\View;

class Controller {
    protected $pdo;

    public function __construct() {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=e2495693;charset=utf8', 'root', '');
    }

    public function render($view, $data = []) {
        View::render($view, $data);
    }

    public function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}