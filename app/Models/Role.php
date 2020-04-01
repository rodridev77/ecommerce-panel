<?php

namespace app\Models;

use app\Core\Connection;
use \PDO;

class Role {

    private $conn;

    public function __construct() {
        $this->conn = Connection::connect();
    }

    public function getAll() {
        $roles = [];

        try {
            $query = "SELECT * FROM role";
            $stmt = $this->conn->query($query);

            if ($stmt->rowCount() > 0):
                $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
            endif;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $roles;
    }

    public function get($id) {
        $role = [];

        try {
            $query = "SELECT * FROM  role WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0):
                $role = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
            endif;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $role;
    }

    public function add($role, $slug) {

        try {
            $query = "INSERT INTO role (name, slug) VALUES (:name, :slug)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $role, PDO::PARAM_STR);
            $stmt->bindValue(":name", $slug, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->closeCursor();
                return true;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return false;
    }

    public function update($id, $role, $slug) {

        try {
            $query = "UPDATE role SET name = :name, slug = :slug WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $role, PDO::PARAM_STR);
            $stmt->bindValue(":slug", $slug, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $stmt->closeCursor();
                return true;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return false;
    }

    public function dell($id) {

        try {
            $query = "DELETE FROM role WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $stmt->closeCursor();
                return true;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return false;
    }

}
