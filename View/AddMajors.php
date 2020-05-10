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

$majors = $Admin->getMajors();

?>
<body>
    <div class=" register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To</h3>
				<h3><b>Time Travel University</b></h3>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Major</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Table</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Add Major </h3>
                                <div class="row col-md-2">

                                    <ul>
                                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Choose_Directory.php"><i class="fa fa-arrow-left" style="font-size:35px"></i></a></li>
                                    </ul>
                                </div>
                                <form action="../Controller/Verify_Insert_Major.php" method="POST" class="form" id="form">
                                    <div class="row register-form mx-0 px-0 col-md-12">
                                        <div class="centering col-md-6">
                                            <div class="form-group">
                                                <div class="input-container">
                                                    <i class="far fa-building icon"></i>
                                                    <input type="text" class="form-control" id="MajorTitle" name="MajorTitle" placeholder="MajorTitle" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group" id="majorMessage">
                                            </div>
                                            <input type="submit" class="btnRegister" id="registerButton" value="Register" />

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Table</h3>
                        <div class=" register-form">

                            <div class="form-group">
                                <table border="5" class="table table-hover table-bordered width:fit content" id="Registration_table">

                                    <thead class="table-primary">

                                        <th> Major Id </th>
                                        <th> Major Name </th>
                                        


                                    </thead>
                                    </span>
                                    <?php
                                    for ($i = 0; $i < count($majors); $i++) {
                                    ?>
                                        <tr>
                                            <td><?php echo $majors[$i]['MajorId']; ?> </td>
                                            <td><?php echo $majors[$i]['MajorTitle']; ?> </td>
                                        </tr> <?php } ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script>
            document.getElementById("registerButton").addEventListener("click", function(event) {
                event.preventDefault();
                var data = {
                    MajorTitle: $("#MajorTitle").val(),
                };

                $.post("../Controller/Verify_Insert_Major.php", data, function(result) {
                    $("#courseMessage").html(result.Message);
                    setTimeout(() => {
                        $("#majorMessage").html(" ");
                    }, 4000);
                });
            });
        </script>

        <?php
        require_once('Footer.php'); ?>

</body>

</html>