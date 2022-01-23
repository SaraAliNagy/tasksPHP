<?php

class config
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "ecommerce";
    private $connec;
    public function __construct()
    {
        $this->connec = new mysqli($this->servername, $this->username, $this->password, $this->databasename);
        // if ($this->connec->connect_error) {
        //     die("Connection failed: " . $this->connec->connect_error);
        // }
        // echo "Connected successfully";
    }

    public function runDML(string $query) : bool
    {
        $result = $this->connec->query($query);
        if($result){
            return true ;
        }else{
            return false ;
        }
    }
    public function runDQL(string $query) 
    {
        $result = $this->connec->query($query);
        if($result->num_rows > 0){ 
            return $result ;
        }else{
            return [] ;
        }
    }
}



// $test = new config;
