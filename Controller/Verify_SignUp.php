<?php
session_start();
$_SESSION = array();
require_once('../Model/DatabaseSMS.php');
$db = new DatabaseSMS();

if (
    !isset($_POST["TFirstName"])
    || !isset($_POST["TMiddleName"])
    || !isset($_POST["TLastName"])
    || !isset($_POST["TPhone"])
    || !isset($_POST["TPassword"])
    || !isset($_POST["TEmail"])

) {
    die("Missing Parameters");
}
else (
    !isset($_POST["SFirstName"])
    || !isset($_POST["SMiddleName"])
    || !isset($_POST["SLastName"])
    || !isset($_POST["SPhone"])
    || !isset($_POST["SPassword"])
    || !isset($_POST["SEmail"])

) {
    die("Missing Parameters");
}

$TFirstName = $_POST["TFirstName"];
$TMiddleName = $_POST["TMiddleName"];
$TLastName = $_POST["TLastName"];
$TPhone = $_POST["TPhone"];
$TPassword = $_POST["TPassword"];
$TEmail = $_POST["TEmail"];

$TFirstName = $_POST["SFirstName"];
$TMiddleName = $_POST["SMiddleName"];
$TLastName = $_POST["SLastName"];
$TPhone = $_POST["SPhone"];
$TPassword = $_POST["SPassword"];
$TEmail = $_POST["SEmail"];
$myTab = $_POST["myTab"];

switch ($mytab) {

    case "teacher":
        $Teacher->setTFirstName($TFirstName);
        $Teacher->setTmiddleName($TMiddleName);
        $Teacher->setTLastName($TLastName);
        $Teacher->setTPhone($TPhone);
        $Teacher->setTPassword($TPassword);
        $Teacher->setTEmail($TEmail);
        $Teacher->addTeacher();
        require_once('../Model/Teacher.php');
        $Teacher = new Teacher($db);
        $pageLocation = "PAGE.php";
        break;

    case "student":
        $Student->setSFirstName($SFirstName);
        $Student->setSmiddleName($SMiddleName);
        $Student->setSLastName($SLastName);
        $Student->setSPhone($SPhone);
        $Student->setSPassword($SPassword);
        $Student->setSEmail($SEmail);
        $Student->addStudent();
        require_once('../Model/Student.php');
        $Student = new Student($db);
        $pageLocation = "PAGE.php";
        break;
}

/*if ($Teacher->checkClassIfExists() == true) {

    header("Location:../View/Registration.php?result=Tlready Exist");
} else {

    $Teacher->addClass();
    header("Location:../View/Registration.php?result=Successfully Tdded");
}*/
