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
            $result = mysqli_query($this->connection, $sql);
            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }

            return $products;
        }

        public function getSortedCategories()
        {
            $query = "SELECT * FROM Categories ORDER BY category_name ASC";
            $result = $this->connection->query($query);
            $categories = [];
    
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $categories[] = $row;
                }
                $result->free();
            }
    
            return $categories;
        }

    }
?>