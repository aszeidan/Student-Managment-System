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

$id = $_GET["id"];
$Admin->getClassId($id);
$class = $Admin->getClassById();

?>

<body>
    <div class=" register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To Time Travel University</h3>
                <P>We look forward to welcoming you to our campus soon!​</P>
                <form action="../View/Logout.php" method="POST">
                    <input type="submit" name="" value="SignOut" /><br />
                </form>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Table</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Edit Form </h3>

                                <form action="../Controller/Verify_Insert_Course.php" method="POST" class="form" id="form">
                                    <div class="row col-md-2">
                                        <ul>
                                            <li style='display: unset;position: absolute;margin: 72px;margin-left: 78px;margin-bottom: 79px;'><a href="#">Previous</a></li>
                                        </ul>
                                    </div>
                                    <div class="row register-form mx-0 px-0 col-md-12">
                                        <?php
                                        $className = $class[0]["ClassName"];
                                        $semesterId = $class[0]["SemesterId"];
                                        $courseId = $class[0]["CourseId"];
                                        $teacherId = $class[0]["TeacherId"];
                                        $scheduleId = $class[0]["ScheduleId"];
                                        ?>

                                        <div class="centering col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Classname" name="Classname" placeholder="Classname" value="<?php echo $className ?>" required>

                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="semester" id="semester" required>
                                                    <option disabled value="" selected hidden>Select Semester</option>
                                                    <?php
                                                    for ($i = 0; $i < count($semester); $i++) {
                                                    ?>
                                                        <option <?php if ($semesterId == $semester[$i]["SemesterId"]) {
                                                                    echo "selected";
                                                                } ?> value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="Course" id="Course" required>
                                                    <option disabled value="" selected hidden>Select Course</option>
                                                    <?php
                                                    for ($i = 0; $i < count($course); $i++) {
                                                    ?>
                                                        <option <?php if ($courseId == $course[$i]["CourseId"]) {
                                                                    echo "selected";
                                                                } ?> value="<?php echo $course[$i]["CourseId"] ?>"><?php echo $course[$i]["CourseName"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="teacher" id="teacher" required>
                                                    <option disabled value="" selected hidden>Select Instructor</option>
                                                    <?php
                                                    for ($i = 0; $i < count($teacher); $i++) {
                                                    ?>
                                                        <option <?php if ($teacherId == $teacher[$i]["TeacherId"]) {
                                                                    echo "selected";
                                                                } ?> value="<?php echo $teacher[$i]["TeacherId"] ?>"><?php echo $teacher[$i]['TFirstName'] . " " . $teacher[$i]['TLastName'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="schedule" id="schedule" required>
                                                    <option disabled value="" selected hidden>Schedule Time</option>
                                                    <?php
                                                    for ($i = 0; $i < count($schedule); $i++) {
                                                    ?>
                                                        <option <?php if ($scheduleId == $schedule[$i]["ScheduleId"]) {
                                                                    echo "selected";
                                                                } ?> value="<?php echo $schedule[$i]["ScheduleId"] ?>"><?php echo $schedule[$i]["Time"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- <?php if (isset($_GET["result"])) {
                                                        echo $_GET["result"];
                                                    } ?> !-->
                                            <div id="editMessage"></div>
                                            <input type="submit" class="btnRegister" value="Edit Course" id="editButton" />

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



    </div>

    <script>
        document.getElementById("editButton").addEventListener("click", function(event) {
            event.preventDefault();
            var data = {
                Classname: $("#Classname").val(),
                semester: $("#semester").val(),
                Course: $("#Course").val(),
                teacher: $("#teacher").val(),
                schedule: $("#schedule").val(),
            };

            $.post("../Controller/Verify_Insert_Course.php", data, function(result) {
                $("#editMessage").html(result.Message);
                setTimeout(() => {
                    $("#editMessage").html(" ");
                }, 4000);
            });
        });
    </script>

    <?php
    require_once('Footer.php');
    ?>

</body>

</html>