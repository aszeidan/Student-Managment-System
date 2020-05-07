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

$student = $Admin->getAllStudents();

?>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To AG University</h3>
                <P>We look forward to welcoming you to our campus soon!​</P>
            </div>
            <div class="col-md-9 register-right">
                <div class="row col-md-2">

                    <ul>
                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Choose_Directory.php"><i class="fa fa-arrow-left" style="font-size:35px"></i></a></li>
                    </ul>
                </div>
                <form>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" name="Student" aria-labelledby="home-tab">
                            <h3 class="register-heading">Edit Student</h3>
                            <div class="row register-form mx-0 px-0">
                                <?php

                                $StudentID = $_GET['StudentID'];
                                $SFirstName = $student[$StudentID]["SFirstName"];
                                $SMiddleName = $student[$StudentID]["SMiddleName"];
                                $SLastName = $student[$StudentID]["SLastName"];
                                $SPhone = $student[$StudentID]["SPhone"];
                                $SPassword = $student[$StudentID]["SPassword"];
                                $SEmail = $student[$StudentID]["SEmail"];
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *" value="<?php echo $SFirstName ?>" id="SFirstName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Middle Name *" value="<?php echo $SMiddleName ?>" id="SMiddleName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" value="<?php echo $SLastName ?>" id="SLastName" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" value="<?php echo $SEmail ?>" id="SEmail" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" maxlength="8" minlength="8" class="form-control" placeholder="Phone *" value="<?php echo $SPhone ?>" id="SPhone" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Password*" id="SPassword" aria-label=" Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <input class="btn btn-outline-primary" value="Generate" onClick="randomPassword(8,'SPassword');" tabindex="2" type="button" id="button-addon2" /> </div>
                                        </div>
                                        <div class="form-group" id="studentMessage">
                                        </div>
                                        <input type="button" onClick="updateStudent()" class="btnRegister" name="signUpStudent" value="Register" />
                                    </div>

                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function randomPassword(length, id) {
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }

            document.getElementById(id).value = pass;
        }

        function callSpinner() {
            document.getElementById("#loader").style.display = "inline";
        }


        function updateStudent() {
            var data = {
                StudentID: <?php echo $_GET["StudentID"]; ?>,
                SFirstName: $("#SFirstName").val(),
                SMiddleName: $("#SMiddleName").val(),
                SLastName: $("#SLastName").val(),
                SPhone: $("#SPhone").val(),
                SPassword: $("#SPassword").val(),
                SEmail: $("#SEmail").val()
            };
            $.post("../Controller/Update_Student.php", data, function(result) {
                $("#studentMessage").html(result.Message);
                setTimeout(() => {
                    $("#studentMessage").html(" ");
                }, 4000);
            });

        }
    </script>
</body>
<?php
require_once('Footer.php'); ?>

</html>