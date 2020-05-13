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
                <h3 style="font-family:Times New Roman, Times, serif; size:16px">Welcome To</h3>
                <h3 style="font-family:Times New Roman, Times, serif; size:16px"><b>Time Travel University</b></h3>
            </div>
            <div class="col-md-9 register-rights">
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
                                        <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="../View/Choose_Directory.php"><i class="fa fa-arrow-left icons" style="font-size:35px"></i></a></li>
                                    </ul>
                                </div>
                                <form action="../Controller/Verify_Insert_Major.php" method="POST" class="form" id="form">
                                    <div class="row register-forms mx-0 px-0 col-md-12">
                                        <div class="centering col-md-6">
                                            <div class="form-group">
                                                <div class="input-container">
                                                    <i class="fa fa-building icon"></i>
                                                    <input type="text" class="form-control" id="MajorTitle" name="MajorTitle" placeholder="MajorTitle" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-container">
                                                    <i class="fa fa-exclamation icons"></i>
                                                    <textarea type="text" class="form-control" id="MajorDescription" name="MajorDescription" placeholder="MajorDescription" value="" required></textarea>
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
                        <div class=" register-forms">

                            <div class="form-group">
                                <table class="table table-hover" id="Registration_table" style="color:white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Major Id</th>
                                            <th scope="col">Major Name</th>
                                            <th scope="col"> Major Description </th>

                                        </tr>
                                    </thead>

                                    <?php
                                    for ($i = 0; $i < count($majors); $i++) {
                                    ?>
                                        <tr>
                                            <td><?php echo $majors[$i]['MajorId']; ?> </td>
                                            <td><?php echo $majors[$i]['MajorTitle']; ?> </td>
                                            <td><?php echo $majors[$i]['MajorDescription']; ?> </td>

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
                    MajorDescription: $("#MajorDescription").val(),
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