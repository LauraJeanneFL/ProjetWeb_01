<?php

namespace App\Controllers;

use App\Models\Utilisateur;

class UtilisateurController {
    public function index() {
        if (!class_exists('App\Models\Utilisateur')) {
            die('La classe Utilisateur est introuvable.');
        }
        $utilisateurs = Utilisateur::getAll();
        require 'views/utilisateur/index.php';
    }

    public function login() {
        require 'views/utilisateur/login.php';
    }

    public function authenticate() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $utilisateur = Utilisateur::findByEmail($email);
        if ($utilisateur && password_verify($password, $utilisateur['mot_de_passe'])) {
            $_SESSION['utilisateur'] = $utilisateur;
            header('Location: /utilisateur/profile');
        } else {
            echo "Identifiants invalides.";
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }

    public function sendResetLink() {
        $email = $_POST['email'];
        echo "Lien de réinitialisation envoyé à $email.";
    }

    public function resetPassword() {
        $token = $_POST['token'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        echo "Mot de passe mis à jour.";
    }

    public function profile() {
        if (!isset($_SESSION['utilisateur'])) {
            header('Location: /utilisateur/login');
            exit();
        }

        $utilisateur = $_SESSION['utilisateur'];
        $historique = []; // Charger l'historique des enchères ici
        require 'views/utilisateur/profile.php';
    }

    public function create() {
        require 'views/utilisateur/create.php';
    }

    public function store() {
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'mot_de_passe' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        Utilisateur::create($data);
        header('Location: /utilisateur/index');
    }

    public function edit($id) {
        $utilisateur = Utilisateur::getById($id);
        require 'views/utilisateur/edit.php';
    }

    public function update($id) {
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email']
        ];

        Utilisateur::update($id, $data);
        header('Location: /utilisateur/index');
    }

    public function delete($id) {
        Utilisateur::delete($id);
        header('Location: /utilisateur/index');
    }
}