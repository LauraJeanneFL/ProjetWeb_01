<?php
require_once '../config/config.php'; // Charger les configurations
require_once '../app/init.php'; // Charger l'autoloader et les dépendances

use App\Router;

$router = new Router();
$router->dispatch();