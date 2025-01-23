<?php

namespace App\Models;

use PDO;
use App\Providers\Database;

class Enchere {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM enchere");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM enchere WHERE id_enchere = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO enchere (nom, prix_debut, date_debut, date_fin, id_timbre) VALUES (:nom, :prix_debut, :date_debut, :date_fin, :id_timbre)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE enchere SET nom = :nom, prix_debut = :prix_debut, date_debut = :date_debut, date_fin = :date_fin, id_timbre = :id_timbre WHERE id_enchere = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM enchere WHERE id_enchere = :id");
        $stmt->execute(['id' => $id]);
    }
}