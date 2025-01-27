<?php
namespace App\Models;

use App\Models\CRUD;

class Password extends CRUD {
    protected $table = 'password_resets';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'token'];

    public function create($email, $token) {
        // Vérification si l'utilisateur existe
        $userExists = $this->select(['COUNT(*) as count'], ['email' => $email]);
        if ($userExists[0]['count'] > 0) {
            // Création du token
            $data = ['email' => $email, 'token' => $token];
            return $this->insert($data);
        }
        throw new \Exception("Aucun utilisateur trouvé avec cet e-mail.");
    }

    public function findByToken($token) {
        return $this->select(['*'], ['token' => $token], 1); // Limite à une ligne
    }

    public function deleteByEmail($email) {
        return $this->delete(['email' => $email]);
    }
}