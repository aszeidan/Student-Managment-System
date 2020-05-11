<!DOCTYPE html>
<html lang="en">
<?php
require_once('Header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);

$semester = $Admin->getSemesters();
?>

<script>


    $(document).ready(function () {
        var d = new Date();
        for (var i = 0; i <= 40; i++) {
            var option = "<option value=" + parseInt(d.getFullYear() + i) + ">" + parseInt(d.getFullYear() + i) + "</option>"
            $('[id*=SemesterYear]').append(option);
        }
    });
</script>
<body>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To</h3>
				<h3><b>Time Travel University</b></h3>
            </div>
            <div class="col-md-9 register-rights">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Semester</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Table</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-headings">Add Semester </h3>
                                <div class="row col-md-2">

                                    <ul>
                                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Choose_Directory.php"><i class="fa fa-arrow-left icons" style="font-size:35px"></i></a></li>
                                    </ul>
                                </div>
                                <form action="../Controller/Verify_Insert_Major.php" method="POST" class="form" id="form">
                                    <div class="row register-forms mx-0 px-0 col-md-12">
										<div class="centering col-md-6">
											 <div class="form-group">
													<div class="input-container">
														<i class="fa fa-list"></i>
														<select class="custom-select" name="SemesterName" id="SemesterName" required>
															<option disabled value="" selected hidden>Select semester</option>
															
																<option value="Fall">Fall</option>
																<option value="Spring">Spring</option>
																<option value="Summer">Summer</option>
														   
														</select>
													</div>
											   </div>
											   <div class="form-group">
													<div class="input-container">
														<i class="fa fa-list"></i>
														<select class="custom-select" name="SemesterYear" id="SemesterYear" required>
															<option disabled value="" selected hidden>Select year</option>
														   
														</select>
													</div>
											   </div>
											   <div class="form-group" id="semesterMessage">
                                            </div>
                                            <input type="submit" class="btnRegister" id="addSemesterButton" value="Save" />

										</div>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-headings">Table</h3>
                        <div class=" register-forms">

                            <div class="form-group">
                                <table border="5" class="table table-hover table-bordered width:fit content" id="Registration_table">

                                    <thead class="table-primary">

                                        <th> Semester Id </th>
                                        <th> Semester Name </th>
                                        


                                    </thead>
                                    </span>
                                    <?php
                                    for ($i = 0; $i < count($semester); $i++) {
                                    ?>
                                        <tr>
                                            <td><?php echo $semester[$i]['SemesterId']; ?> </td>
                                            <td><?php echo $semester[$i]['SName']; ?> </td>
                                        </tr> <?php } ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script>
            document.getElementById("addSemesterButton").addEventListener("click", function(event) {
                event.preventDefault();
                var data = {
                    SemesterName: $("#SemesterName").val(),
                    SemesterYear: $("#SemesterYear").val(),
                };

                $.post("../Controller/Verify_Insert_Semester.php", data, function(result) {
                    $("#semesterMessage").html(result.Message);
                    setTimeout(() => {
                        $("#semesterMessage").html(" ");
                    }, 4000);
                });
            });
        </script>

        <?php
        require_once('Footer.php'); ?>

</body>

</html>