
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Smart Parking</title>
  </head>
  <?php
    include_once 'db_connect.php';
    session_start();
    $customer_name='login';
    if(!isset($_SESSION['isLogin'])){
      
    }else{
      $c_name = $_SESSION['username'];
      $sql3 = "SELECT fullName FROM user_detail WHERE username='$c_name'";
      $result3 = $conn->query($sql3);
      $row2 = $result3->fetch_assoc();
      $customer_name = $row2['fullName'];
    }
  ?>
<body style="position:relative">

<!--Nav bar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="/Dhaka-Parking/index.php">Smart Parking</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user fa-fw"></i><span> <?php echo $customer_name ?></span>
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
            <?php if( isset($_SESSION['isLogin']) && $_SESSION['ROLE'] == '1'): ?>
	          <a class="dropdown-item" href="/Dhaka-parking/functional-pages/garage_owner_profile.php">Garage Owner Profile</a>
            <hr>
            <a class="dropdown-item" href="/Dhaka-parking/functional-pages/owner_page.php">Dashboard</a>
            <?php elseif( isset($_SESSION['isLogin']) &&  $_SESSION['ROLE'] == '2'): ?>
	          <a class="dropdown-item" href="/Dhaka-parking/functional-pages/customer_profile.php">Car Owner Profile</a>
            <hr>
            <a class="dropdown-item" href="/Dhaka-parking/functional-pages/user_page.php">Find Parking Space</a>
            <?php endif ?>
            <?php if(!(isset($_SESSION['isLogin']))): ?>
	          <a class="dropdown-item" href="/Dhaka-parking/functional-pages/login.php">login</a>
            <?php elseif(isset($_SESSION['isLogin'])): ?>
              <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="/Dhaka-parking/functional-pages/logout.php">logout</a>  
            <?php endif ?>
	        </div>
	      </li>
        </ul>
	  </div>
	</nav>