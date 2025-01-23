<?php
namespace App\Models;

abstract class CRUD extends \PDO {
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [];

    final public function __construct() {
        parent::__construct('mysql:host=localhost; dbname=e2495693; port=3306; charset=utf8', 'root', 'nQpNVIW0XbAaYNTxlQKk');

        if (empty($this->table)) {
            throw new \Exception("La table n'est pas définie dans le modèle.");
        }
    }

    final public function select($field = null, $order = 'ASC') {
        $field = $field ?? $this->primaryKey;
        $sql = "SELECT * FROM `$this->table` ORDER BY `$field` $order";
        try {
            $stmt = $this->query($sql);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Erreur PDO (select): " . $e->getMessage());
            return false;
        }
    }

    final public function selectId($value) {
        $sql = "SELECT * FROM `$this->table` WHERE `$this->primaryKey` = :$this->primaryKey";
        try {
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":$this->primaryKey", $value);
            $stmt->execute();
            return $stmt->fetch() ?: false;
        } catch (\PDOException $e) {
            error_log("Erreur PDO (selectId): " . $e->getMessage());
            return false;
        }
    }

    final public function insert($data) {
        $data = array_intersect_key($data, array_fill_keys($this->fillable, ''));
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO `$this->table` ($fields) VALUES ($values)";
        try {
            $stmt = $this->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            return $stmt->execute() ? $this->lastInsertId() : false;
        } catch (\PDOException $e) {
            error_log("Erreur PDO (insert): " . $e->getMessage());
            return false;
        }
    }

    final public function update($data, $id) {
        $data = array_intersect_key($data, array_fill_keys($this->fillable, ''));
        $fields = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($data)));

        $sql = "UPDATE `$this->table` SET $fields WHERE `$this->primaryKey` = :id";
        try {
            $stmt = $this->prepare($sql);
            $data['id'] = $id;
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erreur PDO (update): " . $e->getMessage());
            return false;
        }
    }

    final public function delete($id) {
        $sql = "DELETE FROM `$this->table` WHERE `$this->primaryKey` = :id";
        try {
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":id", $id);
            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erreur PDO (delete): " . $e->getMessage());
            return false;
        }
    }

    final public function unique($field, $value) {
        $sql = "SELECT * FROM `$this->table` WHERE `$field` = :$field";
        try {
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":$field", $value);
            $stmt->execute();
            return $stmt->fetch() ?: false;
        } catch (\PDOException $e) {
            error_log("Erreur PDO (unique): " . $e->getMessage());
            return false;
        }
    }
}
?>