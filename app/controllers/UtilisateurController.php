<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Privilege;
use App\Models\Utilisateur;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UtilisateurController {

    public function __construct() {
        Auth::session();
    }

    public function create() {
        return View::render('utilisateur/create');
    }

    public function store($data) {
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
        $validator->field('email', $data['email'])->email();
        $validator->field('password', $data['password'])->min(6);

        if ($validator->isSuccess()) {
            $user = new Utilisateur;
            $user->insert($data);
            return View::redirect('login');
        } else {
            $errors = $validator->getErrors();
            return View::render('utilisateur/create', ['errors' => $errors, 'inputs' => $data]);
        }
    }

    public function login() {
        return View::render('utilisateur/login');
    }

    public function authenticate($data) {
        // Logique d'authentification
        return View::redirect('home');
    }

    public function logout() {
        session_destroy();
        return View::redirect('login');
    }
}
