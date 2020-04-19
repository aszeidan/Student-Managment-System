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

                <form action="../Controller/Verify_SignUpTeacher.php" method="POST">

                    <div class="tab-pane fade show active" id="home" role="tabpanel" name="teacher" aria-labelledby="home-tab">
                        <h3 class="register-heading">Welcome To...</h3>
                        <div class="row register-form mx-0 px-0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="button" class="btnRegister" value="Generate" onClick="randomPassword(8,'TPassword');" tabindex="2">
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php
    require_once('Footer.php'); ?>

</body>

</html>