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
        !isset($_POST["CourseCode"])
        || !isset($_POST["CourseName"])
        || !isset($_POST["CourseDescription"])
    ) {
        $result["Error"] = 1;
        $result["Message"] ="Missing Paramaeter";

        die(json_encode($result));
    } elseif (
        !$_POST["CourseCode"]
        || !$_POST["CourseName"]
        || !$_POST["CourseDescription"]
    ) {
        $result["Error"] = 1;
        $result["Message"] = "empty value";
        die(json_encode($result));
    }

    $CourseCode = $_POST["CourseCode"];
    $CourseName = $_POST["CourseName"];
    $CourseDescription = $_POST["CourseDescription"];
	
    $Admin->setCourseCode($CourseCode);
    $Admin->setCourseName($CourseName);
    $Admin->setCourseDescription($CourseDescription);


    if ($Admin->checkIfCourseExist() == true) {
        $result["Error"] = 0;
        $result["Message"] = "Already Exist";
        die(json_encode($result));
    } else {
        $Admin->addCourse();
        $result["Error"] = 0;
        $result["Message"] = "Successfully Added";
        die(json_encode($result));
    }
} catch (Exception $e) {

    header("Location:../View/AddCourse.php?result=" . $e->getMessage());
}
