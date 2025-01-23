<?php 

namespace App\Controllers;
use App\Models\Favoris; 

class FavorisController {
    // Afficher tous les favoris
    public function index() {
        $favoris = Favoris::getAll();
        require 'views/favoris/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/favoris/create.php';
    }

    // Enregistrer un nouveau favori
    public function store() {
        if (empty($_POST['id_utilisateur']) || empty($_POST['id_timbre']) || empty($_POST['id_enchere'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'id_utilisateur' => $_POST['id_utilisateur'],
            'id_timbre' => $_POST['id_timbre'],
            'id_enchere' => $_POST['id_enchere'],
            'date_favori' => date('Y-m-d H:i:s')
        ];

        Favoris::create($data);
        header('Location: /favoris/index');
    }

    // Afficher le formulaire de modification
    public function edit($id) {
        $favori = Favoris::getById($id);
        require 'views/favoris/edit.php';
    }

    // Enregistrer les modifications
    public function update($id) {
        if (empty($_POST['id_utilisateur']) || empty($_POST['id_timbre']) || empty($_POST['id_enchere'])) {
            die('Tous les champs sont requis.');
        }

        $data = [
            'id_utilisateur' => $_POST['id_utilisateur'],
            'id_timbre' => $_POST['id_timbre'],
            'id_enchere' => $_POST['id_enchere']
        ];

        Favoris::update($id, $data);
        header('Location: /favoris/index');
    }

    // Supprimer un favori
    public function delete($id) {
        Favoris::delete($id);
        header('Location: /favoris/index');
    }
}
