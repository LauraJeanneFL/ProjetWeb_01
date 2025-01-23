<?php

namespace App\Controllers;
use App\Models\Condition; 

class ConditionController {
    // Afficher toutes les conditions
    public function index() {
        $conditions = Condition::getAll();
        require 'views/condition/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/condition/create.php';
    }

    // Enregistrer une nouvelle condition
    public function store() {
        if (empty($_POST['description'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST ['nom'],
            'description' => $_POST['description']
        ];
        
        Condition::create($data);
        header('Location: /condition/index');
    }

    // Afficher le formulaire de modification
    public function edit($id) {
        $condition = Condition::getById($id);
        require 'views/condition/edit.php';
    }

    // Enregistrer les modifications   
    public function update($id) {
        if (empty($_POST['description'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom'],
            'description' => $_POST['description']
        ];
        Condition::update($id, $data);
        header('Location: /condition/index');
    }

    // Supprimer une condition
    public function delete($id) {
        Condition::delete($id);
        header('Location: /condition/index');
    }
    
}