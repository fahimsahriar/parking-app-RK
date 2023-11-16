<?php require 'header.php'; ?>
<?php
    if (isset($_SESSION['isLogin'])) {
		if(($_SESSION['ROLE'])==1)
		{
			header('location: functional-pages/g-owner_page.php');
		}
		elseif(($_SESSION['ROLE'])==2){
			header('location: functional-pages/customer_profile.php');
		}
        die();
    }
?>
<!--Nav bar-->

<!--home page-->

<!--Welcoming page-->
<div class="cover">
	<div class="content-area">
		<div class="content">
			<h1 style="font-weight: 300;">Parking shouldn’t be a hassle</h1>
			<h4 style="font-weight: 300;">Get a trendy car parking website fitted with a powerful parking reservation system with all key features</h4>
			<a href="#next"><button type="button" class="btn" style="background: #7d736c94;color:#fdea07;margin-top:20px">Explore more <i class="fas fa-chevron-down"></i></button></a>
			<a href="./functional-pages/registration-car.php"><button type="button" class="btn" style="background: #7d736c94;color:#fdea07;margin-top:20px">Get Started As Car Owner <i class="fas fa-arrow-right"></i></button></a>
			<a href="./functional-pages/registration-parking.php"><button type="button" class="btn" style="background: #7d736c94;color:#fdea07;margin-top:20px">Get Started As Parking Lot Owner <i class="fas fa-arrow-right"></i></button></a>
		</div>
	</div>
	<!--2nd call-->
	<div class="head2 container1" id="next">
		<h2 style="font-weight: 300;">We can answer your two important question</h2>
	</div>
	<div class="container1 head3">
		<div class="row" style="padding-top: 30px;">
			<div class="col" style="padding-top: 30px;">
				<h3 style="font-weight: 400;">Looking for parking space?</h3>
				<hr>
				<ul style="padding-top: 30px;">
					<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">Search parking spaces by loaction</li>
					<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">Compare your options</li>
					<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">Reserve your parking pass and drive up</li>
					<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">You're done!</li>
				</ul>
			</div>
			<div class="col">
				<img src="images/car_park.jpg" style="width:70%" alt="">
			</div>
		</div>
	</div>
	<!--4rd call-->
	<div style="background: #343A40;color:#fff">
		<div class="container1 head3">
			<div class="row">
				<div class="col">
					<img src="images/empty_g.jpg" style="width:70%;padding-top: 30px;" alt="">
				</div>
				<div class="col" style="padding-top: 30px;">
					<h3 style="font-weight: 400;">Need Income activation by parking space?</h3>
					<hr style="background-color: #989898;">
					<ul style="padding-top: 30px;">
						<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">Advertise your parking space</li>
						<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">Let clients book park spaces online</li>
						<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">Rent parking</li>
						<li style="font-size: 1.3em;font-weight:400;margin-bottom:20px">Make money</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container1" style="margin-top:30px">
		<h2 style="font-weight: 300; text-align:left">Get started with Smart Parking, the trendiest parking system </h2>
		<hr>
	</div>
	<div class="container1 head3">
		<div class="row">
			<div class="col" style="padding-top: 30px;text-align:left">
				<ul>
					<li style="font-size: 1.3em;font-weight:300;margin-bottom:20px;">Best for travelar, who can rent per night</li>
					<li style="font-size: 1.3em;font-weight:300;margin-bottom:20px">Instant searching by location</li>
					<li style="font-size: 1.3em;font-weight:300;margin-bottom:20px">Find and rent empty space from anywhere</li>
					<li style="font-size: 1.3em;font-weight:300;margin-bottom:20px;">Trustable garage owner and car owner</li>
				</ul>
				<a href="./functional-pages/registration-car.php"><button class="btn btn-success" style="margin-top: 20px;">Get Started as car owner</button></a>
				<a href="./functional-pages/registration-car.php"><button class="btn btn-success" style="margin-top: 20px;">Get Started as parking owner</button></a>
			</div>
			<div class="col" style="padding-top: 30px;text-align:left">
				<img src="images/money.png" style="width:70%" alt="">
			</div>
		</div>
	</div>
	<style>
		.container1{
			padding-right: 100px;
			padding-left: 100px;
		}
	</style>

	<?php require 'footer.php'; ?>