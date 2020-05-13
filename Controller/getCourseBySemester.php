<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Teacher.php');

$db = new DatabaseSMS();
$Teacher = new Teacher($db);
$teacherID = $Teacher->setTeacherId($_SESSION["id"]);
$teacherClass = $Teacher->getTeacherClassById($_GET["SemesterId"]);



?>
<table class="table table-hover" id="Registration_table" style="color:white">
	<thead>
		<tr>

			<th scope="col">Course</th>
			<th scope="col">Schedule</th>
		
		</tr>
	</thead>
	
		<?php
		for ($i = 0; $i < count($teacherClass); $i++) {
		?> <tr>
				<td id="RegistredStudents"><a href="../View/RegistredStudents.php?ClassID=<?php echo $teacherClass[$i]['ClassId']; ?>"><i class="fa fa-book icons"> <?php echo $teacherClass[$i]['ClassName']; ?></i> </a> </td>
				<td><?php echo $teacherClass[$i]['Time']; ?> </td>

			</tr> <?php } ?>


	</table>