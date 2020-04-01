<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');
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

$Admin->getId($id);
$Admin->setClass($className);
$Admin->setSemester($semesterId);
$Admin->setCourse($courseId);
$Admin->setTeacher($teacherId);
$Admin->setSchedule($scheduleId);
$updateClass = $Admin->updateClass();


header('Location:../View/Registration.php');
