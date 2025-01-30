<?php
namespace App\Controllers;

use App\Models\Enchere;
use App\Providers\View;
use App\Models\Image;
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
                return View::redirect('enchere/liste');
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

    public function publier($data, $files) {
        $imagePath = $this->uploadImage($files['image']);
        $enchere = new Enchere();
        $enchere->insert([
            'nom' => $data['nom'],
            'date_debut' => $data['date_debut'],
            'date_fin' => $data['date_fin'],
            'prix_debut' => $data['prix_debut'],
            'id_timbre' => $data['id_timbre'],
            'image' => $imagePath,
            'status' => 1
        ]);

        return View::redirect('enchere/liste');
    }

    public function rechercher($query) {
        $enchere = new Enchere();
        $resultats = $enchere->search($query['query']);

        //var_dump("Résultats de la recherche :", $resultats);
        //exit;

        return View::render('enchere/recherche', ['resultats' => $resultats]);
    }

    public function listeActive() {
        $enchere = new Enchere();
        $encheresActives = $enchere->getEncheresWithImages();
        //var_dump("Enchères envoyées à la vue :", $encheresActives);
        //exit;

        return View::render('enchere/liste', ['encheres' => $encheresActives]);
    }

    public function listeArchivee() {
        $enchere = new Enchere();
        $encheresArchivees = $enchere->selectWhere(['status' => 0]);

       
        return View::render('enchere/archive', ['encheres' => $encheresArchivees]);
    }

    private function uploadImage($file) {
        $targetDir = "public/images-optimisees/Timbres/";
        $targetFile = $targetDir . basename($file["name"]);

        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return null;
        }
    }

    public function verifierEncheres() {
        $enchere = new Enchere();
        $encheres = $enchere->selectWhere(['status' => 1]);

        foreach ($encheres as $enchere) {
            $dateFin = new \DateTime($enchere['date_fin']);
            $now = new \DateTime();
            $interval = $now->diff($dateFin);

            if ($interval->h < 1) { // Moins d'une heure restante
                $this->envoyerAlerte($enchere);
            }
        }
    }

    private function envoyerAlerte($enchere) {
        // Envoyer une alerte (email, notification, etc.)
        error_log("Alerte : L'enchère '{$enchere['nom']}' se termine bientôt !");
    }

    public function upload() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
                return View::render("enchere/upload", ["error" => "Erreur lors du téléversement."]);
            }

            $targetDir = "public/images-optimisees/Timbres/"; 
            $fileName = basename($_FILES["fileToUpload"]["name"]);
            $targetFile = $targetDir . $fileName;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Vérifier si c'est bien une image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check === false) {
                return View::render("enchere/upload", ["error" => "Le fichier n'est pas une image."]);
            }

            // Vérifier la taille du fichier (500 KB max)
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                return View::render("enchere/upload", ["error" => "Le fichier est trop volumineux."]);
            }

            // Vérifier l'extension
            $allowedExtensions = ["jpg", "jpeg", "png", "gif", "webp"];
            if (!in_array($imageFileType, $allowedExtensions)) {
                return View::render("enchere/upload", ["error" => "Seuls les fichiers JPG, JPEG, PNG, GIF et WEBP sont autorisés."]);
            }

            // Déplacer le fichier vers le bon dossier
            if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                return View::render("enchere/upload", ["error" => "Erreur lors de l'enregistrement du fichier."]);
            }

            // Enregistrer le chemin en base de données
            $id_timbre = $_POST['id_timbre'] ?? null;
            if ($id_timbre) {
                $imageModel = new Image();
                $imageModel->insert([
                    "id_timbre" => $id_timbre,
                    "chemin_image" => $targetFile,
                    "principale" => 1
                ]);
            }

            return View::render("enchere/upload", ["success" => "Image téléversée avec succès."]);
        }
    }
}