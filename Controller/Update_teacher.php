<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
$_SESSION = array();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Teacher.php');
$db = new DatabaseSMS();
$Teacher = new Teacher($db);
$result = array();
if (
    !isset($_POST["TeacherId"])
    || !isset($_POST["TFirstName"])
    || !isset($_POST["TMiddleName"])
    || !isset($_POST["TLastName"])
    || !isset($_POST["TPhone"])
    || !isset($_POST["TPassword"])
    || !isset($_POST["TEmail"])

) {
    $result["Error"] = 1;
    $result["Message"] = "missing parameter";
    die(json_encode($result));
} else if (
    !$_POST["TeacherId"]
    || !$_POST["TFirstName"]
    || !$_POST["TMiddleName"]
    || !$_POST["TLastName"]
    || !$_POST["TPhone"]
    || !$_POST["TEmail"]
) {
    $result["Error"] = 1;
    $result["Message"] = "empty value";
    die(json_encode($result));
}
$TeacherId = $_POST['TeacherId'];
$TFirstName = $_POST["TFirstName"];
$TMiddleName = $_POST["TMiddleName"];
$TLastName = $_POST["TLastName"];
$TMobileNum = $_POST["TPhone"];
$TPassword = $_POST["TPassword"];
$TEmail = $_POST["TEmail"];

$Teacher->setTeacherId($TeacherId);
$Teacher->setTFirstName($TFirstName);
$Teacher->setTmiddleName($TMiddleName);
$Teacher->setTLastName($TLastName);
$Teacher->setTPhone($TMobileNum);
$Teacher->setTPassword($TPassword);
$Teacher->setTEmail($TEmail);


if ($Teacher->updateTeacher() == true) {
    $result["Error"] = 0;
    $result["Message"] = "Already Exist";
    die(json_encode($result));
} else {
    $updateTeacher = $Teacher->updateTeacher();
    $result["Error"] = 0;
    $result["Message"] = "Successfully Edited";
    die(json_encode($result));
}
