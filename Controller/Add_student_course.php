<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Student.php');
$db = new DatabaseSMS();
$Student = new Student($db);

$studentId = $_SESSION['id'];
$Student->setStudentId($studentId);

$classId = $_GET['ClassId'];
$Student->setClassId($classId);

$Student->setSemesterId($_GET['SemesterId']);

$verify = $Student->verifyNoTimeConflict($_GET['ScheduleId']);

if($verify){
    $Student->addStudentCourse();
    header('Location:../View/Student_Registration.php');

}else{
    header('Location:../View/Student_Registration.php');
    //Msg('Time Conflict');
}
?>
