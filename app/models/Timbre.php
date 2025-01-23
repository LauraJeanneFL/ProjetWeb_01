<?php
namespace App\Models;

use PDO;
use App\Providers\Database;

class Timbre {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM timbre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM timbre WHERE id_timbre = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO timbre (nom, tirage, certifier, id_pays, id_dimensions, id_condition, id_utilisateur) VALUES (:nom, :tirage, :certifier, :id_pays, :id_dimensions, :id_condition, :id_utilisateur)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE timbre SET nom = :nom, tirage = :tirage, certifier = :certifier, id_pays = :id_pays, id_dimensions = :id_dimensions, id_condition = :id_condition, id_utilisateur = :id_utilisateur WHERE id_timbre = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM timbre WHERE id_timbre = :id");
        $stmt->execute(['id' => $id]);
    }
}
