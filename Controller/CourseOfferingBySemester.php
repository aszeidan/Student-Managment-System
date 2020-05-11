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
<table border="5" class="table table-hover table-bordered width:fit content" style="color:Black ; font-family:Times New Roman, Times, serif; font-size:18px;font-weight: bold" id="Registration_table">

	<thead class="table-primary">

		<th> Class Name </th>
		<th> Semester </th>
		<th> Course </th>
		<th> Instructor </th>
		<th> Schedule </th>


	</thead>
	</span>
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
