<?php
namespace App\Models;

use PDO;
use App\Providers\Database;

class Pays {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM pays");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM pays WHERE id_pays = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO pays (nom) VALUES (:nom)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE pays SET nom = :nom WHERE id_pays = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM pays WHERE id_pays = :id");
        $stmt->execute(['id' => $id]);
    }
}
