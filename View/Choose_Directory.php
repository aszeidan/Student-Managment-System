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
                <form action="../Controller/Logout.php" method="POST">
                    <input type="submit" name="" value="SignOut" /><br />
                </form>
            </div>
            <div class="col-md-9 register-right">

                <form>
                    <div class="tab-pane fade show active" id="home" role="tabpanel" name="teacher" aria-labelledby="home-tab">
                        <h3 class="register-heading">Welcome Admin! </h3>
                        <div class="row register-form mx-0 px-0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Registration" onClick="window.location.href='Registration.php';" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="SignUpStudent" onClick="window.location.href='SignUpStudent.php';" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="SignUpTeacher" onClick="window.location.href='SignUpTeacher.php';" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Add Majors" onClick="window.location.href='SignUp.php';" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Add Semesters" onClick="window.location.href='SignUp.php';" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Course Offering" onClick="window.location.href='SignUp.php';" tabindex="2">
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>