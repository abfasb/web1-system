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
