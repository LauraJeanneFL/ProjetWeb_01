<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'config.php';
require_once 'vendor/autoload.php';
require_once 'app/Routes/Routes.php';

use App\Routes\Route;

App\Routes\Route::get('/debug', function() {
    echo "Route de débogage fonctionnelle.";
});

try {
    echo "<pre>";
    var_dump(App\Routes\Route::getRoutes());
    echo "</pre>";
    Route::dispatch();
} catch (Exception $e) {
    http_response_code(500);
    echo "Une erreur interne est survenue : " . htmlspecialchars($e->getMessage());
    exit();
}
?>