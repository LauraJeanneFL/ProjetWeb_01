<?php

namespace App\Controllers;
use App\Models\Couleur;

class CouleurController {
    // Afficher toutes les couleurs
    public function index() {
        $couleurs = Couleur::getAll();
        require 'views/couleur/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/couleur/create.php';
    }

    // Enregistrer une nouvelle couleur
    public function store() {
        if (empty($_POST['nom'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];

        Couleur::create($data);
        header('Location: /couleur/index');
    }

     // Afficher le formulaire de modification
    public function edit($id) {
        $couleur = Couleur::getById($id);
        require 'views/couleur/edit.php';
    }

    // Enregistrer les modifications
    public function update($id) {
        if (empty($_POST['nom'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];

        Couleur::update($id, $data);
        header('Location: /couleur/index');
    }

    // Supprimer une couleur
    public function delete($id) {
        Couleur::delete($id);
        header('Location: /couleur/index');
    }
}