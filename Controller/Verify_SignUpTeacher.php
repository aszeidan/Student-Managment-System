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
    || !isset($_POST["TMobileNum"])
    || !isset($_POST["TPassword"])
    || !isset($_POST["TEmail"])

) {
    $result["Error"] = 1;
    $result["Message"] = "missing parameter";
    die(json_encode($result));
} else if (
    !$_POST["TFirstName"]
    || !$_POST["TMiddleName"]
    || !$_POST["TLastName"]
    || !$_POST["TMobileNum"]
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
$TMobileNum= $_POST["TMobileNum"];
$TPassword = $_POST["TPassword"];
$TEmail = $_POST["TEmail"];

$Teacher->setTFirstName($TFirstName);
$Teacher->setTmiddleName($TMiddleName);
$Teacher->setTLastName($TLastName);
$Teacher->setTPhone($TMobileNum);
$Teacher->setTPassword($TPassword);
$Teacher->setTEmail($TEmail);

if ($Teacher->checkTeacherIfExists() == true) {
    $result["Error"] = 0;
    $result["Message"] = "This teacher is already registered";
    die(json_encode($result));
} else {
    $Teacher->addTeacher();
    /*$to =$_POST["TEmail"];
    $subject = "Password";
    $txt = "Your password is : ".$_POST["TPassword"]. " ";
    $headers = "From: password@studentstutorial.com" . "\r\n" .
                "CC: somebodyelse@example.com";
    mail($to,$subject,$txt,$headers);*/
    $result["Error"] = 0;
    $result["Message"] = "Successfully Added";
    die(json_encode($result));
}
