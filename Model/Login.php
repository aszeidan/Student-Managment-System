<?php

class Login
{
    private $dbconnect;
    function  __construct($db)
    {
        $this->dbconnect = $db;
    }

    function verifyLogin($user_name, $password)
    {
        $query = "SELECT * FROM admin WHERE 
                                UserName='" . $user_name . "' 
                             and Password='" . $password . "'";

        $result = $this->dbconnect->selectquery($query);
        return $result;

        if (count($result) > 0) {
            $_SEESION["usern"] = $result[0]["UserName"];
            $_SEESION["pass"] = $result[0]["Password"];
            echo "Successfully Logged In";
            
        } else {
            echo "Invalid Login";
            
        }
    }
}
