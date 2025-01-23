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
        if (empty($_POST['nom']) || empty($_POST['tirage']) || empty($_POST['certifier']) || empty($_POST['id_pays']) || empty($_POST['id_dimensions']) || empty($_POST['id_condition']) || empty($_POST['id_utilisateur'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom'],
            'tirage' => $_POST['tirage'],
            'certifier' => $_POST['certifier'],
            'id_pays' => $_POST['id_pays'],
            'id_dimensions' => $_POST['id_dimensions'],
            'id_condition' => $_POST['id_condition'],
            'id_utilisateur' => $_POST['id_utilisateur']
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
        if (empty($_POST['nom']) || empty($_POST['tirage']) || empty($_POST['certifier']) || empty($_POST['id_pays']) || empty($_POST['id_dimensions']) || empty($_POST['id_condition']) || empty($_POST['id_utilisateur'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'nom' => $_POST['nom'],
            'tirage' => $_POST['tirage'],
            'certifier' => $_POST['certifier'],
            'id_pays' => $_POST['id_pays'],
            'id_dimensions' => $_POST['id_dimensions'],
            'id_condition' => $_POST['id_condition'],
            'id_utilisateur' => $_POST['id_utilisateur']
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