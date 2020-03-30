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
$class = $Admin->getClassById($id);

// 3arafet new variable ta jeeb l id mn ledit page
$del_id = $_GET['id'];
$deleteClass = $Admin->deleteClassById($del_id);


header('Location:Registration.php');?>
