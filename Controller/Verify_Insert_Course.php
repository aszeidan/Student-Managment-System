<?php
try {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('../Model/DatabaseSMS.php');
    require_once('../Model/Admin.php');
    $db = new DatabaseSMS();
    $Admin = new Admin($db);

    if (
        !isset($_POST["Classname"])
        || !isset($_POST["semester"])
        || !isset($_POST["Course"])
        || !isset($_POST["teacher"])
        || !isset($_POST["schedule"])
    ) {
        die("Missing Parameters");
    }
    $class = $_POST["Classname"];
    $semester = $_POST["semester"];
    $course = $_POST["Course"];
    $teacher = $_POST["teacher"];
    $schedule = $_POST["schedule"];

    $Admin->setClass($class);
    $Admin->setSemester($semester);
    $Admin->setCourse($course);
    $Admin->setTeacher($teacher);
    $Admin->setSchedule($schedule);


    if ($Admin->checkClassIfExists() == true) {

        header("Location:../View/Registration.php?result=Already Exist");
    } else {

        $Admin->addClass();
        header("Location:../View/Registration.php?result=Successfully Added");
    }
} catch (Exception $e) {

    header("Location:../View/Registration.php?result=" . $e->getMessage());
}
