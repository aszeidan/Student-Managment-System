<?php

class User
{
    private $dbconnect;
    private $username;
    private $password;
    private $id;

    function  __construct($db)
    {
        $this->dbconnect = $db;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }
    function getId()
    {
        return $this->id;
    }


    function verifyLogin()
    {
        $query = "SELECT * FROM admin WHERE 
                                UserName='" . $this->username . "' 
                             and Password='" . $this->password . "'";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        if (count($result) > 0) {
            $this->id = $result[0]['AdminId'];
            return true;
        } else {
            return false;
        }
    }
}
