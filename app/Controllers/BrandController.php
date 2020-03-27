<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\Brand;

class BrandController extends Controller {

    private $data = [];

    public function index() {
        $brand = new Brand();
        $viewPath = '';
        $viewName = "brand";

        $this->data['brands'] = $brand->getAll();

        $this->loadTemplate($viewPath, $viewName, $this->data);
    }

    public function add() {

        $form = json_decode(file_get_contents('php://input'), true);
        $brandName = $form['brand'];

        $data = ['success' => false];

        if (!empty($brandName)) {
            $brand = new Brand();

            $data['success'] = $brand->add($brandName);
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
