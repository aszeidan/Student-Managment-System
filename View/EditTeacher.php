<!DOCTYPE html>
<html lang="en">
<?php

require_once('Header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Teacher.php');
require_once('../Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);
$Teachers = $Admin->getAllTeachers();


// $id = $_GET["id"];
// $teacher->getId($id);
// $teacher = $Teacher->getId();

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
                <ul class="nav nav-tabs nav-justified" id="myTab" name="myTab" role="tablist">
                </ul>
                <div class="row col-md-2">
                    <ul>
                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="#">Previous</a></li>
                    </ul>
                </div>
                <form>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" name="teacher" aria-labelledby="home-tab">
                            <h3 class="register-heading">Apply as a Teacher</h3>
                            <div class="row register-form mx-0 px-0">
                                <?php
                                $TFirstName = $Teachers[0]["TFirstName"];
                                $TMiddleName = $Teachers[0]["TMiddleName"];
                                $TLastName = $Teachers[0]["TLastName"];
                                $TMobileNum = $Teachers[0]["TMobileNum"];
                                $TPassword = $Teachers[0]["TPassword"];
                                $TEmail = $Teachers[0]["TEmail"];

                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *" id="TFirstName" value="<?php echo $TFirstName ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Middle Name *" id="TMiddleName" value="<?php echo $TMiddleName ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" id="TLastName" value="<?php echo $TLastName ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="text" minlength="8" maxlength="8" id="TPhone" class="form-control" placeholder="Your Phone *" value="<?php echo $TMobileNum ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" id="TEmail" value="<?php echo $TEmail ?>" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Password*" id="TPassword" value="" aria-label=" Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <input class="btn btn-outline-primary" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2" type="button" id="button-addon1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="teacherMessage">
                                    </div>
                                    <input type="button" onClick="updateTeacher()" class="btnRegister" name="signUpTeacher" value="Edit" />

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


        function updateTeacher() {
            var data = {
                TeacherId: <?php echo $_GET["TeacherId"]; ?>,
                TFirstName: $("#TFirstName").val(),
                TMiddleName: $("#TMiddleName").val(),
                TLastName: $("#TLastName").val(),
                TPhone: $("#TPhone").val(),
                TPassword: $("#TPassword").val(),
                TEmail: $("#TEmail").val()
            };
            $.post("../Controller/Update_teacher.php", data, function(result) {
                $("#teacherMessage").html(result.Message);
                setTimeout(() => {
                    $("#teacherMessage").html(" ");
                }, 4000);
            });

        }
    </script>
    <?php
    require_once('Footer.php'); ?>

</body>

</html>