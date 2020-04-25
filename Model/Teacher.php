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

    function setTeacherId($id)
    {
        $this->id = $id;
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
    function getId()
    {
        return $this->id;

        /* 	$query= "SELECT * from teacher WHERE TEmail='" . $this->username . "'";
		$this->dbconnect->setQuery($query);
		$result= $this->dbconnect->selectquery();
		die($result);
        return $result; */
    }

    function checkTeacherIfExists()
    {
        $query = "SELECT * FROM teacher WHERE TEmail='"  . $this->TEmail . "' ";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
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
    function getAllTeachers()
    {
        $query =  'select * from teacher ';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function getTeacherClassById($semesterID)
    {
        $teacherId = $this->id;
        $query =  'select * from class 
                                join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join schedule on schedule.ScheduleId=class.ScheduleId 
                                WHERE TeacherId=' . $teacherId . ' and class.SemesterId=' . $semesterID;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function getStudentByClass($ClassID)
    {
        $query =  'SELECT RegistrationId, registration.StudentId, registration.ClassId, MidtermGrade , AssignemetGrade, FinalGrade,
								student.SFirstName, student.SMiddleName, student.SLastName,
								MidtermGrade + AssignemetGrade + FinalGrade AS Grade FROM registration 
                                join student on student.StudentId=registration.StudentId 
                                join class on class.ClassId=registration.ClassId
                                WHERE class.ClassId=' . $ClassID;

        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        return $result;
    }

    function setMidtermGrade($SMidtermGrade, $RegistrationId)
    {
        $query =  "UPDATE registration SET MidtermGrade=" . $SMidtermGrade . " WHERE RegistrationId=" . $RegistrationId;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function setAssignemetGrade($SAssignemetGrade, $RegistrationId)
    {
        $query =  "UPDATE registration SET AssignemetGrade=" . $SAssignemetGrade . " WHERE RegistrationId=" . $RegistrationId;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function setFinalGrade($SFinalGrade, $RegistrationId)
    {
        $query =  "UPDATE registration SET FinalGrade=" . $SFinalGrade . " WHERE RegistrationId=" . $RegistrationId;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
}
