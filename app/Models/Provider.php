<?php

namespace app\Models;

use app\Core\Connection;
use \PDO;

class Provider {

    private $conn;

    public function __construct() {
        $this->conn = Connection::connect();
    }

    public function getAll() {
        $brands = [];

        try {
            $query = "SELECT * FROM provider";
            $stmt = $this->conn->query($query);

            if ($stmt->rowCount() > 0):
                $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
            endif;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $brands;
    }

    public function add($name, $cnpj, $email, $phone) {

        try {
            $query = "INSERT INTO provider (name, cnpj, email, phone) VALUES (:name, :cnpj, :email, :phone)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);
            $stmt->bindValue(":cnpj", $cnpj, PDO::PARAM_STR);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":phone", $phone, PDO::PARAM_STR);

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
            $query = "DELETE FROM provider WHERE id = :id";
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
