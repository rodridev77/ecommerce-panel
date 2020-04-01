<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\Staff;

class StaffController extends Controller {

    private $data = [];

    public function index() {
        $prov = new Staff();
        $viewPath = '';
        $viewName = "staff";

        $this->data['staffs'] = $prov->getAll();

        $this->loadTemplate($viewPath, $viewName, $this->data);
    }

    public function add() {

        $form = json_decode(file_get_contents('php://input'), true);
        $staffName = filter_var($form['staff'], FILTER_SANITIZE_STRING);

        $data = ['success' => false];

        if ($staffName) {
            $staff = new Staff();

            $data['success'] = $staff->add($staffName);
        }

        echo json_encode($data);
    }

    public function update() {

        $form = json_decode(file_get_contents('php://input'), true);
        $id = intval(abs($form['id']));
        $staffName = filter_var($form['staff'], FILTER_SANITIZE_STRING);

        $data = ['success' => false];

        if ($id && $staffName) {
            $staff = new Staff();

            $data['success'] = $staff->update($id, $staffName);
        }

        echo json_encode($data);
    }

    public function del() {

        $form = json_decode(file_get_contents('php://input'), true);
        $id = intval(abs($form['id']));

        $data = ['success' => false];

        if ($id) {
            $staff = new Staff();

            $data['success'] = $staff->dell($id);
        }

        echo json_encode($data);
    }

}
