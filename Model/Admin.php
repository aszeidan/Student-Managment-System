<?php

class Admin
{
    private $dbconnect;
    private $username;
    private $password;
    private $AFirstName;
    private $ALastName;
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
    function setfirstName($firstName)
    {
        $this->AFirstName = $firstName;
    }
    function setLastName($lastName)
    {
        $this->ALastName = $lastName;
    }
    function setClass($class)
    {
        $this->class = $class;
    }
	function setMajor($major)
    {
        $this->major = $major;
    }
	function setSemester($semester)
    {
        $this->semester = $semester;
    }
	
	
    function getId()
    {
        return $this->id;
    }


    function setSemesterName($semester, $semesterYear)
    {
        $this->semesterName = $semester.$semesterYear;
    }

    function setCourse($course)
    {
        if (!filter_var($course, FILTER_VALIDATE_INT)) {
            throw new Exception('Invalid Input.');
        }
        $result = $this->validateCourseExist($course);
        if (!count($result)) {
            throw new Exception('Course Does not Exist.');
        }
        $this->course = $course;
    }

    function setTeacher($teacher)
    {
        if (!filter_var($teacher, FILTER_VALIDATE_INT)) {
            throw new Exception('Invalid Input.');
        }
        $result = $this->validateTeacherExist($teacher);
        if (!count($result)) {
            throw new Exception('Teacher Does not Exist.');
        }
        $this->teacher = $teacher;
    }

    function setSchedule($schedule)
    {
        if (!filter_var($schedule, FILTER_VALIDATE_INT)) {
            throw new Exception('Invalid Input.');
        }
        $result = $this->validateScheduleExist($schedule);
        if (!count($result)) {
            throw new Exception('schedule Does not Exist.');
        }

        $this->schedule = $schedule;
    }

    function getClassId($id)
    {
        return $this->classId = $id;
    }
    function getDeletedId($del_id)
    {
        return $this->del_id = $del_id;
    }
	 function getMajors()
    {
        $query = 'select * from majors';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function getSemesters()
    {
        $query = 'select * from semester';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    function getCourses()
    {
        $query = 'select * from course';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    function validateCourseExist($course)
    {
        $query = 'select * from course WHERE CourseId=' . $course;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
	function validateSemesterExist($semester, $semesterYear)
    {

        $query = 'select * from semester WHERE SName='.$semester."".$semesterYear;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    function getTeachers()
    {
        $query = 'select * from teacher';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function validateTeacherExist($teacher)
    {
        $query = 'select * from teacher WHERE TeacherId=' . $teacher;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    function getSchedules()
    {
        $query = 'select * from schedule';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    function  validateScheduleExist($schedule)
    {
        $query = 'select * from schedule WHERE ScheduleId=' . $schedule;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    function getClasses()
    {
        $query = 'select * from class join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join teacher on teacher.TeacherId=class.TeacherId
                                join schedule on schedule.ScheduleId=class.ScheduleId';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    } 
	function getClassesBySemester($semesterID)
    {
        $query = 'select * from class join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join teacher on teacher.TeacherId=class.TeacherId
                                join schedule on schedule.ScheduleId=class.ScheduleId WHERE class.SemesterId=' . $semesterID;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    function getClassById()
    {
        $query =  'select * from class 
                                join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join teacher on teacher.TeacherId=class.TeacherId
                                join schedule on schedule.ScheduleId=class.ScheduleId 
                                WHERE ClassId=' . $this->classId;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }

    // check if the class has students registered on it.. 
    function isThereDependencies()
    {
        $query  = "SELECT * from registration where ClassId=" . $this->del_id;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        if (count($result) > 0) {
            return True;
        } else {
            return False;
        }
    }

    function deleteClassById()
    {
        // to delete the registration of a student on the requested class
        $query1  = "DELETE from registration where ClassId=" . $this->del_id;
        $query2 =  "DELETE from class where ClassId=" . $this->del_id;
        $this->dbconnect->setQuery($query1);
        $result1 = $this->dbconnect->executeQuery();
        $this->dbconnect->setQuery($query2);
        $result2 = $this->dbconnect->executeQuery();
        return $result2;
    }
    // Check if the teacher has enrolled to teach a class
    function isThereTeacherDependencies()
    {
        $query  = "SELECT * from class where TeacherId=" . $this->del_id;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
            return True;
        } else {
            return False;
        }
    }
    function getAllTeachers()
    {
        $query =  'select * from teacher ';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function isThereStudentDependencies()
    {
        $query  = "SELECT * from registration where StudentId=" . $this->del_id;
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
            return True;
        } else {
            return False;
        }
    }
    function getAllStudents()
    {
        $query =  'select * from student ';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function deleteStudentById()
    {
        //Delete the registration of the students.
        $query1 = "DELETE FROM registration where StudentID=" . $this->del_id;
        //Delete the student.
        $query2 = "DELETE FROM student where StudentID=" . $this->del_id;
        $this->dbconnect->setQuery($query1);
        $result1 = $this->dbconnect->executeQuery();
        $this->dbconnect->setQuery($query2);
        $result2 = $this->dbconnect->executeQuery();
        return $result2;
    }
    function deleteTeacherById()
    {
        //Delete the registration of the students to the course assigned to the teacher who want to delete
        $query1 = "Delete From registration Where ClassId In (Select ClassId From class WHERE TeacherId=" . $this->del_id . ")";
        //Delete the class assigned to the course's class.
        $query2 = "DELETE FROM class where TeacherId=" . $this->del_id;
        //Delete the Teacher.
        $query3 = "DELETE FROM teacher where TeacherId=" . $this->del_id;
        $this->dbconnect->setQuery($query1);
        $result1 = $this->dbconnect->executeQuery();
        $this->dbconnect->setQuery($query2);
        $result2 = $this->dbconnect->executeQuery();
        $this->dbconnect->setQuery($query3);
        $result3 = $this->dbconnect->executeQuery();
        return $result3;
    }
    function addClass()
    {
        $query =  "INSERT INTO class  (`ClassId`, `ClassName`, `SemesterId`, `CourseId`, `TeacherId`, `ScheduleId`) values (NULL,'" . $this->class . "','" . $this->semester . "','" . $this->course . "','" . $this->teacher . "','" . $this->schedule . "')";
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }
	function addMajor()
    {
        $query =  "INSERT INTO majors  (`MajorId`, `MajorTitle`) values (NULL,'" . $this->major . "')";
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }
	function addSemester()
    {
        $query =  "INSERT INTO semester  (`SemesterId`, `SName`) values (NULL,'" . $this->semesterName ."')";

        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }
    function updateClass()
    {
        $query = "UPDATE class SET ClassName = {$this->class}', `SemesterId` = '{$this->semester}', `CourseId` = '{$this->course}', `TeacherId` = '{$this->teacher}', `ScheduleId` = '{$this->schedule}' WHERE `class`.`ClassId` = {$this->classId};";
        $this->dbconnect->setQuery($query);
        $this->dbconnect->executeQuery();
    }  
	
    function checkClassIfExists()
    {
        $query = "SELECT * FROM class WHERE ClassName='"  . $this->class . "' 
                                        and SemesterId='" . $this->semester . "' 
                                        and CourseId='"   . $this->course . "'    
                                        and TeacherId='"  . $this->teacher . "'  
                                        and ScheduleId='" . $this->schedule . "' ";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
            $this->classId = $result[0]['ClassId'];
            return true;
        } else {
            return false;
        }
    }
	function checkSemesterIfExists()
    {
		$semesterName= $this->semesterName;
        $query = "SELECT * FROM semester WHERE SName='". $semesterName."'";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
            $this->semesterId = $result[0]['SemesterId'];
            return true;
        } else {
            return false;
        }
    }function checkMajorIfExists()
    {
        $query = "SELECT * FROM majors WHERE MajorTitle='"  . $this->major ."'";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        if (count($result) > 0) {
            $this->majorId = $result[0]['MajorId'];
            return true;
        } else {
            return false;
        }
    }
    function getUserFirstName()
    {
        return $this->AFirstName;
    }
    function getUserLastName()
    {
        return $this->ALastName;
    }

    function verifyLogin()
    {
        $query = "SELECT * FROM admin WHERE 
                                AEmail='" . $this->username . "' 
                             and APassword='" . $this->password . "'";
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();

        if (count($result) > 0) {
            $this->id = $result[0]['AdminId'];
            $this->AFirstName = $result[0]['AFirstName'];
            $this->ALastName = $result[0]['ALastName'];
            return true;
        } else {
            return false;
        }
    }
}
