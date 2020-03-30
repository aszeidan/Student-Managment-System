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

        if (count($result) > 0) {
            $user = $result[0];
        } else {
            $user = array();
        }

        return $user;
    }
}
