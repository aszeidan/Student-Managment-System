<?php
session_start();
$_SESSION = array();
require_once('../Model/DatabaseSMS.php');
$db = new DatabaseSMS();
require_once('../Model/Teacher.php');
$Teacher = new Teacher($db);

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
$Teacher->addTeacher();
        
       

   
/*if ($Teacher->checkClassIfExists() == true) {

    header("Location:../View/Registration.php?result=Tlready Exist");
} else {

    $Teacher->addClass();
    header("Location:../View/Registration.php?result=Successfully Tdded");
}*/
