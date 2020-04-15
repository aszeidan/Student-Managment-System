<?php
session_start();
$_SESSION = array();
require_once('../Model/DatabaseSMS.php');
$db = new DatabaseSMS();
require_once('../Model/Student.php');
$Student = new Student($db);

if (
    !isset($_POST["SFirstName"])
    || !isset($_POST["SMiddleName"])
    || !isset($_POST["SLastName"])
    || !isset($_POST["SPhone"])
    || !isset($_POST["SPassword"])
    || !isset($_POST["SEmail"])

) {
    die("Missing Parameters");
  
} 
$TFirstName = $_POST["SFirstName"];
$TMiddleName = $_POST["SMiddleName"];
$TLastName = $_POST["SLastName"];
$TPhone = $_POST["SPhone"];
$TPassword = $_POST["SPassword"];
$TEmail = $_POST["SEmail"];


        $Student->setSFirstName($SFirstName);
        $Student->setSmiddleName($SMiddleName);
        $Student->setSLastName($SLastName);
        $Student->setSPhone($SPhone);
        $Student->setSPassword($SPassword);
        $Student->setSEmail($SEmail);
        $Student->addStudent();
    
 

/*if ($Teacher->checkClassIfExists() == true) {

    header("Location:../View/Registration.php?result=Tlready Exist");
} else {

    $Teacher->addClass();
    header("Location:../View/Registration.php?result=Successfully Tdded");
}*/
