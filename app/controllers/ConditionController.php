<?php 

namespace App\Controllers;
use App\Models\Condition; 

class ConditionController {
    public function index() {
        $conditions = Condition::getAll();
        require 'views/condition/index.php';
    }

    public function create() {
        require 'views/condition/create.php';
    }

    public function store() {
        if (empty($_POST['nom'])) {
            die('Le champ "nom" est requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];
        
        Condition::create($data);
        header('Location: /condition/index');
    }

    public function edit($id) {
        $condition = Condition::getById($id);
        require 'views/condition/edit.php';
    }
  
    public function update($id) {
        if (empty($_POST['nom'])) {
            die('Le champ "nom" est requis.');
        }

        $data = [
            'nom' => $_POST['nom']
        ];
        Condition::update($id, $data);
        header('Location: /condition/index');
    }

    public function delete($id) {
        Condition::delete($id);
        header('Location: /condition/index');
    }
}