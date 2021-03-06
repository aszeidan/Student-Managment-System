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
$majors = $Admin->getMajors();
$course = $Admin->getCourses();

$teacher = $Admin->getTeachers();

$schedule = $Admin->getSchedules();

$class = $Admin->getClasses();

$student = $Admin->getAllStudents();

?>
<script>
    function deleteStudent(StudentId) {
        $.get("../Controller/Check_student_course_registration_form.php?StudentId=" + StudentId, function(data, status) {

            var myResult = data;
            //check if the choosen class has student regsitered on it
            //if no
            if (myResult.error == 0) {
                if (myResult.result == 1) {
                    alert("The Student has been successufully deleted");

                } else { //if yes
                    var answer = confirm("This Student has been enrolled to teach a class do you really want to delete it?");
                    if (answer) {
                        $.get("../Controller/Delete_Student?StudentId=" + StudentId, function(data, status) {});
                    }
                }
            } else {
                alert("Error Try Again");
            }

        });

    };
</script>

<body>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3 style="font-family:Times New Roman, Times, serif; size:16px">Welcome To</h3>
                <h3 style="font-family:Times New Roman, Times, serif; size:16px"><b>Time Travel University</b></h3>
            </div>
            <div class="col-md-9 register-rights">
                <ul class="nav nav-tabs nav-justified" id="myTab" name="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Table</a>
                    </li>
                </ul>
                <div class="row col-md-2">

                    <ul>
                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Choose_Directory.php"><i class="fa fa-arrow-left" style="font-size:35px; color:white"></i></a></li>
                    </ul>
                </div>
                <form action="../Controller/Verify_SignUpStudent.php" method="POST">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" name="Student" aria-labelledby="home-tab">
                            <h3 class="register-heading">Apply as a Student</h3>
                            <div class="row register-forms mx-0 px-0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *" value="" id="SFirstName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Middle Name *" value="" id="SMiddleName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" value="" id="SLastName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Address *" value="" id="SAddress" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-container">
                                            <i class="glyphicon glyphicon-lock"></i>
                                            <select class="custom-select" name="SMajor" id="SMajor" required>
                                                <option disabled value="" selected hidden>Select Major</option>
                                                <?php
                                                for ($i = 0; $i < count($majors); $i++) {
                                                ?>
                                                    <option value="<?php echo $majors[$i]["MajorId"] ?>"><?php echo $majors[$i]["MajorTitle"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" value="" id="SEmail" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" maxlength="8" minlength="8" class="form-control" placeholder="Phone *" value="" id="SPhone" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Password*" id="SPassword" aria-label=" Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <input class="btn btn-outline-primary" value="Generate" onClick="randomPassword(8,'SPassword');" tabindex="2" type="button" id="button-addon2" /> </div>
                                        </div>
                                        <div class="form-group" id="studentMessage">
                                        </div>
                                        <input type="button" onClick="createStudent()" class="btnRegister" name="signUpStudent" value="Register" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" name="student" aria-labelledby="profile-tab">
                            <h3 class="register-heading">Registered Students</h3>
                            <div class="row register-forms mx-0 px-0">
                                <div class="col-md-6">
                                    <div class=" register-forms">

                                        <div class="form-group">
                                            <table class="table table-hover" id="Registration_table" style="color:white">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">Student Name</th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col"> Email </th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Major</th>
                                                        <th scope="col">Delete </th>
                                                        <th scope="col">Edit </th>


                                                    </tr>
                                                </thead>
                                                <?php
                                                for ($i = 0; $i < count($student); $i++) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $student[$i]['SFirstName'] . " " . $student[$i]['SLastName']; ?> </td>
                                                        <td><?php echo $student[$i]['SPhone']; ?> </td>
                                                        <td><?php echo $student[$i]['SEmail']; ?> </td>
                                                        <td><?php echo $student[$i]['SAddress']; ?> </td>
                                                        <td><?php echo $student[$i]['MajorTitle']; ?> </td>
                                                        <td id="delete"><a href="#" ; onclick="deleteStudent(<?php echo $student[$i]['StudentID']; ?> )"><i class="fa fa-user-times icons" aria-hidden="true"></i></a> </td>
                                                        <td><a href="../View/EditStudent.php?StudentID=<?php echo $student[$i]['StudentID']; ?>"><i class="fa fa-user-edit icons"></i> </a> </td>
                                                    </tr> <?php } ?>
                                            </table>
                                        </div>

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


        function createStudent() {
            var data = {
                SFirstName: $("#SFirstName").val(),
                SMiddleName: $("#SMiddleName").val(),
                SLastName: $("#SLastName").val(),
                SAddress: $("#SAddress").val(),
                SMajor: $("#SMajor").val(),
                SPhone: $("#SPhone").val(),
                SPassword: $("#SPassword").val(),
                SEmail: $("#SEmail").val()
            };
            $.post("../Controller/Verify_SignUpStudent.php", data, function(result) {
                $("#studentMessage").html(result.Message);
                setTimeout(() => {
                    $("#studentMessage").html(" ");
                }, 4000);
            });

        };
    </script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script>
        $('#prefill').datepicker({

        });
    </script>
    <?php
    require_once('Footer.php'); ?>

</body>

</html>