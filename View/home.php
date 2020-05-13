<!DOCTYPE html>
<html lang="en">
<?php
require_once('HeaderSignin.php');


?>

<body>
	<div class="register" style=" background: -webkit-linear-gradient(right, #3931af, #00c6ff);">
		<div class="row">
			<div class="col-md-4 register-left" style="margin-top:8px">
				<img src="/images/logo-final-2.png" alt="" />
				<h3 style="font-family:Times New Roman, Times, serif; size:16px">Welcome To</h3>
				<h3 style="font-family:Times New Roman, Times, serif; size:16px"><b>Time Travel University</b></h3>
				<P style="font-family:Times New Roman, Times, serif; size:16px">The Time Traveler team in the Middle East works to provide the most pleasant exposure.Our vast experience comes from the variety in our team. The divergency in our teammates'assets accumulate across a broad spectrum of services.</p>
			</div>
			<div class="col-md-1 register-left">

			</div>
			<div class="col-md-7 register-rights">
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
			</div>


		</div>
		<?php
		require_once('../View/Footer.php'); ?>
	</div>
</body>

</html>