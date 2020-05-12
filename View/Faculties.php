<!DOCTYPE html>
<html lang="en">

<?php
require_once('HeaderSignin.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Model/DatabaseSMS.php');
require_once('../Model/Guest.php');
$db = new DatabaseSMS();
$Guest = new Guest($db);

$majors = $Guest->getMajors();
?>

<body>
<div class="register">

    <div class="container py-5">
		<div class="row ">
		  <h3 class="register-heading" style="margin-top: -80px;" >Registration Form </h3>
		</div>
      <div class="row ">
	
	  <?php for ($i = 0; $i < count($majors); $i++){?>
        <div class="col-lg-5">
          <h4 class="font-weight-light text-white"><?php echo $majors[$i]['MajorTitle']; ?></h4>
          <p class="font-italic text-white"><?php echo $majors[$i]['MajorDescription']; ?></p>
        </div>
		
	  <?php }?>
      </div>
	</div>

    <?php
    require_once('Footer.php'); ?>
  </div>

</body>

</html>