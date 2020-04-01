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

    public function add($provider, $name) {

        try {
            $query = "INSERT INTO brand (name) VALUES (:name)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $brandId = $this->conn->lastInsertId();
                $stmt->closeCursor();


                if (!empty(intval($brandId))) {
                    $query = "INSERT INTO brand_provider (brand_id, provider_id) VALUES (:brand_id, :provider_id)";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindValue(":brand_id", $brandId, PDO::PARAM_INT);
                    $stmt->bindValue(":provider_id", $provider, PDO::PARAM_INT);

                    if ($stmt->execute()) {
                        $stmt->closeCursor();
                        return true;
                    }
                }
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return false;
    }

    public function update($provider, $brand, $name) {

        try {
            $query = "UPDATE brand WHERE (name) VALUES (:name) WHERE id = :brand_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);
            $stmt->bindValue(":brand_id", $brand, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $stmt->closeCursor();

                if (!empty($provider)) {
                    $query = "UPDATE brand_provider (provider_id) VALUES (:provider_id) WHERE brand_id = :brand_id";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindValue(":provider_id", $provider, PDO::PARAM_INT);
                    $stmt->bindValue(":brand_id", $brand, PDO::PARAM_INT);

                    if ($stmt->execute()) {
                        $stmt->closeCursor();
                        return true;
                    }
                }
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return false;
    }

    public function dell($id) {

        try {
            $query = "DELETE FROM brand WHERE id = :id";
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
