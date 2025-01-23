<?php
namespace App\Models;

use PDO;
use App\Providers\Database;

class Condition {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM `condition`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM `condition` WHERE id_condition = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO `condition` (nom) VALUES (:nom)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE `condition` SET nom = :nom WHERE id_condition = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {   
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM `condition` WHERE id_condition = :id");
        $stmt->execute(['id' => $id]);
    }
}
