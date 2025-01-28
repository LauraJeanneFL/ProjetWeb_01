<?php
namespace App\Controllers;

use App\Models\Enchere;
use App\Providers\View;
use App\Providers\Validator;

class EnchereController {

    public function index() {
        $enchere = new Enchere;
        $encheres = $enchere->select('date_debut');
        
        if ($encheres) {
            return View::render('enchere/index', ['encheres' => $encheres]);
        } else {
            return View::render('error', ['msg' => 'Aucune enchère disponible.']);
        }
    }

    public function actives() {
        $enchere = new Enchere;
        $encheres = $enchere->getActives();

        if ($encheres) {
            return View::render('enchere/actives', ['encheres' => $encheres]);
        } else {
            return View::render('error', ['msg' => 'Aucune enchère active trouvée.']);
        }
    }

    public function create() {
        return View::render('enchere/create');
    }

    public function store($data) {
        $validator = new Validator;
        $validator->field('nom', $data['nom'])->min(2)->max(50);
        $validator->field('prix_debut', $data['prix_debut'])->required()->number();
        $validator->field('date_debut', $data['date_debut'])->required();
        $validator->field('date_fin', $data['date_fin'])->required();

        if ($validator->isSuccess()) {
            $enchere = new Enchere;
            $insert = $enchere->insert($data);

            if ($insert) {
                return View::redirect('enchere');
            } else {
                return View::render('error', ['msg' => 'Erreur lors de la création de l\'enchère.']);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('enchere/create', ['errors' => $errors, 'inputs' => $data]);
        }
    }

    public function edit($data = []) {
        if (isset($data['id']) && $data['id'] != null) {
            $enchere = new Enchere;
            $selectedEnchere = $enchere->selectId($data['id']);

            if ($selectedEnchere) {
                return View::render('enchere/edit', ['enchere' => $selectedEnchere]);
            } else {
                return View::render('error', ['msg' => 'Enchère non trouvée.']);
            }
        }
        return View::render('error', ['msg' => 'ID de l\'enchère manquant.']);
    }

    public function update($data = [], $get = []) {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('nom', $data['nom'])->min(2)->max(50);
            $validator->field('prix_debut', $data['prix_debut'])->required()->number();
            $validator->field('date_debut', $data['date_debut'])->required();
            $validator->field('date_fin', $data['date_fin'])->required();

            if ($validator->isSuccess()) {
                $enchere = new Enchere;
                $update = $enchere->update($data, $get['id']);

                if ($update) {
                    return View::redirect('enchere');
                } else {
                    return View::render('error', ['msg' => 'Erreur lors de la mise à jour de l\'enchère.']);
                }
            } else {
                $errors = $validator->getErrors();
                return View::render('enchere/edit', ['errors' => $errors, 'inputs' => $data]);
            }
        }
        return View::render('error', ['msg' => 'ID de l\'enchère manquant.']);
    }

    public function delete($data) {
        $enchere = new Enchere;
        $delete = $enchere->delete($data['id']);

        if ($delete) {
            return View::redirect('enchere');
        } else {
            return View::render('error', ['msg' => 'Erreur lors de la suppression de l\'enchère.']);
        }
    }
}