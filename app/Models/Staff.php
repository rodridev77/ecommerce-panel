<?php

namespace app\Models;

use app\Core\Connection;
use \PDO;

class Staff {

    private $conn;

    public function __construct() {
        $this->conn = Connection::connect();
    }

    public function getAll() {
        $staffs = [];

        try {
            $query = "SELECT * FROM staff";
            $stmt = $this->conn->query($query);

            if ($stmt->rowCount() > 0):
                $staffs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
            endif;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $staffs;
    }

    public function get($id) {
        $staff = [];

        try {
            $query = "SELECT * FROM staff WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0):
                $staff = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
            endif;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $staff;
    }

    public function add($name) {

        try {
            $query = "INSERT INTO staff (name) VALUES (:name)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->closeCursor();
                return true;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return false;
    }

    public function update($name, $id) {

        try {
            $query = "UPDATE staff SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);
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
            $query = "DELETE FROM staff WHERE id = :id";
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
