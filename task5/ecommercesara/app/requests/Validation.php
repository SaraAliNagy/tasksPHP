<?php

include_once __DIR__ . "\..\database\config.php";
class Validation{


    // //Required
    // public function required($inputName,$InputValue)
    // {
    //     return(empty($InputValue)? "$inputName Is Required" : ""); 
    // }
    // //RegEx
    // public function regEx($inputName,$InputValue,$pattern)
    // {
    //     return(preg_match($pattern,$InputValue)? "" : "$inputName Is Invalid"); 
    // }
    // //Unique

    // public function unique($table,$column,$value)
    // {
    //     $query = "SELECT * FROM `$table` WHERE `$column` = `$value` " ; 
    //     $config = new config() ;
    //     $result = $config->runDQL($query);
    //     return(empty($result)? "" : "This $column Is Already Exists"); 
    // }

    // //Password Confirmation (static)
    // // public function confirmation($password , $passwordConfirm) 
    // // {
    // //     return($password == $passwordConfirm )? "" : "Password Not Confirmed"; 
    // // }

    // //General Confirmation (dynamic)
    // public function confirmation($valueName,$value, $valueConfirm) 
    // {
    //     return($value == $valueConfirm )? "" : "$valueName Not Confirmed"; 
    // }

// BY OOP

    private $name ;
    private $value;

    public function __construct($name,$value)
    {
        $this->name = $name ; 
        $this->value = $value ;
    }

    public function required() : string
    {
        return(empty($this->value))? "$this->name Is Required" : ""; 
    }

    public function regEx($pattern) : string
    {
        return(preg_match($pattern,$this->value)) ? "" : "$this->name Is Invalid"; 
    }

    public function unique($table) : string
    {
        $query = "SELECT * FROM `$table` WHERE `$this->name` = '$this->value'" ; // name => column name
        // print_r($query);
        // die();
        $config = new config() ;
        $result = $config->runDQL($query);
        // print_r($result);
        // die();
        return(empty($result)) ? "" : "This $this->name Is Already Exists"; 
    }

    public function confirmation($valueConfirm) : string
    {
        return($this->value == $valueConfirm )? "" : "$this->name Not Confirmed"; 
    }
}


?>