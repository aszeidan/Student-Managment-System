<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
$_SESSION = array();
require_once('../Model/DatabaseSMS.php');
$db = new DatabaseSMS();
require_once('../Model/Teacher.php');
$Teacher = new Teacher($db);
$result = array();


if (
    !isset($_POST["TFirstName"])
    || !isset($_POST["TMiddleName"])
    || !isset($_POST["TLastName"])
    || !isset($_POST["TPhone"])
    || !isset($_POST["TPassword"])
    || !isset($_POST["TEmail"])

) {
    $result["Error"] = 1;
    $result["Message"] = "missing parameter";
    die(json_encode($result));
}

else if (
!$_POST["TFirstName"]
|| !$_POST["TMiddleName"]
|| !$_POST["TLastName"]
|| !$_POST["TPhone"]
|| !$_POST["TPassword"]
|| !$_POST["TEmail"]
 ) {
    $result["Error"] = 1;
    $result["Message"] = "empty value";
    die(json_encode($result));
}

$TFirstName = $_POST["TFirstName"];
$TMiddleName = $_POST["TMiddleName"];
$TLastName = $_POST["TLastName"];
$TPhone = $_POST["TPhone"];
$TPassword = $_POST["TPassword"];
$TEmail = $_POST["TEmail"];

$Teacher->setTFirstName($TFirstName);
$Teacher->setTmiddleName($TMiddleName);
$Teacher->setTLastName($TLastName);
$Teacher->setTPhone($TPhone);
$Teacher->setTPassword($TPassword);
$Teacher->setTEmail($TEmail);

if ($Teacher->checkTeacherIfExists() == true) {
    $result["Error"] = 0;
    $result["Message"] = "This teacher is already registered";
    die(json_encode($result));
} else {
    $Teacher->addTeacher();
    $result["Error"] = 0;
    $result["Message"] = "Successfully Added";
    die(json_encode($result));
}
