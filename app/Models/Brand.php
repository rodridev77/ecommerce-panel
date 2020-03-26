<?php

namespace app\Models;

use app\Core\Connection;
use \PDO;

class Brand {

    private $conn;

    public function __construct() {
        $this->conn = Connection::connect();
    }

    public function getAll() {
        $brands = [];

        try {
            $query = "SELECT * FROM brand";
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

    public function add($name) {
        $brandId = null;

        try {
            $query = "INSERT INTO brand (name) VALUE (:name)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $brandId = $this->conn->lastInsertId();
                $stmt->closeCursor();
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $brandId;
    }

}
