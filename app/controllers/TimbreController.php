<?php 

namespace App\Controllers;
use App\Models\Timbre;

class TimbreController {
    // Afficher tous les timbres
    public function index() {
        $timbres = Timbre::getAll();
        require 'views/timbre/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/timbre/create.php';
    }

    // Enregistrer un nouveau timbre
    public function store() {
        if (empty($_POST['nom'])) {
            die('Le nom du timbre est requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];

        Timbre::create($data);
        header('Location: /timbre/index');
    }

    // Afficher le formulaire de modification
    public function edit($id) {
        $timbre = Timbre::getById($id);
        require 'views/timbre/edit.php';
    }

    // Enregistrer les modifications
    public function update($id) {
        if (empty($_POST['nom'])) {
            die('Le nom du timbre est requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];

        Timbre::update($id, $data);
        header('Location: /timbre/index');
    }

    // Supprimer un timbre
    public function delete($id) {
        Timbre::delete($id);
        header('Location: /timbre/index');
    }
}