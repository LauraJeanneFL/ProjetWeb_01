<?php

namespace App\Models;
use PDO; 
use App\Providers\Database;

class Image {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM image");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM image WHERE id_image = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO image (nom, id_produit) VALUES (:nom, :id_produit)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE image SET nom = :nom, id_produit = :id_produit WHERE id_image = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM image WHERE id_image = :id");
        $stmt->execute(['id' => $id]);
    }
    
}