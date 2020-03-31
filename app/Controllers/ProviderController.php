<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\Provider;

class ProviderController extends Controller {

    private $data = [];

    public function index() {
        $prov = new Provider();
        $viewPath = '';
        $viewName = "provider";

        $this->data['providers'] = $prov->getAll();

        $this->loadTemplate($viewPath, $viewName, $this->data);
    }

    public function get() {

        $form = json_decode(file_get_contents('php://input'), true);
        $id = intval(abs($form['id']));

        $data = ['success' => false];

        if ($id) {
            $prov = new Provider();

            $data = $prov->get($id);
        }

        echo json_encode($data);
    }

    public function add() {

        $form = json_decode(file_get_contents('php://input'), true);
        $provName = filter_var($form['name'], FILTER_SANITIZE_STRING);
        $provCnpj = filter_var($form['cnpj'], FILTER_SANITIZE_STRING);
        $provEmail = filter_var($form['email'], FILTER_VALIDATE_EMAIL);
        $provPhone = filter_var($form['fone'], FILTER_SANITIZE_STRING);

        $data = ['success' => false];

        if ($provName && $provCnpj && $provEmail && $provPhone) {
            $prov = new Provider();

            $data['success'] = $prov->add($provName, $provCnpj, $provEmail, $provPhone);
        }

        echo json_encode($data);
    }

    public function del() {

        $form = json_decode(file_get_contents('php://input'), true);
        $id = intval(abs($form['id']));

        $data = ['success' => false];

        if ($id) {
            $prov = new Provider();

            $data['success'] = $prov->dell($id);
        }

        echo json_encode($data);
    }

}
