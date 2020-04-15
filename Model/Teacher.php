<?php

class Teacher
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
    function setTFirstName($TFirstName)
    {
        $this->TFirstName = $TFirstName;
    }
    function setTmiddleName($TMiddleName)
    {
        $this->TMiddleName = $TMiddleName;
    }
    function setTLastName($TLastName)
    {
        $this->TLastName = $TLastName;
    }
    function setTPhone($TPhone)
    {
        $this->TPhone = $TPhone;
    }
    function setTEmail($TEmail)
    {
        $this->TEmail = $TEmail;
    }
    function setTPassword($TPassword)
    {

        $this->TPassword = password_hash($TPassword, PASSWORD_BCRYPT);
    }

    function verifyLogin()
    {
        $query = "SELECT * FROM teacher WHERE 
                                TEmail='" . $this->username . "' 
                             and TPassword='" . $this->password . "'";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        if (count($result) > 0) {
            $this->id = $result[0]['TeacherId'];
            return true;
        } else {
            return false;
        }
    }
    function addTeacher()
    {
        $query =  "INSERT INTO teacher ( `TFirstName`, `TMiddleName`, `TLastName`, `TEmail`, `TMobileNum`, `TPassword`)  values ('" . $this->TFirstName . "','" . $this->TMiddleName . "','" . $this->TLastName . "','" . $this->TEmail . "','" . $this->TPhone . "','" . $this->TPassword . "')";
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }
}
