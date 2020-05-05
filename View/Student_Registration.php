<?php 
require_once('Header.php');

require_once('../Model/Student.php');
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');

$db = new DatabaseSMS();
$Admin = new Admin($db);
$Student = new Student($db);

$studentID = $_SESSION['id'];
$Student->setId($studentID);
$semester = $Admin->getSemesters();
?>

<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script>
    function getCoursesBySemester(SemesterId) {
        var semesterID = $("#SemesterId").val();
        $.get("../Controller/RegisterBySemester.php?SemesterId=" + semesterID, function(data, status) {

            $("#classSemester").html(data);
        });
    }
</script>

<body>
<div class="container">
    <h2 class="py-3">Drop/Add Courses</h2>

    <div>
        <select class="mb-3" id="SemesterId" onChange="getCoursesBySemester()" name="Semester" required>
            <option disabled value="" selected hidden>Select Semester</option>
                <?php
                for ($i = 0; $i < count($semester); $i++) {
                ?>
                <option value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
                <?php } ?>
        </select>
    </div>
    <div id="classSemester">
    </div>
</div>
</body>
</html>