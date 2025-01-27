<?php

namespace App\Controllers;

use App\Models\Image;
use App\Models\Log;
use App\Providers\View;

class ImageController extends Controller {
    public function index() {
        try {
            $image = new Image();
            $images = $image->getAll();
            $this->logVisit('Images');
            return $this->render('image/index', ['images' => $images]);
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
        $this->logVisit('Image Create');
        return $this->render('image/create');
    }

    public function store($data) {
        try {
            $image = new Image();
            $image->insert($data);
            return $this->redirect('/image');
        } catch (\Exception $e) {
            return $this->render('image/create', ['msg' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $this->logVisit('Image Edit');
        $image = new Image();
        $selectedImage = $image->getById($id);
        if (!$selectedImage) {
            return $this->render('error', ['msg' => 'Image introuvable.']);
        }
        return $this->render('image/edit', ['image' => $selectedImage]);
    }

    public function update($id, $data) {
        try {
            $image = new Image();
            $image->update($id, $data);
            return $this->redirect('/image');
        } catch (\Exception $e) {
            return $this->render('image/edit', ['msg' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
        }
    }

    public function delete($id) {
        try {
            $image = new Image();
            $image->delete($id);
            return $this->redirect('/image');
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Erreur lors de la suppression : ' . $e->getMessage()]);
        }
    }
}