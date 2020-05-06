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

	<table border="5" class="table-hover table-bordered width:fit content" id="Registration_table">

        <thead class="table-primary">
			<th> Course </th>
			<th> Schedule </th>
		</thead>
		</span>
		<?php
		for ($i = 0; $i < count($teacherClass); $i++) {
		?>			<tr>
				<td id="RegistredStudents"><a href="../View/RegistredStudents.php?ClassID=<?php echo $teacherClass[$i]['ClassId']; ?>"><?php echo $teacherClass[$i]['ClassName']; ?> </a> </td>
				<td><?php echo $teacherClass[$i]['Time']; ?> </td>

			</tr> <?php } ?>
			
		
			</table>