<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use App\Providers\Validator;
use App\Models\Password;
use App\Providers\View;
use App\Providers\Mail;

class PasswordController extends Controller {
    public function requestReset() {
          return View::render('password/request');
    }

    public function handleRequest($data) {
        $validator = new Validator;
        $validator->field('email', $data['email'])->email();

        if ($validator->isSuccess()) {
            // Logique pour envoyer un lien de réinitialisation de mot de passe
            return View::render('password/success');
        } else {
            $errors = $validator->getErrors();
            return View::render('password/request', ['errors' => $errors, 'inputs' => $data]);
        }
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

    public function reset($data) {
        return View::render('password/reset', ['token' => $data['token'] ?? '']);
    }

    public function update($data) {
        $validator = new Validator;
        $validator->field('password', $data['password'])->min(6)->max(20);

        if ($validator->isSuccess()) {
            // Logique pour mettre à jour le mot de passe
            return View::redirect('login');
        } else {
            $errors = $validator->getErrors();
            return View::render('password/reset', ['errors' => $errors, 'inputs' => $data]);
        }
    }
}
