<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
$_SESSION = array();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);
$result = array();

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

$Admin->getClassId($id);
$Admin->setClass($className);
$Admin->setSemester($semesterId);
$Admin->setCourse($courseId);
$Admin->setTeacher($teacherId);
$Admin->setSchedule($scheduleId);


if ($Admin->updateClass() == true) {
    $result["Error"] = 0;
    $result["Message"] = "Nothing Changed";
    die(json_encode($result));
} else {
    $updateClass = $Admin->updateClass();
    $result["Error"] = 0;
    $result["Message"] = "Successfully Edited";
    die(json_encode($result));
}
