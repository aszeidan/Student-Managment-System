<!DOCTYPE html>
<html lang="en">
<?php

require_once('Header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');
require_once('../Model/Teacher.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);
$semester = $Admin->getSemesters();
$Teacher = new Teacher($db);

?>
<script>
    function getCoursesBySemester(SemesterId) {
        var semesterID = $("#SemesterId").val();
        $.get("../Controller/getCourseBySemester.php?SemesterId=" + semesterID, function(data, status) {

            $("#classSemesterbyTeacher").html(data);
        });
    }
</script>

<body>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To Time Travel University</h3>
                <P>We look forward to welcoming you to our campus soon!​</P>
                <form action="../Controller/Logout.php" method="POST">
                    <input type="submit" name="" value="SignOut" /><br />
                </form>
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Teacher Profile</h3>

                                <form action="Insert_Teacher.php" method="POST">
                                    <div class="row register-form mx-0 px-0">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <select id="SemesterId" onChange="getCoursesBySemester()" class="custom-select" name="Semester" required>
                                                    <option disabled value="" selected hidden>Select Semester</option>
                                                    <?php
                                                    for ($i = 0; $i < count($semester); $i++) {
                                                    ?>
                                                        <option value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div id="classSemesterbyTeacher" class="form-group">
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>

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