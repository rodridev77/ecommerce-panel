<?php

namespace Models;

use Core\Connection;
use PDO;
use Models\Permission;

class Admin {

    private $conn;
    private $id;
    private $name;
    private $staff;
    private $permissions = [];

    public function __construct() {
        $this->conn = Connection::connect();
    }

    public function isLogged() {

        if (!empty($_SESSION['token_admin'])) {
            $token = $_SESSION['token_admin'];

            try {
                $query = "SELECT id, permission_group_id, name, permission_group_id FROM user WHERE token = :token";
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(":token", $token, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $perm = new Permission();

                    $data = $stmt->fetch(PDO::FETCH_ASSOC);

                    $this->id = $data['id'];
                    $this->name = $data['name'];
                    $this->staff = $data['permission_group_id'];
                    $permission_id = $data['permission_group_id'];

                    $this->permissions = $perm->getPermissions($permission_id);

                    return true;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                die;
            }
        }

        return false;
    }

    public function hasPermission($permission_slug) {

        if (in_array($permission_slug, $this->permissions)):
            return true;
        else:
            return false;
        endif;
    }

    public function validateAdmin($email, $password) {

        try {
            $query = "SELECT id FROM admin WHERE email = :email AND password = :password";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":password", md5($password), PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $uid = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                $token = md5(time() . rand(0, 99999) . $uid);

                $query = "UPDATE user SET token = :token WHERE id = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(":token", $token, PDO::PARAM_STR);
                $stmt->bindValue(":id", $uid, PDO::PARAM_INT);

                if ($stmt->execute()):
                    $_SESSION['user_token'] = $token;
                    return true;
                endif;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die;
        }

        return false;
    }

    public function getPermissions() {
        return $this->permissions;
    }

    public function getName() {
        return $this->name;
    }

    public function getStaff() {
        return $this->staff;
    }

}
