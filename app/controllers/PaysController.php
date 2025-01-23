<?php 

namespace App\Controllers;
use App\Models\Pays; 

class PaysController {
    public function index() {
        $pays = Pays::getAll();
        require 'views/pays/index.php';
    }

    public function create() {
        require 'views/pays/create.php';
    }

    public function store() {
        if (empty($_POST['nom'])) {
            die('Le champ nom est requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];

        Pays::create($data);
        header('Location: /pays/index');
    }

    public function edit($id) {
        $pays = Pays::getById($id);
        require 'views/pays/edit.php';
    }

    public function update($id) {
        if (empty($_POST['nom'])) {
            die('Le champ nom est requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];

        Pays::update($id, $data);
        header('Location: /pays/index');
    }

    public function delete($id) {
        Pays::delete($id);
        header('Location: /pays/index');
    }
}
