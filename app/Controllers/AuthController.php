<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\Admin;

class AuthController extends Controller {

    public function index() {
        $data = [];
        $viewPath = '';
        $viewName = "login";

        $this->loadView($viewPath, $viewName, $data);
    }

    public function login() {
        $form = json_decode(file_get_contents('php://input'), true);
        $email = filter_var($form['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($form['password'], FILTER_SANITIZE_STRING);

        $data = ['success' => "teste_false"];

        if ($email && $password) {
            $admin = new Admin();

            $data['success'] = $admin->validateAdmin($email, $password);
        }

        echo json_encode($data);
    }

    public function logout() {
        unset($_SESSION['user_token']);
        header("Location:" . BASE_URL . "auth");
        exit;
    }

}
