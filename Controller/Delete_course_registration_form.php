<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);
// 3arafet new variable ta jeeb l id mn ledit page
$del_id = $_GET['id'];
$Admin->getDeletedId($del_id);
$deleteClass = $Admin->deleteClassById();
