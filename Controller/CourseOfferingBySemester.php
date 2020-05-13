<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');

$db = new DatabaseSMS();
$Admin = new Admin($db);
$ClassesBySemester = $Admin->getClassesBySemester($_GET["SemesterId"]);



?>
<table class="table table-hover" id="Registration_table" style="color:white">
	<thead>
		<tr>
			<th scope="col">Class Name</th>
			<th scope="col"> Semester</th>
			<th scope="col">Course</th>
			<th scope="col">Instructor</th>
			<th scope="col">Schedule</th>
		
		</tr>
	</thead>
		<?php
		for ($i = 0; $i < count($ClassesBySemester); $i++) {
		?>
			<tr>
				<td><?php echo $ClassesBySemester[$i]['ClassName']; ?> </td>
				<td><?php echo $ClassesBySemester[$i]['SName']; ?> </td>
				<td><?php echo $ClassesBySemester[$i]['CourseName']; ?> </td>
				<td><?php echo $ClassesBySemester[$i]['TFirstName'] . " " . $ClassesBySemester[$i]['TLastName']; ?> </td>
				<td><?php echo $ClassesBySemester[$i]['Time']; ?> </td>
			</tr> <?php } ?>
	</table>