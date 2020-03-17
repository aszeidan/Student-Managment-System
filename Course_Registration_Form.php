<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('Header.php');
require_once('DatabaseSMS.php');
$db = new DatabaseSMS();

$query1 = 'select * from semester';
$semester = $db->selectquery($query1);

$query2 = 'select * from course';
$course = $db->selectquery($query2);

$query3 = 'select * from teacher';
$teacher = $db->selectquery($query3);

$query4 = 'select * from schedule';
$schedule = $db->selectquery($query4);

$query5 = 'select * from class join course on course.CourseId=class.CourseId 
                                join semester on semester.SemesterId=class.SemesterId
                                join teacher on teacher.TeacherId=class.TeacherId
                                join schedule on schedule.ScheduleId=class.ScheduleId';
$class = $db->selectquery($query5);
/*echo "<pre>";
print_r($class);
echo "</pre>";*/
?>

<!-- Page content -->
<div class="row">
    <div class="col-md-4 col-lg-4 offset-1">
        <div>
            <h2 style=" padding-top:50px; text-align:center">Admin Registration Form</h2>
        </div>

        <form action="SMS_insert.php" method="POST">


            <div>

                <label for="semester"><b>Class</b></label>
                <input type="text" name="Classname">

                <label for="semester"><b>Semester</b></label>
                <select class="selectoption" name="semester">
                    <option value=""></option>
                    <?php
                    for ($i = 0; $i < count($semester); $i++) {
                    ?>
                        <option value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
                    <?php } ?>
                </select>

                <label for="Course"><b>Course</b></label>

                <select class="selectoption" name="Course">
                    <option value=""></option>
                    <?php
                    for ($i = 0; $i < count($course); $i++) {
                    ?>
                        <option value="<?php echo $course[$i]["CourseId"] ?>"><?php echo $course[$i]["CourseName"] ?></option>
                    <?php } ?>
                </select>

                <label for="teacher"><b>teacher</b></label>
                <select class="selectoption" name="teacher">
                    <option value=""></option>
                    <?php
                    for ($i = 0; $i < count($teacher); $i++) {
                    ?>
                        <option value="<?php echo $teacher[$i]["TeacherId"] ?>"><?php echo $teacher[$i]["TFirstName"] ?></option>
                    <?php } ?>

                </select>
                <label for="schedule"><b>schedule</b></label>
                <select class="selectoption" name="schedule">
                    <option value=""></option>
                    <?php
                    for ($i = 0; $i < count($schedule); $i++) {
                    ?>
                        <option value="<?php echo $schedule[$i]["ScheduleId"] ?>"><?php echo $schedule[$i]["Time"] ?></option>
                    <?php } ?>

                </select>

                <button type="submit">Add Course</button>

            </div>


        </form>
    </div>
    <div class="col-md-5 col-lg-5 offset-1 " style="padding-top:50px; text-align:center">

        <h1>Course Offering </h1>
        <table border="1" class="table" id="Registration_table">

            <thead class="thead-dark">

                <th>Class Name</th>
                <th>Semester</th>
                <th>Course</th>
                <th>teacher</th>
                <th>schedule</th>
                <th>Delete</th>

            </thead>
            </span>
            <?php
            for ($i = 0; $i < count($class); $i++) {
            ?>
                <tr>
                    <td><?php echo $class[$i]['ClassName']; ?> </td>
                    <td><?php echo $class[$i]['SName']; ?> </td>
                    <td><?php echo $class[$i]['CourseName']; ?> </td>
                    <td><?php echo $class[$i]['TFirstName'] . " " . $class[$i]['TLastName']; ?> </td>
                    <td><?php echo $class[$i]['Time']; ?> </td>
                    <td><a href="Delete_course_registration_form.php?SMS_id=<?php echo $class[$i]['ClassId']; ?>" </a>Delete </td> </tr> <?php } ?> </table> </div> </div> <?php require_once('Footer.php'); ?>