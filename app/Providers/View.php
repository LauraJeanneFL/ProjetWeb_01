<?php
namespace App\Providers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\TwigFunction;

class View {
    static public function render($template, $data=[]){
        $loader = new FilesystemLoader('views');
        $twig = new Environment($loader);

         // Ajouter la fonction `asset` personnalisée
        $twig->addFunction(new TwigFunction('asset', function ($path) {
            return BASE . '/public/' . ltrim($path, '/');
        }));

        $twig->addGlobal('asset', ASSET);
        $twig->addGlobal('base', BASE);
        if(isset($_SESSION['finger_print']) and $_SESSION['finger_print']===md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
            $guest = false;
        }else{
            $guest = true;
        }
        $twig->addGlobal('guest', $guest);
        $twig->addGlobal('session', $_SESSION);
        echo $twig->render($template.".php", $data);
    }

    static public function redirect($url){
        header('location:'.BASE.'/'.$url);
    }
}