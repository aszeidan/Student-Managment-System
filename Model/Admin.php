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
}
