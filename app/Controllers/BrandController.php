<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\Provider;
use app\Models\Brand;

class BrandController extends Controller {

    private $data = [];

    public function index() {
        $prov = new Provider();
        $brand = new Brand();
        $viewPath = '';
        $viewName = "brand";

        $this->data['providers'] = $prov->getAll();
        $this->data['brands'] = $brand->getAll();

        $this->loadTemplate($viewPath, $viewName, $this->data);
    }

    public function add() {

        $form = json_decode(file_get_contents('php://input'), true);
        $providerId = intval(abs($form['provider']));
        $brandName = filter_var($form['brand'], FILTER_SANITIZE_STRING);

        $data = ['success' => false];

        if ($providerId && $brandName) {
            $brand = new Brand();

            $data['success'] = $brand->add($providerId, $brandName);
        }

        echo json_encode($data);
    }

    public function update() {

        $form = json_decode(file_get_contents('php://input'), true);
        $providerId = intval(abs($form['provider']));
        $id = intval(abs($form['id']));
        $brandName = filter_var($form['brand'], FILTER_SANITIZE_STRING);

        $data = ['success' => false];

        if ($providerId && $brandName && $id) {
            $brand = new Brand();

            $data['success'] = $brand->update($providerId, $id, $brandName);
        }

        echo json_encode($data);
    }

    public function del() {

        $form = json_decode(file_get_contents('php://input'), true);
        $id = intval(abs($form['id']));

        $data = ['success' => false];

        if ($id) {
            $brand = new Brand();

            $data['success'] = $brand->dell($id);
        }

        echo json_encode($data);
    }

}
