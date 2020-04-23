<!DOCTYPE html>
<html lang="en">

<?php
require_once('HeaderSignin.php');
?>

<body>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To Time Travel University</h3>
                <p>If you’re looking for a transformative educational and life experience, AG is the right place for you. On this website you will find details on our admission policies and procedures, as well as the application process and deadlines.</p>

            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Sign In</h3>
                        <div class="row register-form mx-0 px-0 col-md-12">
                            <div class="centering col-md-6">
                                <form action="../Controller/Verify_Login.php" method="POST">
                                    <div class="form-group">
                                        <select class="custom-select" name="loginType" required>
                                            <option value="student">Student Login</option>
                                            <option value="teacher">Teacher Login</option>
                                            <option value="admin">Admin Login</option>
                                        </select>
                                    </div>
                                    <div class="form-group">


                                        <input type="text" class="form-control" placeholder="123@example.com" value="" name="uname" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="123456" value="" name="psw" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="loginMessage" class="btnRegister" value="Login" onClick="createLogin()" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
    <script>
        function createLogin() {
            var data = {
                username: $("#uname").val(),
                password: $("#psw").val(),
                loginType: $("#loginType").val(),
            };
            $.post("../Controller/Verify_Login.php", data, function(result) {
                $("#loginMessage").html(result.Message);
                setTimeout(() => {
                    $("#loginMessage").html(" ");
                }, 4000);
            });

        }
    </script>

    <?php
    require_once('Footer.php'); ?>

</body>

</html>