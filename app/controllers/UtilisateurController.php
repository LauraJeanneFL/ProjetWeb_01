<?php 

namespace App\Controller;
use App\Models\Utilisateur;

class UtilisateurController {
    // Afficher tous les utilisateurs
    public function index() {
        $utilisateurs = Utilisateur::getAll();
        require 'views/utilisateur/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/utilisateur/create.php';
    }

    // Enregistrer un nouvel utilisateur
    public function store() {
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        Utilisateur::create($data);
        header('Location: /utilisateur/index');
    }

    // Afficher le formulaire de modification
    public function edit($id) {
        $utilisateur = Utilisateur::getById($id);
        require 'views/utilisateur/edit.php';
    }

    // Enregistrer les modifications
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

    // Supprimer un utilisateur
    public function delete($id) {
        Utilisateur::delete($id);
        header('Location: /utilisateur/index');
    }
}