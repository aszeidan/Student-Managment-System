<?php
header("Content-Type: application/json; charset=UTF-8");
try{
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once('../Model/DatabaseSMS.php');
	require_once('../Model/Admin.php');
	$db = new DatabaseSMS();
	$Admin = new Admin($db);

	$del_id = $_GET['id'];
	$Admin->getDeletedId($del_id);

	$depencies = $Admin->isThereDependencies();
	$output["error"]="0";
		if($depencies){
			
			$output["result"]="0";
		}else{
			$deleteClass = $Admin->deleteClassById();
			$output["result"]="1";
				
		}
}catch(Exception $e)
{
	 $output["error"]='Caught exception: '. $e->getMessage();
}

 echo json_encode($output);

