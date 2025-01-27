<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\Password;
use App\Providers\View;
use App\Providers\Mail;

class PasswordController extends Controller {
    public function requestReset() {
        $this->logVisit('Password Reset Request');
        return $this->render('password/request_reset');
    }

    public function sendResetLink($data) {
        try {
            $utilisateur = new Utilisateur();
            $user = $utilisateur->findByEmail($data['email']);

            if (!$user) {
                return $this->render('password/request_reset', ['msg' => 'Email introuvable.']);
            }

            $token = bin2hex(random_bytes(32));
            $passwordModel = new Password();
            $passwordModel->create($user['email'], $token);

            $resetLink = BASE . "/password/reset?token=$token";
            Mail::send(
                $user['email'],
                'Réinitialisation de mot de passe',
                "Cliquez sur ce lien pour réinitialiser votre mot de passe : <a href='$resetLink'>$resetLink</a>"
            );

            return $this->render('password/link_sent', ['email' => $user['email']]);
        } catch (\Exception $e) {
            return $this->render('password/request_reset', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    public function resetForm($token) {
        try {
            $passwordModel = new Password();
            $resetEntry = $passwordModel->findByToken($token);

            if (!$resetEntry) {
                return $this->render('error', ['msg' => 'Token invalide ou expiré.']);
            }

            $this->logVisit('Password Reset Form');
            return $this->render('password/reset_form', ['token' => $token]);
        } catch (\Exception $e) {
            return $this->render('error', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    public function updatePassword($data) {
        try {
            $passwordModel = new Password();
            $resetEntry = $passwordModel->findByToken($data['token']);

            if (!$resetEntry) {
                return $this->render('error', ['msg' => 'Token invalide ou expiré.']);
            }

            $utilisateur = new Utilisateur();
            $utilisateur->updatePasswordByEmail($resetEntry['email'], $data['password']);
            $passwordModel->deleteByEmail($resetEntry['email']);

            return $this->render('password/success');
        } catch (\Exception $e) {
            return $this->render('password/reset_form', ['msg' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }

    private function logVisit($page) {
        $log = new \App\Models\Log();
        $log->insert([
            'id_utilisateur' => $_SESSION['user_id'] ?? null,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'date' => date('Y-m-d H:i:s'),
            'page' => $page
        ]);
    }
}