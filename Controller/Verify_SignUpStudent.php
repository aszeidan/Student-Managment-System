<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
$_SESSION = array();
require_once('../Model/DatabaseSMS.php');
$db = new DatabaseSMS();
require_once('../Model/Student.php');
$Student = new Student($db);
$result = array();

if (
    !isset($_POST["SFirstName"])
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
    !$_POST["SFirstName"]
    || !$_POST["SMiddleName"]
    || !$_POST["SLastName"]
    || !$_POST["SPhone"]
    || !$_POST["SPassword"]
    || !$_POST["SEmail"]
) {
    $result["Error"] = 1;
    $result["Message"] = "empty value";
    die(json_encode($result));
}
$SFirstName = $_POST["SFirstName"];
$SMiddleName = $_POST["SMiddleName"];
$SLastName = $_POST["SLastName"];
$SPhone = $_POST["SPhone"];
$SPassword = $_POST["SPassword"];
$SEmail = $_POST["SEmail"];


$Student->setSFirstName($SFirstName);
$Student->setSmiddleName($SMiddleName);
$Student->setSLastName($SLastName);
$Student->setSPhone($SPhone);
$Student->setSPassword($SPassword);
$Student->setSEmail($SEmail);

if ($Student->checkStudentIfExists() == true) {
    $result["Error"] = 0;
    $result["Message"] = "This student is already registered";
    die(json_encode($result));
} else {
    $Student->addStudent();
    $result["Error"] = 0;
    $result["Message"] = "Successfully Added";
    die(json_encode($result));
}
