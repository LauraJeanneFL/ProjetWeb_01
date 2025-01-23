<?php
namespace App\Routes;

class Route{
    
    private static $routes = [];

    public static function get($url, $controller){
        self::$routes[] = ['url' => $url, 'controller'=> $controller, 'method' => 'GET'];
        echo "Route GET ajoutée : " . htmlspecialchars($url) . "<br>";
    }

    public static function post($url, $controller){
        self::$routes[] = ['url' => $url, 'controller'=> $controller, 'method' => 'POST'];
        echo "Route POST ajoutée : " . htmlspecialchars($url) . "<br>";
    }   

    public static function getRoutes() {
        return self::$routes;
    }

    

    public static function dispatch() {
        // Afficher les routes pour débogage
        foreach (self::$routes as $route) {
            echo "Route définie : " . htmlspecialchars($route['url']) . " (" . $route['method'] . ")<br>";
        }

        // Récupérer l'URL actuelle
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $urlPath = trim($url, '/'); // Supprimer les barres initiales et finales
        $baseTrimmed = trim(BASE, '/'); // Supprimer les barres initiales et finales de BASE

        // Retirer BASE de l'URL si elle est présente
        if (str_starts_with($urlPath, $baseTrimmed)) {
            $urlPath = substr($urlPath, strlen($baseTrimmed));
            $urlPath = trim($urlPath, '/');
        }

        // Affichage pour débogage
        echo "URL Path demandé : " . htmlspecialchars($urlPath) . "<br>";
        echo "Méthode demandée : " . htmlspecialchars($_SERVER['REQUEST_METHOD']) . "<br>";

        // Recherche dans les routes
        foreach (self::$routes as $route) {
            $routeUrl = trim($route['url'], '/'); // Nettoyer l'URL de la route

            if ($routeUrl == $urlPath && $route['method'] == $_SERVER['REQUEST_METHOD']) {
                // Gérer les closures
                if ($route['controller'] instanceof \Closure) {
                    call_user_func($route['controller']);
                    return;
                }

                // Gérer les contrôleurs et méthodes
                $controllerSegments = explode('@', $route['controller']);
                $controllerName = "App\\Controllers\\" . $controllerSegments[0];
                $methodName = $controllerSegments[1];
                $controllerInstance = new $controllerName();

                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $controllerInstance->$methodName();
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controllerInstance->$methodName($_POST);
                }
                return;
            }
        }

        // Si aucune route ne correspond
        http_response_code(404);
        echo "404 Not found";
    }
   
}
?>