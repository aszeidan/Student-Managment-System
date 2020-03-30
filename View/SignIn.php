<!DOCTYPE html>
<html lang="en">

<?php
require_once('Header.php');
if (!isset($_SESSION)) {
    session_start();
    $_SESSION["ID"] = 0;
}
?>

<body>
    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To Time Travel University</h3>
                <p>If you’re looking for a transformative educational and life experience, AG is the right place for you. On this website you will find details on our admission policies and procedures, as well as the application process and deadlines.</p>
                <div class="form-group">
                    <form action="SignUp_Form.php" method="POST">
                        <input type="submit" name="" value="SignUp" /><br />
                    </form>
                </div>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Sign In</h3>
                        <div class="row register-form mx-0 px-0 col-md-12">
                            <div class="centering col-md-6">
                                <form action="../Controller/Verify_Login.php" method="POST">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="123@example.com" value="" name="uname" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="123456" value="" name="psw" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btnRegister" value="Login" />
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
    <?php
    require_once('Footer.php'); ?>

</body>

</html>