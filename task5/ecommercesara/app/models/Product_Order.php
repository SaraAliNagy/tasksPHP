<?php

include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class Product_Order extends config implements operations
{


   
    private $products_id;
    private $orders_id;
    private $cquantity;
    private $price;

    /**
     * Get the value of products_id
     */ 
    public function getProducts_id()
    {
        return $this->products_id;
    }

    /**
     * Set the value of products_id
     *
     * @return  self
     */ 
    public function setProducts_id($products_id)
    {
        $this->products_id = $products_id;

        return $this;
    }

    /**
     * Get the value of orders_id
     */ 
    public function getOrders_id()
    {
        return $this->orders_id;
    }

    /**
     * Set the value of orders_id
     *
     * @return  self
     */ 
    public function setOrders_id($orders_id)
    {
        $this->orders_id = $orders_id;

        return $this;
    }

    /**
     * Get the value of cquantity
     */ 
    public function getCquantity()
    {
        return $this->cquantity;
    }

    /**
     * Set the value of cquantity
     *
     * @return  self
     */ 
    public function setCquantity($cquantity)
    {
        $this->cquantity = $cquantity;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function create()
    {
    }
    public function read()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }

    

    public function getMostOrder()
    {
        $query = "SELECT
        `products_orders`.*,
        `products`.`name_en` ,`products`.`price` , `products`.`image`,
        COUNT(`products_orders`.`products_id`) AS `count_order`
            
            FROM
                `products_orders`
            JOIN `products` 
            ON `products`.`id` = `products_orders`.`products_id`
            GROUP BY
                `products`.`id`
            ORDER BY
                `count_order`
            DESC
            LIMIT 4
                ";

        return $this->runDQL($query);
    }

    
}
