<?php

class ProductsList
{
    public function getProducts()
    {
        $db = new Database();
        $sql = "SELECT * FROM products";
        $db->query($sql);
        $resultSet = $db->resultset();
        $db = null;
        $productslist = array();
        foreach ($resultSet as $value) {
            $product = new Product($value["id"], $value["name"], $value["description"], $value["image"],
                                    $value["price"],$value["cat_id"]);
            $productslist[] = $product;
        }
        return $productslist;
    }

}