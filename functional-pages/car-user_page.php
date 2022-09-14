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
		<ul class="list-group">
		  <a href="../areas/notun_bazar.php"><li class="list-group-item">Notun Bazar</li></a>
		  <a href="../areas/banani.php"><li class="list-group-item">Banani</li></a>
		  <a href="../areas/gulsan.php"><li class="list-group-item">Gulsan</li></a>
		  <a href="../areas/uttora.php"><li class="list-group-item">Uttara</li></a>
		  <a href="../areas/badda.php"><li class="list-group-item">Badda</li></a>
		</ul>
	</div>

<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>