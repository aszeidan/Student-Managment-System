<!DOCTYPE html>
<html lang="en">
<?php
require_once('HeaderSignin.php');


?>

<body>
	<div class="register">
		<div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3><b>Time Travel University</b></h3>
            </div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner">

				<div class="carousel-item ">
					<img src="../images/carousel1.jpg" class="d-block w-100" alt="carousel">
				</div>
				<div class="carousel-item active ">
					<img src="../images/carousel2.jpg" class="d-block w-100" alt="carousel">
				</div>
				<div class="carousel-item ">
					<img src="../images/carousel3.jpg" class="d-block w-100" alt="carousel">
				</div>
				<div class="carousel-item ">
					<img src="../images/carousel4.jpg" class="d-block w-100" alt="carousel">
				</div>
			</div>
			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<?php
		require_once('../View/Footer.php'); ?>
	</div>
</body>

</html>