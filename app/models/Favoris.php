<?php 
namespace App\Models;

use PDO;
use App\Providers\Database;

class Favoris {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM favoris");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM favoris WHERE id_favoris = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO favoris (id_utilisateur, id_timbre, id_enchere, date_favori) VALUES (:id_utilisateur, :id_timbre, :id_enchere, :date_favori)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE favoris SET id_utilisateur = :id_utilisateur, id_timbre = :id_timbre, id_enchere = :id_enchere WHERE id_favoris = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM favoris WHERE id_favoris = :id");
        $stmt->execute(['id' => $id]);
    }
}
