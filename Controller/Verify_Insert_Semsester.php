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


    if (!isset($_POST["SemesterName"]) || !isset($_POST["SemesterYear"])) 
	{
        $result["Error"] = 1;
        $result["Message"] ="Missing Parameter";

        die(json_encode($result));
    } elseif (!$_POST["SemesterName"] || !$_POST["SemesterYear"] )
	{
        $result["Error"] = 1;
        $result["Message"] = "empty value";
        die(json_encode($result));
    }

    $semester = $_POST["SemesterName"];
    $semesterYear = $_POST["SemesterYear"];

    $Admin->setSemester($major);


    if ($Admin->checkSemesterIfExists() == true) {
        $result["Error"] = 0;
        $result["Message"] = "Already Exist";
        die(json_encode($result));
    } else {
        $Admin->addMajor();
        $result["Error"] = 0;
        $result["Message"] = "Successfully Added";
        die(json_encode($result));
    }
} catch (Exception $e) {

    header("Location:../View/AddMajors.php?result=" . $e->getMessage());
}
