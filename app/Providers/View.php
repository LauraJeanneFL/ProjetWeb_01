<?php
namespace App\Providers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View {
    public static function render($view, $data = []) {
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        $twig = new Environment($loader);

        try {
            return $twig->render($view . '.twig', $data);
        } catch (\Twig\Error\LoaderError $e) {
            throw new \Exception("Vue introuvable : " . $e->getMessage());
        } catch (\Twig\Error\RuntimeError $e) {
            throw new \Exception("Erreur d'exécution : " . $e->getMessage());
        } catch (\Twig\Error\SyntaxError $e) {
            throw new \Exception("Erreur de syntaxe Twig : " . $e->getMessage());
        }
    }

    public static function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}