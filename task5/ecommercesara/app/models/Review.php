<?php

include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class Review extends config implements operations
{


    private $value;
    private $comment;
    private $products_id;
    private $users_id;
    private $created_at;
    private $updated_at;

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

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
     * Get the value of users_id
     */
    public function getUsers_id()
    {
        return $this->users_id;
    }

    /**
     * Set the value of users_id
     *
     * @return  self
     */
    public function setUsers_id($users_id)
    {
        $this->users_id = $users_id;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

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

    public function getRev()
    {
        $query = "SELECT
            `reviews`.* , 
            CONCAT( `users`.`first_name` , ' ' ,`users`.`last_name`) AS `USER_NAME`
        FROM
            `reviews`
        JOIN `users`  
        ON `users`.`id` = `reviews`.`users_id`
        WHERE
            `products_id` = $this->products_id";

        return $this->runDQL($query);
    }

    public function getMostRev()
    {
        $query = "SELECT
        `reviews`.*,
        `products`.`name_en` ,`products`.`price` , `products`.`image`,
        COUNT(`reviews`.`products_id`) AS `count_rev`,
        IF(
            ROUND(AVG(`reviews`.`value`)) IS NULL, 0,
            ROUND(AVG(`reviews`.`value`))
        ) AS `avg_rev`
                FROM
                    `reviews`
                JOIN `products` ON `products`.`id` = `reviews`.`products_id`
                GROUP BY
                    `products`.`id`
                ORDER BY
                    `count_rev`
                DESC
                    ,
                    `avg_rev`
                DESC 
                
                LIMIT 4
                    ";

        return $this->runDQL($query);
    }
}
