<?php

require_once("DatabaseSMS.php");
$Verify_Course = new DatabaseSMS();


$class = $_POST["Classname"];
$semester = $_POST["semester"];
$Course = $_POST["Course"];
$teacher = $_POST["teacher"];
$schedule = $_POST["schedule"];

$query = "SELECT * FROM class WHERE ClassName='" . $Class . "' and SemesterId='" . $semester . "' and CourseId='" . $Course . "'
and TeacherId='" . $teacher . "'  and ScheduleId='" . $schedule . "' ";
$result = $$Verify_Course->selectQuery($query);

if (count($result) > 0) {
    $_SEESION["class"] = $result[0]["ClassName"];
    $_SEESION["semester"] = $result[0]["SemesterId"];
    $_SEESION["course"] = $result[0]["CourseId"];
    $_SEESION["teacher"] = $result[0]["TeacherId"];
    $_SEESION["schedule"] = $result[0]["ScheduleId"];
    header("Location:Insert_Course.php");
} else {
    if ($_SEESION["course"] = $result[0]["CourseId"] &&  $_SEESION["schedule"] = $result[0]["ScheduleId"] &&  $_SEESION["schedule"] = $result[0]["ScheduleId"]) {
        echo "Already exist";
    }
    if ($_SEESION["course"] = $result[0]["CourseId"] && $_SEESION["semester"] = $result[0]["SemesterId"] && $_SEESION["teacher"] = $result[0]["TeacherId"]) {
        echo "Already exist";
    }

    header("Location:Registration.php");
}
