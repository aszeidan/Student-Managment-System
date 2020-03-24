<?php
require_once('DatabaseSMS.php');
$db = new DatabaseSMS();

$class = $_POST["Classname"];
$semester = $_POST["semester"];
$Course = $_POST["Course"];
$teacher = $_POST["teacher"];
$schedule = $_POST["schedule"];

$query = "INSERT INTO class  (`ClassId`, `ClassName`, `SemesterId`, `CourseId`, `TeacherId`, `ScheduleId`) values (NULL,'" . $class . "','" . $semester . "','" . $Course . "','" . $teacher . "','" . $schedule . "')";
echo "<br>";
echo "<br>";
echo "<br>";

echo "success";
$result_query = $db->executeQuery($query);
header('Location:verify_Insert_Course.php');
