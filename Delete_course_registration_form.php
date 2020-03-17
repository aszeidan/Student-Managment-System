<?php
require_once('Header.php');
require_once('DatabaseSMS.php');
$db = new DatabaseSMS();



$SMS_id = $_GET['SMS_id']; // 3arafet new variable ta jeeb l id mn ledit page

$query = "DELETE from class where ClassId=" . $SMS_id;


$result_query = $db->executeQuery($query);



header('Location:Course_Registration_Form.php');
