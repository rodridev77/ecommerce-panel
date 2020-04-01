<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\Role;

class RoleController extends Controller {

    private $data = [];

    public function index() {
        $role = new Role();
        $viewPath = '';
        $viewName = "role";

        $this->data['roles'] = $role->getAll();

        $this->loadTemplate($viewPath, $viewName, $this->data);
    }

    public function add() {

        $form = json_decode(file_get_contents('php://input'), true);
        $roleName = filter_var($form['role'], FILTER_SANITIZE_STRING);
        $slug = filter_var($form['slug'], FILTER_SANITIZE_STRING);

        $data = ['success' => false];

        if ($roleName && $slug) {
            $role = new Role();

            $data['success'] = $role->add($roleName, $slug);
        }

        echo json_encode($data);
    }

    public function update() {

        $form = json_decode(file_get_contents('php://input'), true);
        $id = intval(abs($form['id']));
        $roleName = filter_var($form['role'], FILTER_SANITIZE_STRING);
        $slug = filter_var($form['slug'], FILTER_SANITIZE_STRING);

        $data = ['success' => false];

        if ($id && $roleName && $slug) {
            $role = new Role();

            $data['success'] = $role->update($id, $roleName, $slug);
        }

        echo json_encode($data);
    }

    public function del() {

        $form = json_decode(file_get_contents('php://input'), true);
        $id = intval(abs($form['id']));

        $data = ['success' => false];

        if ($id) {
            $role = new Role();

            $data['success'] = $role->dell($id);
        }

        echo json_encode($data);
    }

}
