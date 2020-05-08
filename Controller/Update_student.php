<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
$_SESSION = array();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Student.php');
$db = new DatabaseSMS();
$Student = new Student($db);
$result = array();

if (
    !isset($_POST["StudentID"])
    || !isset($_POST["SFirstName"])
    || !isset($_POST["SMiddleName"])
    || !isset($_POST["SLastName"])
    || !isset($_POST["SPhone"])
    || !isset($_POST["SPassword"])
    || !isset($_POST["SEmail"])

) {
    $result["Error"] = 1;
    $result["Message"] = "missing parameter";
    die(json_encode($result));
} elseif (
    !$_POST["StudentID"]
    || !$_POST["SFirstName"]
    || !$_POST["SMiddleName"]
    || !$_POST["SLastName"]
    || !$_POST["SPhone"]
    || !$_POST["SEmail"]
) {
    $result["Error"] = 1;
    $result["Message"] = "empty value";
    die(json_encode($result));
}
$StudentID = $_POST['StudentID'];
$SFirstName = $_POST["SFirstName"];
$SMiddleName = $_POST["SMiddleName"];
$SLastName = $_POST["SLastName"];
$SPhone = $_POST["SPhone"];
$SPassword = $_POST["SPassword"];
$SEmail = $_POST["SEmail"];

$Student->setStudentId($StudentID);
$Student->setSFirstName($SFirstName);
$Student->setSmiddleName($SMiddleName);
$Student->setSLastName($SLastName);
$Student->setSPhone($SPhone);
$Student->setSPassword($SPassword);
$Student->setSEmail($SEmail);

if ($Student->updateStudent() == true) {
    $result["Error"] = 0;
    $result["Message"] = "This student is already registered";
    die(json_encode($result));
} else {
    $updateStudent = $Student->updateStudent();
    $result["Error"] = 0;
    $result["Message"] = "Successfully Edited";
    die(json_encode($result));
}
