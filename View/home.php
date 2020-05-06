<!DOCTYPE html>
<html lang="en">
<?php
require_once('HeaderSignin.php');
require_once('../Model/DatabaseSMS.php');
$db = new DatabaseSMS();
require_once('../Model/Guest.php');
$Guest = new Guest($db);
$Images = $Guest->getCarouselImages();

?>
<body>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
	<?php for ($i = 0; $i < count($Images); $i++){?>
    <div class="carousel-item">
      <img src="../images/<?php echo $Images[$i]['imageName']; ?>" class="d-block w-100" alt="<?php echo $Images[$i]['imageAlt']; ?>">
    </div>
	<?php 
	}
	?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
	<?php for ($i = 0; $i < count($Images); $i++){?>
    <div class="carousel-item active">
      <img src="../images/<?php echo $Images[$i]['imageName']; ?>" class="d-block w-100" alt="<?php echo $Images[$i]['imageAlt']; ?>">
    </div>
	<?php 
	}
	?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</body>
</html>
