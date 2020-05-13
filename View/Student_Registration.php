<!DOCTYPE html>
<html lang="en">
<?php

require_once('Header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/Student.php');
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');

$db = new DatabaseSMS();
$Admin = new Admin($db);
$Student = new Student($db);

$studentID = $_SESSION['id'];
$Student->setStudentId($studentID);
$semester = $Admin->getSemesters();
?>

<script>
    function getCoursesBySemester(SemesterId) {
        var semesterID = $("#SemesterId").val();
        $.get("../Controller/RegisterBySemester.php?SemesterId=" + semesterID, function(data, status) {

            $("#classSemester").html(data);
        });
    }
</script>

<body>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3 style="font-family:Times New Roman, Times, serif; size:16px">Welcome To</h3>
                <h3 style="font-family:Times New Roman, Times, serif; size:16px"><b>Time Travel University</b></h3>

                <form action="../Controller/Logout.php" method="POST">
                    <input class="signout" type="submit" name="" value="SignOut" style="background:white; color:#0062cc; cursor:pointer" /><br />
                    <style>
                        .signout:hover {
                            background: #0062cc;
                            color: white;
                            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
                            transform: translateY(-7px);
                        }
                    </style>
                </form>
            </div>



            <div class="col-md-9 register-rights">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading"> Drop/Add Courses</h3>
                        <div class="row register-forms mx-0 px-0 col-md-12">
                            <div class="ml-5 col-md-3">
                                <div class="form-group">
                                    <div class="input-container">
                                        <select class="custom-select" id="SemesterId" onChange="getCoursesBySemester()" name="Semester" required>
                                            <option disabled value="" selected hidden>Select Semester</option>
                                            <?php
                                            for ($i = 0; $i < count($semester); $i++) {
                                            ?>
                                                <option value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="centering col-md-9" id="classSemester">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('Footer.php'); ?>
    </div>
</body>

</html>