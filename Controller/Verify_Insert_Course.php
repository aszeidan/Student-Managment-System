<?php
try {
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

    if (
        !isset($_POST["Classname"])
        || !isset($_POST["semester"])
        || !isset($_POST["Course"])
        || !isset($_POST["teacher"])
        || !isset($_POST["schedule"])
    ) {
        $result["Error"] = 1;
        $result["Message"] ="Missing Paramaeter";

        die(json_encode($result));
    } elseif (
        !$_POST["Classname"]
        || !$_POST["semester"]
        || !$_POST["Course"]
        || !$_POST["teacher"]
        || !$_POST["schedule"]
    ) {
        $result["Error"] = 1;
        $result["Message"] = "empty value";
        die(json_encode($result));
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
        $result["Error"] = 0;
        $result["Message"] = "Already Exist";
        die(json_encode($result));
    } else {
        $Admin->addClass();
        $result["Error"] = 0;
        $result["Message"] = "Successfully Added";
        die(json_encode($result));
    }
} catch (Exception $e) {

    header("Location:../View/Registration.php?result=" . $e->getMessage());
}
