<?php

namespace App\Controllers;

use App\Models\Favoris;
use App\Providers\View;

class FavorisController extends Controller {
    public function index() {
        try {
            $favoris = new Favoris();
            $allFavoris = $favoris->getAll();
            $this->logVisit('Favoris Index');
            return $this->render('favoris/index', ['favoris' => $allFavoris]);
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    public function add($data) {
        try {
            $favoris = new Favoris();
            $favoris->insert($data);
            return $this->redirect('/favoris');
        } catch (\Exception $e) {
            return $this->render('favoris/add', ['msg' => 'Erreur lors de l\'ajout : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $favoris = new Favoris();
            $favoris->delete($id);
            return $this->redirect('/favoris');
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
