<?php

session_start();
$_SESSION = array();
require_once('../Model/DatabaseSMS.php');
$db = new DatabaseSMS();
require_once('../Model/Teacher.php');
$Teacher = new Teacher($db);
$result = array();

$SMidtermGrade = $_POST["SMidtermGrade"];
$SAssignemetGrade = $_POST["SAssignemetGrade"];
$SFinalGrade = $_POST["SFinalGrade"];
$RegistrationId = $_POST["RegistrationId"];

//check if there's a change on the text box of each grade, or still empty: if not empty save it, if empty dont do anything
if($SMidtermGrade){
	$Teacher->setMidtermGrade($SMidtermGrade, $RegistrationId);
}
if($SAssignemetGrade){
	$Teacher->setAssignemetGrade($SAssignemetGrade, $RegistrationId);
}
if($SFinalGrade){
	$Teacher->setFinalGrade($SFinalGrade, $RegistrationId);
}
    $result["Error"] = 0;
    $result["Message"] = "Successfully Added";
  
header("Location:../View/RegistredStudents.php?ClassID=" .$_GET["ClassID"]);
  die(json_encode($result));
