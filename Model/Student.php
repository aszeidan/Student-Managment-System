<?php

class Student
{
    private $dbconnect;
    private $username;
    private $password;
    private $SFirstName;
    private $SLastName;
    private $id;
    private $semsterId;

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
    function setStudentId($StudentID)
    {
        $this->id = $StudentID;
    }
    function setSemesterId($Sid)
    {
        $this->semesterId = $Sid;
    }
    function setClassId($Cid)
    {
        $this->classId = $Cid;
    }
    function setCourseCode($CCode)
    {
        $this->courseCode = $CCode;
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
	 function getUserFirstName()
    {
        return $this->SFirstName;
    }
	 function getUserLastName()
    {
        return $this->SLastName;
    }

    function verifyLogin()
    {
        $query = "SELECT * FROM student WHERE 
                                SEmail='" . $this->username . "' 
                             and SPassword='" . $this->password . "'";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        if (count($result) > 0) {
            $this->id = $result[0]['StudentID'];
            $this->SFirstName = $result[0]['SFirstName'];
            $this->SLastName = $result[0]['SLastName'];
            return true;
        } else {
            return false;
        }
    }

    function verifyNoTimeConflict($ScheduleId){
        $query = 'SELECT * FROM registration join class on registration.ClassId = class.ClassId 
                                                WHERE registration.StudentId =' . $this->id . '
                                                AND class.SemesterId =' . $this->semesterId . '
                                                AND class.ScheduleId =' . $ScheduleId;
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
            return false;
        } else {
            return true;
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

    function getStudentCoursesById()
    {
        $query1 = 'select ClassId from registration where StudentId = '. $this->id;
        $query =  'select class.SemesterId, class.ScheduleId, class.ClassId, courseCode, TFirstName, TMiddleName, TLastName, schedule.Time from class 
                                join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join schedule on schedule.ScheduleId=class.ScheduleId 
                                join teacher on teacher.TeacherId=class.TeacherId 
                                WHERE class.SemesterId =' . $this->semesterId . '
                                AND ClassId NOT IN (' . $query1. ')';

        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;                
    }

    function getStudentRegisteredCoursesById()
    {
        $query =  'select registration.RegistrationId, courseCode, TFirstName, TMiddleName, TLastName, schedule.Time from registration 
                                join class on registration.ClassId = class.ClassId
                                join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join schedule on schedule.ScheduleId=class.ScheduleId 
                                join teacher on teacher.TeacherId=class.TeacherId 
                                join student on student.StudentID = registration.StudentId
                                WHERE student.StudentID =' . $this->id . '
                                AND class.SemesterId =' . $this->semesterId;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;                
    }

    // function getClassIdByCourse()
    // {
    //     $query =  'select classId from class 
    //                             join course where course.CourseId=class.CourseId';
    //     $this->dbconnect->setQuery($query);
    //     $result = $this->dbconnect->selectquery();
    //     return $result;                
    // }

    function addStudentCourse()
    {                                                                               
        $query =  "INSERT INTO `registration`(`StudentId`, `ClassId`) VALUES ('" . $this->id . "','" . $this->classId . "')";
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }

    function dropStudentCourse($RegistrationId)
    {                                                                               
        $query =  'Delete from registration WHERE RegistrationId =' . $RegistrationId;
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }

    function searchStudentCourse()
    {
        $query =  'select courseCode, TFirstName, TMiddleName, TLastName, schedule.Time from class 
                                join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join schedule on schedule.ScheduleId=class.ScheduleId 
                                join teacher on teacher.TeacherId=class.TeacherId 
                                join registration on registration.ClassId = class.ClassId
                                join student on student.StudentID = registration.StudentId
                                WHERE course.CourseCode ='. $this->courseCode .'
                                AND student.StudentID =' . $this->id . '
                                AND class.SemesterId =' . $this->semesterId;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;                
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
         WHERE `student`.
         `StudentID` = {$this->id};";
        } else {
            $query = "UPDATE `student` SET
        `SFirstName`='{$this->SFirstName}',
        `SMiddleName`='{$this->SMiddleName}',
        `SLastName`='{$this->SLastName}',
        `SEmail`='{$this->SEmail}',
        `SPhone`='{$this->SPhone}',
        `SPassword`='{$this->SPassword}'
         WHERE `student`.
         `StudentID` = {$this->id};";
        }
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }
}
