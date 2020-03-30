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
$class = $Admin->getClassById($id);

?>

<body class="text-center">

    <div class="container">
        <div class="row mb-3">

            <div class="col-md-6 col-lg-6">
                <br>
                <h2>Edit Form</h2>
                <form name=" editpage" action="../Controller/Update_course_registration_form.php" method="GET">
                    <?php
                    $className = $class[0]["ClassName"];
                    $semesterId = $class[0]["SemesterId"];
                    $courseId = $class[0]["CourseId"];
                    $teacherId = $class[0]["TeacherId"];
                    $scheduleId = $class[0]["ScheduleId"];
                    ?>

                    <input type="text" name="id" value="<?php echo $_GET["id"]; ?>" hidden>
                    <div class="form-row ">
                        <div class="form-group col-10">
                            <label for="Classname" class="col-sm-2 col-form-label col-form-label-lg"><b>Class</b></label>
                            <input type="text" name="ClassName" value="<?php echo $className ?>" id="Classname" class="form-control" placeholder="Classname" required>

                        </div>
                        <div class="form-group col-10">
                            <label class="col-sm-2 col-form-label col-form-label-lg " for="semester"><b>Semester</b></label>

                            <select class="custom-select" name="Semester" required>

                                <?php
                                for ($i = 0; $i < count($semester); $i++) {
                                ?>
                                    <option <?php if ($semesterId == $semester[$i]["SemesterId"]) {
                                                echo "selected";
                                            } ?> value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-10">
                            <label for="Course" class="col-sm-2 col-form-label col-form-label-lg"><b>Course</b></label>

                            <select class="custom-select" name="Course" required>

                                <?php
                                for ($i = 0; $i < count($course); $i++) {
                                ?>
                                    <option <?php if ($courseId == $course[$i]["CourseId"]) {
                                                echo "selected";
                                            } ?> value="<?php echo $course[$i]["CourseId"] ?>"><?php echo $course[$i]["CourseName"] ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group col-10">
                            <label for="teacher" class="col-sm-2 col-form-label col-form-label-lg"><b>Instructor</b></label>

                            <select class="custom-select" name="Teacher" required>
                                <?php
                                for ($i = 0; $i < count($teacher); $i++) {
                                ?>
                                    <option <?php if ($teacherId == $teacher[$i]["TeacherId"]) {
                                                echo "selected";
                                            } ?> value="<?php echo $teacher[$i]["TeacherId"] ?>"><?php echo $teacher[$i]['TFirstName'] . " " . $teacher[$i]['TLastName'] ?></option>
                                <?php } ?>


                            </select>
                        </div>

                        <div class="form-group col-10">
                            <label for="schedule" class="col-sm-2 col-form-label col-form-label-lg"><b>Schedule</b></label>
                            <select class="custom-select" name="Schedule">
                                <?php
                                for ($i = 0; $i < count($schedule); $i++) {
                                ?>
                                    <option <?php if ($scheduleId == $schedule[$i]["ScheduleId"]) {
                                                echo "selected";
                                            } ?> value="<?php echo $schedule[$i]["ScheduleId"] ?>"><?php echo $schedule[$i]["Time"] ?></option>
                                <?php } ?>


                            </select>
                        </div>



                    </div>
                    <button class="btn btn-primary btn-lg waves-effect waves-light" type="edit">Edit Course</button>


                </form>
            </div>

        </div>
    </div>
    <?php
    require_once('Footer.php');
    ?>

</body>

</html>