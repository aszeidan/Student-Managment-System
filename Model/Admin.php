<?php

class Admin
{
    private $dbconnect;
    function  __construct($db)
    {
        $this->dbconnect = $db;
    }

    function getSemesters()
    {
        $query = 'select * from semester';
        $result = $this->dbconnect->selectquery($query);
        return $result;
    }

    function getCourses()
    {
        $query = 'select * from course';
        $result = $this->dbconnect->selectquery($query);
        return $result;
    }

    function getTeachers()
    {
        $query = 'select * from teacher';
        $result = $this->dbconnect->selectquery($query);
        return $result;
    }

    function getSchedules()
    {
        $query = 'select * from schedule';
        $result = $this->dbconnect->selectquery($query);
        return $result;
    }

    function getClasses()
    {
        $query = 'select * from class join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join teacher on teacher.TeacherId=class.TeacherId
                                join schedule on schedule.ScheduleId=class.ScheduleId';
        $result = $this->dbconnect->selectquery($query);
        return $result;
    }

    function getClassById($id)
    {
        $query =  'select * from class 
                                join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join teacher on teacher.TeacherId=class.TeacherId
                                join schedule on schedule.ScheduleId=class.ScheduleId 
                                WHERE ClassId=' . $id;
        $result = $this->dbconnect->selectquery($query);
        return $result;
    }

    function deleteClassById($del_id)
    {
        $query =  "DELETE from class where ClassId=" . $del_id;
        $result = $this->dbconnect->selectquery($query);
        return $result;
    }

    function addClass($class, $semester, $course, $teacher, $schedule)
    {
        $query =  "INSERT INTO class  (`ClassId`, `ClassName`, `SemesterId`, `CourseId`, `TeacherId`, `ScheduleId`) values (NULL,'" . $class . "','" . $semester . "','" . $course . "','" . $teacher . "','" . $schedule . "')";
        $this->dbconnect->selectquery($query);
    }
    
    function updateClass($className, $semesterId, $courseId, $teacherId, $scheduleId, $id)
    {
        $query = "UPDATE `class` SET `ClassName` = '{$className}', `SemesterId` = '{$semesterId}', `CourseId` = '{$courseId}', `TeacherId` = '{$teacherId}', `ScheduleId` = '{$scheduleId}' WHERE `class`.`ClassId` = {$id};";
        $this->dbconnect->executeQuery($query);
    }
    function checkClassIfExists($class, $semester, $course, $teacher, $schedule)
    {
        $query = "SELECT * FROM class WHERE ClassName='" . $class . "' 
                                        and SemesterId='" . $semester . "' 
                                        and CourseId='" . $course . "'    
                                        and TeacherId='" . $teacher . "'  
                                        and ScheduleId='" . $schedule . "' ";
        $result = $this->dbconnect->selectquery($query);
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
