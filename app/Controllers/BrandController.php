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
        $brandName = filter_input(INPUT_POST, 'brand-name', FILTER_SANITIZE_STRING);
        $newBrand = [];

        if ($brandName) {
            $brand = new Brand();

            $newBrand['id'] = $brand->add($brandName);
        }

        echo json_encode($newBrand);
    }

}
