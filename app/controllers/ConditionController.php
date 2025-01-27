<?php

namespace App\Controllers;

use App\Models\Condition;
use App\Models\Log;
use App\Providers\View;

class ConditionController extends Controller {
    public function index() {
        try {
            $condition = new Condition();
            $conditions = $condition->getAll();
            $this->logVisit('Conditions');
            return $this->render('condition/index', ['conditions' => $conditions]);
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
        $this->logVisit('Condition Create');
        return $this->render('condition/create');
    }

    public function store($data) {
        try {
            $condition = new Condition();
            $condition->insert($data);
            return $this->redirect('/condition');
        } catch (\Exception $e) {
            return $this->render('condition/create', ['msg' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $this->logVisit('Condition Edit');
        $condition = new Condition();
        $selectedCondition = $condition->getById($id);
        if (!$selectedCondition) {
            return $this->render('error', ['msg' => 'Condition introuvable.']);
        }
        return $this->render('condition/edit', ['condition' => $selectedCondition]);
    }

    public function update($id, $data) {
        try {
            $condition = new Condition();
            $condition->update($id, $data);
            return $this->redirect('/condition');
        } catch (\Exception $e) {
            return $this->render('condition/edit', ['msg' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $condition = new Condition();
            $condition->delete($id);
            return $this->redirect('/condition');
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Erreur lors de la suppression : ' . $e->getMessage()]);
        }
    }
}