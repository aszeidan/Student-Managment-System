<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('DatabaseSMS.php');
require_once('Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);

$semester = $Admin->getSemesters();

$course = $Admin->getCourses();

$teacher = $Admin->getTeachers();

$schedule = $Admin->getSchedules();

$id = $_GET["id"];
$className = $_GET["ClassName"];
$semesterId = $_GET["Semester"];
$courseId = $_GET["Course"];
$teacherId = $_GET["Teacher"];
$scheduleId = $_GET["Schedule"];

$updateClass = $Admin->updateClass($className, $semesterId, $courseId, $teacherId, $scheduleId, $id);


header('Location:Registration.php');
