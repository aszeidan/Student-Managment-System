<!DOCTYPE html>
<html lang="en">
<?php
require_once('Header.php');
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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Instructor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Student</a>
                    </li>
                </ul>
                <form action="../Controller/Verify_SignUpTeacher.php" method="POST">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" name="teacher" aria-labelledby="home-tab">
                            <h3 class="register-heading">Apply as a Teacher</h3>
                            <div class="row register-form mx-0 px-0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *" name="TFirstName" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Middle Name *" name="TMiddleName" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" name="TLastName" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="text" minlength="8" maxlength="8" name="TPhone" class="form-control" placeholder="Your Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" name="TEmail" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password *" name="TPassword" id="Tpassword" value="" />
                                        <div class="form-group">
                                            <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2">
                                        </div>
                                    </div>

                                    <input type="submit" class="btnRegister" name="signUpStudent" value="Register" />

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" name="student" aria-labelledby="profile-tab">
                            <h3 class="register-heading">Apply as a Student</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *" value="" name="SFirstName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Middle Name *" value="" name="SMiddleName" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" value="" name="SLastName" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" value="" name="SEmail" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" maxlength="8" minlength="8" class="form-control" placeholder="Phone *" value="" name="SPhone" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" value="" id="Spassword" name="SPassword" />
                                    </div>

                                    <input type="submit" class="btnRegister" value="Register" />
                                    <div class="form-group">
                                        <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'SPassword');" tabindex="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

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
    </script>
    <?php
    require_once('Footer.php'); ?>

</body>

</html>