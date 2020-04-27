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
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Table</a>
                    </li>
                </ul>
                <div class="row col-md-2">
				
                    <ul>
                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Choose_Directory.php">Previous</a></li>
                    </ul>
                </div>
                <form action="../Controller/Verify_SignUpStudent.php" method="POST">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" name="Student" aria-labelledby="home-tab">
                            <h3 class="register-heading">Apply as a Student</h3>
                            <div class="row register-form mx-0 px-0">
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
                                </div>
                                <div class="col-md-6">
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
                            <div class="row register-form mx-0 px-0">
                                <div class="col-md-6">
                                    <div class=" register-form">

                                        <div class="form-group">
                                            <table border="5" class="table table-hover table-bordered width:fit content" id="Registration_table">

                                                <thead class="table-primary">

                                                    <th> Name </th>
                                                    <th> Phone Number</th>
                                                    <th> Email </th>
                                                    <th> Major </th>
                                                    <th>Delete </th>
                                                    <th> Edit </th>
                                                </thead>
                                                </span>
                                                <?php
                                                for ($i = 0; $i < count($class); $i++) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $class[$i]['SFirstName'] . " " . $class[$i]['SLastName']; ?> </td>
                                                        <td><?php echo $class[$i]['SPhone']; ?> </td>
                                                        <td><?php echo $class[$i]['SEmail']; ?> </td>
                                                        <td id="delete"><a href="#" ; onclick="deleteClass(<?php echo $class[$i]['ClassId']; ?> )">Delete </a> </td>
                                                        <td><a href="../View/EditTeacher.php?id=<?php echo $class[$i]['ClassId']; ?>">Edit </a> </td>
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

        }
    </script>
    <?php
    require_once('Footer.php'); ?>

</body>

</html>