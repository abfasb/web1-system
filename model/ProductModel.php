<?php

    class ProductModel {
        private $connection;

        public function __construct($connection) {
            $this->connection = $connection;
        }

        public function getAllProducts() {
            $sql = "SELECT Products.product_id, Products.product_name, Products.description, Products.price, Categories.category_name, Products.images
                FROM Products
                INNER JOIN Categories ON Products.category_id = Categories.category_id";
            $result = mysqli_query($this->connection, $sql);
            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }

            return $products;
        }
    }
?>