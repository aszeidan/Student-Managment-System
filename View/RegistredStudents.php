<!DOCTYPE html>
<html lang="en">
<?php
require_once('Header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Teacher.php');
$db = new DatabaseSMS();
$Teacher = new Teacher($db);
$ClassID = $_GET["ClassID"];
$courses = $Teacher->getStudentByClass($ClassID);
$file = $Teacher->getCourseFile($ClassID);
$targetDir = "../uploads/";
?>
<script>
	//ajax function that save grades of each student enrolled on the choosen class
	function saveGrades(RegistrationId) {
		if ($("#SMidtermGrade_" + RegistrationId).val() > 30 || $("#SAssignemetGrade_" + RegistrationId).val() > 20 || $("#SFinalGrade_" + RegistrationId).val()) {
			alert("The Midterm Grade should be less than 30, Assignemet Grade should be less than 20, and the Final Grade should be less than 50");
		} else {
			var data = {
				RegistrationId: RegistrationId,
				SMidtermGrade: $("#SMidtermGrade_" + RegistrationId).val(),
				SAssignemetGrade: $("#SAssignemetGrade_" + RegistrationId).val(),
				SFinalGrade: $("#SFinalGrade_" + RegistrationId).val(),
			};
		}

		$.post("../Controller/SaveGrades.php", data, function(result, status) {

			$("#GradeMessage").html(result.Message);

			setTimeout(() => {
				$("#GradeMessage").html(" ");
			}, 4000);
			location.reload();

		});
	}
</script>

<body>
	<div class="register">
		<div class="row">
			<div class="col-md-3 register-left">
				<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
				<h3>Welcome To</h3>
				<h3><b>Time Travel University</b></h3>
				<P>We look forward to welcoming you to our campus soon!​</P>
			</div>
			<div class="col-md-9 register-right">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<h3 class="register-heading">Registred Students</h3>
						
						<form action="../Controller/SaveGrades.php" method="POST">
							<div class="row col-md-2">
								<ul>
									<li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Teacher_Profile.php"><i class="fa fa-arrow-left" style="font-size:35px"></i></a></li>
								</ul>
							</div>
							<div class=" register-form">

								
									
										<div class="col-md-12">
											<table border="5" class="table-hover table-bordered width:fit content" id="Registration_table">
												
												<thead class="table-primary">
													<th> Student Id </th>
													<th> Student Name </th>
													<th> Midterm grade 30% </th>
													<th> Assignemet Grade 20%</th>
													<th> Final Grade 50% </th>
													<th> Grade </th>
													<th> Save </th>
												</thead>
												</span>
												<?php
												for ($i = 0; $i < count($courses); $i++) {
												?>
													<tr>
														<td><?php echo $courses[$i]['StudentId']; ?> </td>
														<td><?php echo $courses[$i]['SFirstName'] . " " . $courses[$i]['SMiddleName'] . " " . $courses[$i]['SLastName']; ?> </td>
														<?php
														if ($courses[$i]['MidtermGrade'] != 0) { ?>
															<td name="SMidtermGrade" id="SMidtermGrade_<?php echo $courses[$i]['RegistrationId']; ?>"><?php echo $courses[$i]['MidtermGrade']; ?> </td>
														<?php
														} else { ?>
															<td> <input type="text" name="SMidtermGrade" id="SMidtermGrade_<?php echo $courses[$i]['RegistrationId']; ?>" value=""></td>
														<?php
														}
														if ($courses[$i]['AssignemetGrade'] != 0) { ?>
															<td name="SAssignemetGrade" id="SAssignemetGrade_<?php echo $courses[$i]['RegistrationId']; ?>"><?php echo $courses[$i]['AssignemetGrade']; ?> </td>
														<?php
														} else { ?>
															<td><input type="text" name="SAssignemetGrade" id="SAssignemetGrade_<?php echo $courses[$i]['RegistrationId']; ?>" value=""></td>
														<?php
														}
														if ($courses[$i]['FinalGrade'] != 0) { ?>
															<td name="SFinalGrade" id="SFinalGrade_<?php echo $courses[$i]['RegistrationId']; ?>"><?php echo $courses[$i]['FinalGrade']; ?> </td>
														<?php
														} else { ?>
															<td><input type="text" name="SFinalGrade" id="SFinalGrade_<?php echo $courses[$i]['RegistrationId']; ?>" value=""></td>
														<?php
														}
														?>
														<td><?php echo $courses[$i]['Grade']; ?> </td>

														<td id="SaveGrades"><a href="#" ; onclick="saveGrades(<?php echo $courses[$i]['RegistrationId']; ?>)"><i class="fas fa-save" aria-hidden="true"></i></a> </td>
														<td>
															<div class="form-group" id="GradeMessage">
															</div>
														</td>
													</tr>
												<?php } ?>
											</table>
										</div>
							</div>
						</form>

				</div>
				<div style="margin-left: 10%">
					<form action="../Controller/upload.php?ClassID=<?php echo $ClassID; ?>" method="post" enctype="multipart/form-data">
							<?php
							if ($file[0]["Coursefile"] != "") { ?>
								<a href="<?php echo $targetDir . $file[0]["Coursefile"]; ?>"><h6 class="register-heading-name"> Download the Course Material : <i class="fa fa-download" aria-hidden="true"></i></h6> </a>

							<?php
								
							} else { ?>
								
								<input type="file" name="userfile">
								<button class="btn"><i class="fa fa-upload"></i> Upload</button>
							<?php
							} ?>

					</form>
				<div>

			</div>
		</div>
	</div>

	<?php
	require_once('Footer.php'); ?>
</body>

</html>