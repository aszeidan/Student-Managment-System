<?php
session_start();
	print_r($_SESSION);
	die();
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
		?>
			<tr>
				<td><?php echo $teacherClass[$i]['CourseName']; ?> </td>
				<td><?php echo $teacherClass[$i]['Time']; ?> </td>
			</tr> <?php } ?>
	</table>