<?php
namespace App\Models;

use PDO;
use App\Providers\Database;

class Dimension {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM dimension");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM dimension WHERE id_dimensions = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO dimension (largeur, hauteur) VALUES (:largeur, :hauteur)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE dimension SET largeur = :largeur, hauteur = :hauteur WHERE id_dimensions = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM dimension WHERE id_dimensions = :id");
        $stmt->execute(['id' => $id]);
    }
}
