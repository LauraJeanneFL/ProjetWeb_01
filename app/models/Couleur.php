<?php 

namespace App\Models;

use PDO;
use App\Providers\Database;

class Couleur {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM couleur");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM couleur WHERE id_couleur = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO couleur (nom, code_couleur) VALUES (:nom, :code_couleur)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE couleur SET nom = :nom, code_couleur = :code_couleur WHERE id_couleur = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }
    
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM couleur WHERE id_couleur = :id");
        $stmt->execute(['id' => $id]);
    }
}