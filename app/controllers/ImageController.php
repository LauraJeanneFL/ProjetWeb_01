<?php 

namespace App\Controllers;
use App\Models\Image;

class ImageController {
    // Afficher toutes les images
    public function index() {
        $images = Image::getAll();
        require 'views/image/index.php';
    }

    // Afficher le formulaire de création
    public function create() {
        require 'views/image/create.php';
    }

    // Enregistrer une nouvelle image
    public function store() {
        if (empty($_FILES['image']['name'])) {
            die('Veuillez sélectionner une image.');
        }

        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];

        if ($error > 0) {
            die('Erreur lors de l\'upload de l\'image.');
        }

        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed_extensions)) {
            die('L\'extension de l\'image est incorrecte. Seules les images JPG, JPEG et PNG sont acceptées.');
        }

        if ($file_size > 1000000) {
            die('L\'image est trop volumineuse. La taille maximale est de 1 Mo.');
        }

        $new_file_name = uniqid() . '.' . $extension;
        $destination_path = 'uploads/' . $new_file_name;
        move_uploaded_file($tmp_name, $destination_path);

        $data = [
            'nom' => $new_file_name
        ];

        Image::create($data);
        header('Location: /image/index');
    }

    // Afficher le formulaire de modification
    public function edit($id) {
        $image = Image::getById($id);
        require 'views/image/edit.php';
    }

    // Enregistrer les modifications
    public function update($id) {
        if (empty($_FILES['image']['name'])) {
            die('Veuillez sélectionner une nouvelle image.');
        }

        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];

        if ($error > 0) {
            die('Erreur lors de l\'upload de l\'image.');
        }

        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed_extensions)) {
            die('L\'extension de l\'image est incorrecte. Seules les images JPG, JPEG et PNG sont acceptées.');
        }

        if ($file_size > 1000000) {
            die('L\'image est trop volumineuse. La taille maximale est de 1 Mo.');
        }

        $new_file_name = uniqid(). '.'. $extension;
        $destination_path = 'uploads/'. $new_file_name;
        move_uploaded_file($tmp_name, $destination_path);

        $data = [
            'nom' => $new_file_name
        ];

        Image::update($id, $data);
        header('Location: /image/index');
    }

    // Supprimer une image
    public function delete($id) {
        $image = Image::getById($id);
        unlink('uploads/'. $image->nom);
        Image::delete($id);
        header('Location: /image/index');
        
        // Supprimer également les images associées à la produit
        $produit_images = ProduitImage::getAllByImageId($id);
        foreach ($produit_images as $produit_image) {
            ProduitImage::delete($produit_image->id);
        }
    
        // Supprimer également les favoris associés à l'image
        $favoris = Favoris::getAllByImageId($id);
        foreach ($favoris as $favori) {
            Favoris::delete($favori->id);
        }
    
        // Supprimer également les enchères associées à l'image
        $encheres = Enchere::getAllByImageId($id);
        foreach ($encheres as $enchere) {
            Enchere::delete($enchere->id);
        }
    
        // Supprimer également les commentaires associés à l'image
        $commentaires = Commentaire::getAllByImageId($id);
        foreach ($commentaires as $commentaire) {
            Commentaire::delete($commentaire->id);
        }
    
        // Supprimer également les votes associés à l'image
        $votes = Vote::getAllByImageId($id);
        foreach ($votes as $vote) {
            Vote::delete($vote->id);
        }
    
        // Supprimer également les images associées à la vente
        $ventes = Vente::getAllByImageId($id);
        foreach ($ventes as $vente) {
            Vente::delete($vente->id);
        }
    
        // Supprimer également les images associées aux conditions
        $conditions = Condition::getAllByImageId($id);
        foreach ($conditions as $condition) {
            Condition::delete($condition->id);
        }
    
        // Supprimer également les images associées aux couleurs
        $couleurs = Couleur::getAllByImageId($id);
        foreach ($couleurs as $couleur) {
            Couleur::delete($couleur->id);
        }

        // Supprimer également les images associées aux dimensions
        $dimensions = Dimension::getAllByImageId($id);
        foreach ($dimensions as $dimension) {
            Dimension::delete($dimension->id);
        }
    }

}