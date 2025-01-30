<?php
namespace App\Providers;
use App\Providers\View;

class Auth {
    static public function session(){
        if (!isset($_SESSION)) {
            session_start();
        }

        // Crée l'empreinte digitale si elle n'existe pas encore
        if (!isset($_SESSION['finger_print'])) {
            $_SESSION['finger_print'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
        }

        if ($_SESSION['finger_print'] === md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])) {
            return true;
        } 

        if ($_SERVER['REQUEST_URI'] !== BASE . '/utilisateur/login' && $_SERVER['REQUEST_URI'] !== BASE . '/utilisateur/register') {
            return View::redirect('/utilisateur/login'); 
        }
    }

    static public function privilege($id){
        if($_SESSION['privilege_id']===$id){
            return true;
        }else{
            return view::redirect('login');
        }
    }
}