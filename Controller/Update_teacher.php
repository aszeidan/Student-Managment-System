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
$_GET['TeacherId'];
$TFirstName = $_POST["TFirstName"];
$TMiddleName = $_POST["TMiddleName"];
$TLastName = $_POST["TLastName"];
$TMobileNum = $_POST["TMobileNum"];
$TPassword = $_POST["TPassword"];
$TEmail = $_POST["TEmail"];


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
