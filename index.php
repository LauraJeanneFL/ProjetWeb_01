<?php
session_start();

// Charger la configuration et les dépendances
require_once 'config.php';
require_once 'vendor/autoload.php';
require_once 'app/Routes/Routes.php';

// Utiliser le système de routage défini dans Routes.php
use App\Routes\Route;

try {
    // Appeler la méthode dispatch pour gérer les routes
    Route::dispatch();
} catch (Exception $e) {
    // Gestion des erreurs éventuelles (404 ou 500)
    http_response_code(500);
    echo "Une erreur interne est survenue : " . htmlspecialchars($e->getMessage());
    exit();
}
?>