<?php
session_start();

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    
    require_once('../Model/Admin.php');    
	require_once('../Model/DatabaseSMS.php');
	require_once('../Model/Student.php');

    $db = new DatabaseSMS();
    $Admin = new Admin($db);
    $Student = new Student($db);
    
    $Student->setSemesterId($_GET["SemesterId"]);
    
    $studentID = $_SESSION['id'];
    $Student->setId($studentID);

    $StudentCourses = $Student->getStudentCoursesById();
    $StudentRegisteredCourses = $Student->getStudentRegisteredCoursesById();
    
?>
    <input class="mr-3 mb-3" id="course" name="course" placeholder="Search (i.e. CSC202)">
    <input type="submit" value="Search" class="btnSearch py-1 px-3" />


    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Course</th>
                <th scope="col">Instructor</th>
                <th scope="col">Course Time</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($StudentCourses as $course){
            ?>
            <tr>
                <td><a href="../Controller/Add_student_course.php?ClassId=<?php echo($course['ClassId']) ?>&ScheduleId=<?php echo($course['ScheduleId'])?>&SemesterId=<?php echo($course['SemesterId'])?>">Add</a></th>
                <td><?php echo($course['courseCode'])?></td>
                <td><?php echo($course['TFirstName'] . " " .$course['TMiddleName'] . " " . $course['TLastName'])?></td>
                <td><?php echo($course['Time'])?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="pt-5 pb-3">Registered Courses</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Course</th>
                <th scope="col">Instructor</th>
                <th scope="col">Course Time</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($StudentRegisteredCourses as $registeredCourse){
        ?>
            <tr>
                <td><a href="../Controller/Drop_student_course.php?RegistrationId=<?php echo($registeredCourse['RegistrationId']) ?>">DROP</a></th>
                <td><?php echo($registeredCourse['courseCode'])?></td>
                <td><?php echo($registeredCourse['TFirstName'] . " " .$registeredCourse['TMiddleName'] . " " . $registeredCourse['TLastName'])?></td>
                <td><?php echo($registeredCourse['Time'])?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
