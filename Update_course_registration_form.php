<?php
require_once('DatabaseSMS.php');
$db = new DatabaseSMS();



$id = $_GET["id"];
$className = $_GET["ClassName"];
$semesterId = $_GET["Semester"];
$courseId = $_GET["Course"];
$teacherId = $_GET["Teacher"];
$scheduleId = $_GET["Schedule"];



$query = "UPDATE `class` SET `ClassName` = '{$className}', `SemesterId` = '{$semesterId}', `CourseId` = '{$courseId}', `TeacherId` = '{$teacherId}', `ScheduleId` = '{$scheduleId}' WHERE `class`.`ClassId` = {$id};";

//$test = " UPDATE `class` SET `SemesterId` = '2' WHERE `class`.`ClassId` = 1;";

$result_query = $db->executeQuery($query);

header("Location:Registration.php");
