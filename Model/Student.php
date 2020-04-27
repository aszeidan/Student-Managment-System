<?php

class Student
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
    function setSFirstName($SFirstName)
    {
        $this->SFirstName = $SFirstName;
    }
    function setSmiddleName($SMiddleName)
    {
        $this->SMiddleName = $SMiddleName;
    }
    function setSLastName($SLastName)
    {
        $this->SLastName = $SLastName;
    }
    function setSPhone($SPhone)
    {
        $this->SPhone = $SPhone;
    }
    function setSEmail($SEmail)
    {
        $this->SEmail = $SEmail;
    }
    function setSPassword($SPassword)
    {

        $this->SPassword = password_hash($SPassword, PASSWORD_BCRYPT);
    }

    function verifyLogin()
    {
        $query = "SELECT * FROM student WHERE 
                                SEmail='" . $this->username . "' 
                             and SPassword='" . $this->password . "'";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    function checkStudentIfExists()
    {
        $query = "SELECT * FROM student WHERE SEmail='"  . $this->SEmail . "' ";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function addStudent()
    {
        $query =  "INSERT INTO student( `SFirstName`, `SMiddleName`, `SLastName`, `SEmail`, `SPhone`, `SPassword`)  values ('" . $this->SFirstName . "','" . $this->SMiddleName . "','" . $this->SLastName . "','" . $this->SEmail . "','" . $this->SPhone . "','" . $this->SPassword . "')";
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }

    function updateStudent()
    {
        if ($this->SPassword == "") {
            $query = "UPDATE `student` SET
        `SFirstName`='{$this->SFirstName}',
        `SMiddleName`='{$this->SMiddleName}',
        `SLastName`='{$this->SLastName}',
        `SEmail`='{$this->SEmail}',
        `SPhone`='{$this->SPhone}',
         WHERE `teacher`.
         `StudentId` = {$this->id};";
        } else {
            $query = "UPDASE `teacher` SES
        `SFirstName`='{$this->SFirstName}',
        `SMiddleName`='{$this->SMiddleName}',
        `SLastName`='{$this->SLastName}',
        `SEmail`='{$this->SEmail}',
        `SPhone`='{$this->SPhone}',
        `SPassword`='{$this->SPassword}'
         WHERE `teacher`.
         `StudentId` = {$this->id};";
        }
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }
}
