<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Privilege;
use App\Models\Utilisateur;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UtilisateurController {

    public function __construct() {
        Auth::session();
    }

    public function create() {
        return View::render('utilisateur/create');
    }

    public function store($data) {
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
        $validator->field('email', $data['email'])->email();
        $validator->field('password', $data['password'])->min(6);

        if ($validator->isSuccess()) {
            $user = new Utilisateur;
            $user->insert($data);
            return View::redirect('login');
        } else {
            $errors = $validator->getErrors();
            return View::render('utilisateur/create', ['errors' => $errors, 'inputs' => $data]);
        }
    }
    //---------------------------------------------------------------------

    public function authenticate($data) {
        return View::redirect('/home');
    }

    public function login() {
        return View::render('/utilisateur/login');
    }

      public function register() {
        return View::render('/utilisateur/register');
    }

    public function logout() {
        session_destroy();
        return View::redirect('utilisateur/login');
    }
    
  

   public function profile() {
        if (!isset($_SESSION['user'])) {
            return View::redirect('utilisateur/login');
        }

        $utilisateur = new Utilisateur();
        $user = $utilisateur->unique('email', $_SESSION['user']);
        

        return View::render('utilisateur/profil', [
            'user' => $user,
            'history' => []
        ]);
    }

    public function handleRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                header('Location: ' . BASE . '/utilisateur/login');
                exit;
            } else {
                return View::render('/utilisateur/register', ['error' => 'Tous les champs sont obligatoires.']);
            }
        }
    }

   public function handleLogin() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $_SESSION['user'] = $_POST['username']; 
                $_SESSION['finger_print'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']); 
                return View::redirect('utilisateur/profil');
            } else {
                return View::render('/utilisateur/login', ['error' => 'Nom d’utilisateur ou mot de passe incorrect.']);
            }
        }
    }

}
