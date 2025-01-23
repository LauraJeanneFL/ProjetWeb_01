<?php

namespace App\Controllers;
use App\Models\Enchere;

class EnchereController {
    // Afficher toutes les enchères
    public function index() {
        $encheres = Enchere::getAll();
        require 'views/enchere/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/enchere/create.php';
    }

    // Enregistrer une nouvelle enchère
    public function store() {
        if (empty($_POST['nom']) || empty($_POST['prix_debut']) || empty($_POST['date_debut']) || empty($_POST['date_fin']) || empty($_POST['id_timbre'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom'],
            'prix_debut' => $_POST['prix_debut'],
            'date_debut' => $_POST['date_debut'],
            'date_fin' => $_POST['date_fin'],
            'id_timbre' => $_POST['id_timbre']
        ];
        
        Enchere::create($data);
        header('Location: /enchere/index');
    }

    // Afficher le formulaire de modification
    public function edit($id) {
        $enchere = Enchere::getById($id);
        require 'views/enchere/edit.php';
    }

    // Enregistrer les modifications
    public function update($id) {
        $data = [
            'nom' => $_POST['nom'],
            'prix_debut' => $_POST['prix_debut'],
            'date_debut' => $_POST['date_debut'],
            'date_fin' => $_POST['date_fin'],
            'id_timbre' => $_POST['id_timbre']
        ];
        Enchere::update($id, $data);
        header('Location: /enchere/index');
    }

    // Supprimer une enchère
    public function delete($id) {
        Enchere::delete($id);
        header('Location: /enchere/index');
    }
}