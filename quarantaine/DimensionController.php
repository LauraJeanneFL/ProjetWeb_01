<?php

namespace App\Controllers;

use App\Models\Dimension;
use App\Providers\View;

class DimensionController extends Controller {
    public function index() {
        try {
            $dimension = new Dimension();
            $allDimensions = $dimension->getAll();
            $this->logVisit('Dimension Index');
            return $this->render('dimension/index', ['dimensions' => $allDimensions]);
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    public function create() {
        $this->logVisit('Dimension Create');
        return $this->render('dimension/create');
    }

    public function store($data) {
        try {
            $dimension = new Dimension();
            $dimension->insert($data);
            return $this->redirect('/dimension');
        } catch (\Exception $e) {
            return $this->render('dimension/create', ['msg' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $this->logVisit('Dimension Edit');
        $dimension = new Dimension();
        $selectedDimension = $dimension->getById($id);
        if (!$selectedDimension) {
            return $this->render('error', ['msg' => 'Dimension introuvable.']);
        }
        return $this->render('dimension/edit', ['dimension' => $selectedDimension]);
    }

    public function update($id, $data) {
        try {
            $dimension = new Dimension();
            $dimension->update($id, $data);
            return $this->redirect('/dimension');
        } catch (\Exception $e) {
            return $this->render('dimension/edit', ['msg' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $dimension = new Dimension();
            $dimension->delete($id);
            return $this->redirect('/dimension');
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
