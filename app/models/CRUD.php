<?php
namespace App\Models;

use PDO;
use App\Providers\Database;

abstract class CRUD {
    protected $pdo;
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [];

  final public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=e2495693;charset=utf8;unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock', 'root', '');
        $this->pdo->exec("SET NAMES utf8mb4"); // 🔥 Force l'encodage UTF-8
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    final public function select($field = null, $order='ASC'){
        if($field == null){
            $field = $this->primaryKey;
        }
        $sql= "SELECT * FROM {$this->table} ORDER BY {$field} {$order}";
        if($stmt = $this->pdo->query($sql)){
            return $stmt->fetchAll();
        }else{
            return false;
        } 
    }

   final public function selectId($value){
        $sql= "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt= $this->pdo->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count==1){
            return $stmt->fetch();
        }else{
            return false;
        }
    }

    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    final public function insert($data){

        $dataKeys = array_fill_keys($this->fillable,'');
        $data = array_intersect_key($data, $dataKeys);

        $fieldName = implode(', ', array_keys($data));
        $fieldValue= ":".implode(', :', array_keys($data));

        $sql = "INSERT INTO $this->table ($fieldName) VALUES($fieldValue)";

        $stmt = $this->pdo->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return $this->pdo->lastInsertId();
        }else{
            return false;
        }
    }
    final public function update($data, $id){

        $dataKeys = array_fill_keys($this->fillable,'');
        $data = array_intersect_key($data, $dataKeys);

        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";
        $data[$this->primaryKey] = $id;
        $stmt = $this->pdo->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    final public function delete($id){
        if($this->selectId($id)){
            $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":$this->primaryKey", $id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    final public function unique($field, $value){
        $sql = "SELECT * FROM $this->table WHERE $field = :$field";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }
    }

    public function updateWhere(array $values, array $conditions) {
        $setClause = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($values)));
        $whereClause = implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($conditions)));

        $sql = "UPDATE {$this->table} SET $setClause WHERE $whereClause";
        $params = array_merge($values, $conditions);

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
}
?>