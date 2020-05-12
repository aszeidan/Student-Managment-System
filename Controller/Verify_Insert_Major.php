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


    if (!isset($_POST["MajorTitle"]) || !isset($_POST["MajorDescription"])) 
	{
        $result["Error"] = 1;
        $result["Message"] ="Missing Parameter";

        die(json_encode($result));
    } elseif (!$_POST["MajorTitle"])
	{
        $result["Error"] = 1;
        $result["Message"] = "empty value";
        die(json_encode($result));
    }

    $major = $_POST["MajorTitle"];
    $MajorDescription = addslashes($_POST["MajorDescription"]);

    $Admin->setMajor($major ,$MajorDescription);


    if ($Admin->checkMajorIfExists() == true) {
        $result["Error"] = 0;
        $result["Message"] = "Already Exist";
        die(json_encode($result));
		header("Location:../View/AddMajors.php");
    } else {
        $Admin->addMajor();
        $result["Error"] = 0;
        $result["Message"] = "Successfully Added";
        die(json_encode($result));
    }
} catch (Exception $e) {

    header("Location:../View/AddMajors.php?result=" . $e->getMessage());
}
