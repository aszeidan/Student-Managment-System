<?php

class Admin
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
    function setClass($class)
    {
        $this->class = $class;
    }
    function getId()
    {
        return $this->id;
    }


    function setSemester($semester)
    {
        if (!filter_var($semester, FILTER_VALIDATE_INT)) {
            throw new Exception('Invalid Input.');
        }
        $result = $this->validateSemesterExist($semester);
        if (!count($result)) {
            throw new Exception('Semester Does not Exist.');
        }
        $this->semester = $semester;
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

    function getSemesters()
    {
        $query = 'select * from semester';
        $this->dbconnect->setQuery($query);
        $result = $this->dbconnect->selectquery();
        return $result;
    }
    function validateSemesterExist($semester)
    {
        $query = 'select * from semester WHERE SemesterId=' . $semester;
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
	function deleteTeacherById()
    {
        // to delete the teacher enrollement of a course 
        $query1  = "Select * from class where TeacherId=" . $this->del_id;
        $this->dbconnect->setQuery($query1);
        $result1 = $this->dbconnect->executeQuery();
		for($i=0; $i<=count($result1); $i++)
		{
			 $query2  = "DELETE from registration where ClassId=" . $result1[$i]['ClassId'];
		 $this->dbconnect->setQuery($query2);
        $result2 = $this->dbconnect->executeQuery();
		}
		$query3 =  "DELETE from teacher where TeacherId=" . $this->del_id;
        $this->dbconnect->setQuery($query3);
        $result3 = $this->dbconnect->executeQuery();
        return $result3;
    }
    function addClass()
    {
        $query =  "INSERT INTO class  (`ClassId`, `ClassName`, `SemesterId`, `CourseId`, `TeacherId`, `ScheduleId`) values (NULL,'" . $this->class . "','" . $this->semester . "','" . $this->course . "','" . $this->teacher . "','" . $this->schedule . "')";
        $this->dbconnect->setQuery($query);
        $this->dbconnect->selectquery();
    }

    function updateClass()
    {
        $query = "UPDATE `class` SET `ClassName` = '{$this->class}', `SemesterId` = '{$this->semester}', `CourseId` = '{$this->course}', `TeacherId` = '{$this->teacher}', `ScheduleId` = '{$this->schedule}' WHERE `class`.`ClassId` = {$this->classId};";
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

    function verifyLogin()
    {
        $query = "SELECT * FROM admin WHERE 
                                AEmail='" . $this->username . "' 
                             and APassword='" . $this->password . "'";
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
