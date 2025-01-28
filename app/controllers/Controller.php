<?php
//contrôleur parent
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;

class Controller {
    protected $pdo;
    
    public function render($view, $data = []) {
        return View::render($view, $data);
    }

    public function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

    protected function validateInput($data, $rules) {
        $validator = new Validator;

        foreach ($rules as $field => $rule) {
            $validator->field($field, $data[$field] ?? '')->$rule();
        }

        return $validator->isSuccess() ? true : $validator->getErrors();
    }
}