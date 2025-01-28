<?php

namespace App\Controllers;

use App\Models\Pays;
use App\Providers\View;

class PaysController extends Controller {
    public function index() {
        try {
            $pays = new Pays();
            $allPays = $pays->getAll();
            $this->logVisit('Pays Index');
            return $this->render('pays/index', ['pays' => $allPays]);
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    public function create() {
        $this->logVisit('Pays Create');
        return $this->render('pays/create');
    }

    public function store($data) {
        try {
            $pays = new Pays();
            $pays->insert($data);
            return $this->redirect('/pays');
        } catch (\Exception $e) {
            return $this->render('pays/create', ['msg' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $this->logVisit('Pays Edit');
        $pays = new Pays();
        $selectedPays = $pays->getById($id);
        if (!$selectedPays) {
            return $this->render('error', ['msg' => 'Pays introuvable.']);
        }
        return $this->render('pays/edit', ['pays' => $selectedPays]);
    }

    public function update($id, $data) {
        try {
            $pays = new Pays();
            $pays->update($id, $data);
            return $this->redirect('/pays');
        } catch (\Exception $e) {
            return $this->render('pays/edit', ['msg' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $pays = new Pays();
            $pays->delete($id);
            return $this->redirect('/pays');
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Erreur lors de la suppression : ' . $e->getMessage()]);
        }
    }

    private function logVisit($page) {
        $log = new \App\Models\Log();
        $log->insert([
            'id_utilisateur' => $_SESSION['user_id'] ?? null,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'date' => date('Y-m-d H:i:s'),
            'page' => $page
        ]);
    }
}
