<?php

class ProductModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getAllProducts() {
        $sql = "SELECT Products.product_id, Products.product_name, Products.description, Products.price, Categories.category_name, Categories.category_id, Products.images
            FROM Products
            INNER JOIN Categories ON Products.category_id = Categories.category_id";
        $stmt = $this->connection->query($sql);
        $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }

        return $products;
    }

    public function getAllProductsWithRatings() {
        $sql = "
            SELECT p.*, IFNULL(AVG(r.rating), 0) AS average_rating, COUNT(r.review_id) AS review_count
            FROM Products p
            LEFT JOIN Reviews r ON p.product_id = r.product_id
            GROUP BY p.product_id
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductWithRatingById($product_id) {
        $sql = "
            SELECT p.*, IFNULL(AVG(r.rating), 0) AS average_rating, COUNT(r.review_id) AS reviews_count
            FROM Products p
            LEFT JOIN Reviews r ON p.product_id = r.product_id
            WHERE p.product_id = :product_id
            GROUP BY p.product_id
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSortedCategories()
    {
        $query = "SELECT * FROM Categories ORDER BY category_name ASC";
        $stmt = $this->connection->query($query);
        $categories = [];

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = $row;
            }
        }

        return $categories;
    }

}
?>
