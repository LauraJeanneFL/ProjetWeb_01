<?php 

namespace App\Models;

Use PDO;
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

    public static function getByName($name) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM pays WHERE nom = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO pays (nom) VALUES (:name)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE pays SET nom = :name WHERE id_pays = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM pays WHERE id_pays = :id");
        $stmt->execute(['id' => $id]);
    }
    
}