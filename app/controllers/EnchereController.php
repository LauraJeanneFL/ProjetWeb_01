<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Models\Log;
use App\Providers\View;

class EnchereController extends Controller {
    public function index() {
        try {
            $enchere = new Enchere();
            $encheres = $enchere->getAll();
            $this->logVisit('Encheres');
            return $this->render('enchere/index', ['encheres' => $encheres]);
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    private function logVisit($page) {
        $log = new Log();
        $log->insert([
            'id_utilisateur' => $_SESSION['user_id'] ?? null,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'date' => date('Y-m-d H:i:s'),
            'page' => $page
        ]);
    }

    public function create() {
        $this->logVisit('Enchere Create');
        return $this->render('enchere/create');
    }

    public function store($data) {
        try {
            $enchere = new Enchere();
            $enchere->insert($data);
            return $this->redirect('/enchere');
        } catch (\Exception $e) {
            return $this->render('enchere/create', ['msg' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $this->logVisit('Enchere Edit');
        $enchere = new Enchere();
        $selectedEnchere = $enchere->getById($id);
        if (!$selectedEnchere) {
            return $this->render('error', ['msg' => 'Enchère introuvable.']);
        }
        return $this->render('enchere/edit', ['enchere' => $selectedEnchere]);
    }

    public function update($id, $data) {
        try {
            $enchere = new Enchere();
            $enchere->update($id, $data);
            return $this->redirect('/enchere');
        } catch (\Exception $e) {
            return $this->render('enchere/edit', ['msg' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $enchere = new Enchere();
            $enchere->delete($id);
            return $this->redirect('/enchere');
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Erreur lors de la suppression : ' . $e->getMessage()]);
        }
    }
}