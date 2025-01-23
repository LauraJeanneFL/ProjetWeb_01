<?php

namespace App\Models;

use PDO;
use App\Providers\Database;

class Utilisateurs {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM utilisateurs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, mot_de_passe = :mot_de_passe WHERE id_utilisateur = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM utilisateurs WHERE id_utilisateur = :id");
        $stmt->execute(['id' => $id]);
    }
    
}