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
                <h3>Welcome To</h3>
                <h3><b>Time Travel University</b></h3>
                <P>We look forward to welcoming you to our campus soon!​</P>
            </div>
            <div class="col-md-9 register-rights">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading"> SignIn</h3>
                        <div class="row register-forms mx-0 px-0 col-md-12">
                            <div class="centering col-md-6">
                                <form>
                                    <div class="form-group">
                                        <div class="input-container">
                                            <i class="fa fa-user icon"></i>
                                            <select class="custom-select" id="loginType" required>
                                                <option value="student">Student Login</option>
                                                <option value="teacher">Teacher Login</option>
                                                <option value="admin">Admin Login</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-container">

                                            <i class="fa fa-envelope icon"></i>
                                            <input type="text" class="form-control" placeholder="123@example.com" value="" id="uname" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-container">
                                            <i class="fa fa-key icon"></i>
                                            <input type="password" class="form-control" placeholder="123456" value="" id="psw" required />
                                        </div>
                                    </div>
                                    <div class="form-group" id="Message">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" id="loginMessage" class="btnRegister" value="Login" onClick="createLogin()" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        require_once('Footer.php'); ?>
    </div>

    <script>
        function createLogin() {
            var data = {
                uname: $("#uname").val(),
                psw: $("#psw").val(),
                loginType: $("#loginType").val(),
            };
            $.post("../Controller/Verify_Login.php", data, function(result) {
                $("#Message").html(result.Message);
                if (result.Message == "Success") {
                    window.location.href = result.location;
                }
                setTimeout(() => {
                    $("#Message").html(" ");
                }, 4000);
            });

        }
    </script>


</body>

</html>