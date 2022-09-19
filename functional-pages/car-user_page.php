<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php
    if(!isset($_SESSION['isLogin'])){
        header('location: login.php');
		die();
    }
    if($_SESSION['ROLE'] == '1'){
        header('location: logout.php');
        die(); 
    }
?>
<link rel="stylesheet" href="style_user.css">

	<!--home page-->
	<div class="container" style="margin-bottom: 80px;">
		<h3 class="heading">Select your parking area</h3>
		<hr style="width:50% ;">
		<ul class="list-group">
		  <a href="../areas/notun_bazar.php"><li class="list-group-item">1. Notun Bazar</li></a>
		  <a  href="../areas/banani.php"><li class="list-group-item">2. Banani</li></a>
		  <a href="../areas/gulsan.php"><li class="list-group-item">3. Gulsan</li></a>
		  <a  href="../areas/uttora.php"><li class="list-group-item">3. Uttara</li></a>
		  <a  href="../areas/badda.php"><li class="list-group-item">5. Badda</li></a>
		  <a href="../areas/gulsan.php"><li class="list-group-item">6. Gulsan</li></a>
		  <a  href="../areas/uttora.php"><li class="list-group-item">7. Uttara</li></a>
		</ul>
	</div>

<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>