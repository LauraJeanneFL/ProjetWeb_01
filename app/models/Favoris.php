<?php 

namespace App\Models;

use PDO;
USE App\Providers\Database;

class Favoris {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM favoris");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM favoris WHERE id_favori = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO favoris (id_client, id_produit) VALUES (:id_client, :id_produit)");
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM favoris WHERE id_favori = :id");
        $stmt->execute(['id' => $id]);
    }

    public static function deleteByClient($id_client) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM favoris WHERE id_client = :id_client");
        $stmt->execute(['id_client' => $id_client]);
    }

    /*
    public static function deleteByProduit($id_produit) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM favoris WHERE id_produit = :id_produit");
        $stmt->execute(['id_produit' => $id_produit]);
    }

    public static function countByClient($id_client) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT COUNT(*) AS count FROM favoris WHERE id_client = :id_client");
        $stmt->execute(['id_client' => $id_client]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    */

}
