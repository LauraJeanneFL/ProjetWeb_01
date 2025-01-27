<?php
namespace App\Routes;
echo "Chargement du fichier Routes.php<br>";

class Route{
    private static $routes = [];

    public static function get($url, $controller){
        self::$routes[] = ['url' => $url, 'controller'=> $controller, 'method' => 'GET'];
    }

    public static function post($url, $controller){
        self::$routes[] = ['url' => $url, 'controller'=> $controller, 'method' => 'POST'];
    }

    public static function dispatch(){
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $basePath = '/ProjetWeb/VsCode';
        echo "BasePath attendu : $basePath<br>";
        echo "URL reçue : $url<br>";

        if (strpos($url, $basePath) === 0) {
            $url = substr($url, strlen($basePath));
            echo "URL après suppression du basePath : $url<br>";
        }

        $urlSegments = explode('?', $url);
        $urlPath = rtrim($urlSegments[0], '/');
        echo "URL finale analysée : $urlPath<br>";
        $method = $_SERVER['REQUEST_METHOD'];
       
        foreach(self::$routes as $route){
            if(BASE.$route['url'] ==  $urlPath && $route['method'] == $method ){
                    echo "Comparaison avec la route : {$route['url']}<br>";
                    $pattern = "/^" . preg_replace('/\\\{[a-zA-Z0-9_]+\\\}/', '([a-zA-Z0-9_]+)', preg_quote($route['url'], '/')) . "$/";
                    if (preg_match($pattern, $urlPath, $matches)) {
                        echo "Route correspondante trouvée : {$route['url']}<br>";
                        return;
                    }
                //echo BASE.$route['url'].' = '.$urlPath;
                //echo $route['controller'];
                $controllerSegments = explode('@',$route['controller']);
                //print_r($controllerSegments);
                //die();
                $controllerName = "App\\Controllers\\".$controllerSegments[0];
                $methodName = $controllerSegments[1];
                $constrollerInstance = new $controllerName();

                if($method=='GET'){
                    if(isset($urlSegments[1])){
                        //echo $urlSegments[1];
                        //echo "<br>";
                        parse_str($urlSegments[1], $queryParams);
                        //print_r($queryParams);
                        $constrollerInstance->$methodName($queryParams);
                    }else {
                        $constrollerInstance->$methodName();
                    }
                    
                }elseif($method=='POST'){
                    if(isset($urlSegments[1])){
                        parse_str($urlSegments[1], $queryParams);
                        $constrollerInstance->$methodName($_POST, $queryParams);
                    }else {
                        $constrollerInstance->$methodName($_POST);
                    }
                }
                return;
            } 
        }
        http_response_code(404);
        //echo "404 Not found";
    } 
}
?>