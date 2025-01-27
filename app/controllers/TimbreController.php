<?php
namespace App\Controllers;

use App\Models\Timbre;
use App\Models\Log;
use App\Providers\View;

class TimbreController extends Controller {
    public function index() {
        try {
            $timbre = new Timbre();
            $timbres = $timbre->getAll();
            $this->logVisit('Timbres');
            return $this->render('timbre/index', ['timbres' => $timbres]);
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
        $this->logVisit('Timbre Create');
        return $this->render('timbre/create');
    }

    public function store($data) {
        try {
            $timbre = new Timbre();
            $timbre->insert($data);
            return $this->redirect('/timbre');
        } catch (\Exception $e) {
            return $this->render('timbre/create', ['msg' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $this->logVisit('Timbre Edit');
        $timbre = new Timbre();
        $selectedTimbre = $timbre->getById($id);
        if (!$selectedTimbre) {
            return $this->render('error', ['msg' => 'Timbre introuvable.']);
        }
        return $this->render('timbre/edit', ['timbre' => $selectedTimbre]);
    }

    public function update($id, $data) {
        try {
            $timbre = new Timbre();
            $timbre->update($id, $data);
            return $this->redirect('/timbre');
        } catch (\Exception $e) {
            return $this->render('timbre/edit', ['msg' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $timbre = new Timbre();
            $timbre->delete($id);
            return $this->redirect('/timbre');
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Erreur lors de la suppression : ' . $e->getMessage()]);
        }
    }
}