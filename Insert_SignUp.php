

<?php
require_once('DatabaseSMS.php');
$db = new DatabaseSMS();


$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$email=$_POST["email"];
$phoneNumber=$_POST["phoneNumber"];
$password=$_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$answer = $_POST["answer"];

 

$query= "INSERT INTO `s_signup`( `s_SignUp_Name`, `s_SignUp_Lastname`, `s_SignUp_Email`, `s_SignUp_Phone`, `s_SignUp_Password`, `s_SignUp_Confirm`, `s_SignUp_Answer`) VALUES ([value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";

$result=$db->executeQuery($query);


?>




