<!DOCTYPE html>
<html lang="en">
<?php
require_once('Header.php');
?>

<body>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To</h3>
                <h3><b>Time Travel University</b></h3>
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
                <form>
                    <div class="tab-pane fade show active" id="home" role="tabpanel" name="teacher" aria-labelledby="home-tab">
                        <h3 class="register-headings">Welcome <?php echo $_SESSION["userName"]; ?> </h3>
                        <div class="row register-forms mx-0 px-0">
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
                                    <input type="button" class="btnRegister" value="Add Majors" onClick="window.location.href='AddMajors.php';" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Add Semesters" onClick="window.location.href='AddSemester.php';" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Course Offering" onClick="window.location.href='CourseOffering.php';" tabindex="2">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Add Course" onClick="window.location.href='AddCourse.php';" tabindex="2">
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>
        <?php
        require_once('Footer.php'); ?>
    </div>
</body>

</html>