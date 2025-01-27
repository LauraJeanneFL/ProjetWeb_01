<?php
session_start();
require_once 'config.php';
require_once 'vendor/autoload.php';
require_once 'App/Routes/Routes.php'; 
echo "Chargement du fichier index.php<br>";
require_once 'App/Routes/web.php'; 

//Récupération de l’URL :
$url = $_GET['url'] ?? '';
$url = explode('/', rtrim($url, '/'));

//Détermination du contrôleur et de la méthode :
$controllerName = ucfirst($url[0] ?? 'home') . 'Controller';
$methodName = $url[1] ?? 'index';

try {
    //Vérification de l’existence du contrôleur :
    $controllerClass = "App\\Controllers\\$controllerName";
    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();

        //Vérification de l’existence de la méthode :
        if (method_exists($controller, $methodName)) {
            $controller->$methodName();

        } else {
            // Méthode inexistante : afficher erreur 404
            header("HTTP/1.0 404 Not Found");
            require_once 'views/error.php';
            exit();
        }

    } else {
        // Contrôleur inexistant : afficher erreur 404
        header("HTTP/1.0 404 Not Found");
        require_once 'Views/error/404.php';
        exit();
    }
    
} catch (Exception $e) {
    // Gestion d'autres erreurs éventuelles
    header("HTTP/1.0 500 Internal Server Error");
    require_once 'Views/error/404.twig';
    exit();
}



?>