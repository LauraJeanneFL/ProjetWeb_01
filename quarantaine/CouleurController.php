<?php

namespace App\Controllers;

use App\Models\Couleur;
use App\Providers\View;

class CouleurController extends Controller {
    public function index() {
        try {
            $couleur = new Couleur();
            $allCouleurs = $couleur->getAll();
            $this->logVisit('Couleur Index');
            return $this->render('couleur/index', ['couleurs' => $allCouleurs]);
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    public function create() {
        $this->logVisit('Couleur Create');
        return $this->render('couleur/create');
    }

    public function store($data) {
        try {
            $couleur = new Couleur();
            $couleur->insert($data);
            return $this->redirect('/couleur');
        } catch (\Exception $e) {
            return $this->render('couleur/create', ['msg' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $this->logVisit('Couleur Edit');
        $couleur = new Couleur();
        $selectedCouleur = $couleur->getById($id);
        if (!$selectedCouleur) {
            return $this->render('error', ['msg' => 'Couleur introuvable.']);
        }
        return $this->render('couleur/edit', ['couleur' => $selectedCouleur]);
    }

    public function update($id, $data) {
        try {
            $couleur = new Couleur();
            $couleur->update($id, $data);
            return $this->redirect('/couleur');
        } catch (\Exception $e) {
            return $this->render('couleur/edit', ['msg' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $couleur = new Couleur();
            $couleur->delete($id);
            return $this->redirect('/couleur');
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
