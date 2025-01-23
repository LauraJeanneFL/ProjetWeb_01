<?php 

namespace App\Controllers;
use App\Models\Dimension; 

class DimensionController {
    // Afficher toutes les dimensions
    public function index() {
        $dimensions = Dimension::getAll();
        require 'views/dimension/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/dimension/create.php';
    }

    // Enregistrer une nouvelle dimension
    public function store() {
        if (empty($_POST['largeur']) || empty($_POST['hauteur'])) {
            die('Les champs largeur et hauteur sont requis.');
        }

        $data = [
            'largeur' => $_POST['largeur'],
            'hauteur' => $_POST['hauteur']
        ];

        Dimension::create($data);
        header('Location: /dimension/index');
    }

    // Afficher le formulaire de modification
    public function edit($id) {
        $dimension = Dimension::getById($id);
        require 'views/dimension/edit.php';
    }

    // Enregistrer les modifications
    public function update($id) {
        if (empty($_POST['largeur']) || empty($_POST['hauteur'])) {
            die('Les champs largeur et hauteur sont requis.');
        }

        $data = [
            'largeur' => $_POST['largeur'],
            'hauteur' => $_POST['hauteur']
        ];

        Dimension::update($id, $data);
        header('Location: /dimension/index');
    }

    // Supprimer une dimension
    public function delete($id) {
        Dimension::delete($id);
        header('Location: /dimension/index');
    }
}