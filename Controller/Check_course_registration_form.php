<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);


$id = $_GET["id"];
$Admin->getClassId($id);
$depencies = $Admin->isThereDependencies();
if($depencies){
	return 0;
}else{
	$deleteClass = $Admin->deleteClassById();
	return 1;
		
}

header('Location:../View/Registration.php');
