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

$course = $Admin->getCourses();

$teacher = $Admin->getTeachers();

$schedule = $Admin->getSchedules();

$class = $Admin->getClasses();

?>
<script>
    function getCoursesBySemester(SemesterId) {
        var semesterID = $("#SemesterId").val();
        $.get("../Controller/CourseOfferingBySemester.php?SemesterId=" + semesterID, function(data, status) {

            $("#classSemesterbySemester").html(data);
        });
    }
</script>

<body>
    <div class=" register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To</h3>
                <h3><b>Time Travel University</b></h3>
            </div>
            <div class="col-md-9 register-rights">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Course Offering </h3>
                                <div class="row col-md-2">

                                    <ul>
                                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Choose_Directory.php"><i class="fa fa-arrow-left" style="font-size:35px; color:white"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class=" register-forms">
						<div>
								<select class="custom-select" id="SemesterId" onChange="getCoursesBySemester()" name="Semester" required>
									<option disabled value="" selected hidden>Select Semester</option>
										<?php
										for ($i = 0; $i < count($semester); $i++) {
										?>
										<option value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
										<?php } ?>
								</select>
							</div>
                            <div class="form-group">
								<div id="classSemesterbySemester" class="form-group">
								</div>
                            </div>

                        </div>
                    
                </div>


            </div>
        </div>
   

        <?php
        require_once('Footer.php'); ?>

</body>

</html>