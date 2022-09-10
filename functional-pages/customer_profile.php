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

<?php 
    $sql1 = "SELECT * FROM user_detail WHERE fullName='$customer_name'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $customer_username = $row1['username'];
    //echo $customer_username ;

    $sql2 = "SELECT * FROM bookings WHERE customer='$customer_username' AND complete='1' ORDER BY date DESC";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);

    $sql3 = "SELECT * FROM bookings JOIN user_detail ON bookings.customer = user_detail.username WHERE customer='$customer_username' AND complete='0' ORDER BY date DESC";
    $result3 = $conn->query($sql3);
    $count3 = mysqli_num_rows($result3);
?>
	<!--home page-->
	<div class="container">
        <div>   
            <h4 style='font-weight:300'>Full Name: <?php echo $customer_name?></h4>
            <p>Total Bookings : <?php echo $count2 ?> </p>
            <p>Car Name : <?php echo $row1['Car_Name'] ?>  </p>
            <p>Model : <?php echo $row1['Model'] ?> </p>
            <p>Registration NO : <?php echo $row1['Registrations_NO'] ?> </p>
            <p>NID : <?php echo $row1['NID'] ?> </p>
            <hr>
        </div>
        <!-- Running Rent -->
        <div>   
            <h3 style='font-weight:300;text-decoration:underline'>Running Rent</h3>
            <?php if($count3>0){ ?>
                <?php while($row2 = $result3->fetch_assoc()){ ?>
                    <div class="" style="background:#dec780;padding:20px; margin-bottom:15px;">
                        <h4 style='font-weight:300;'><?php echo $row2['location'] ?> </h4>
                        <p class="">Car: <?php echo $row2['space'] ?></p>
                        <hr class="my-4">
                        <p><i class="fa fa-user"></i> <?php echo $row2['renter'] ?></p>
                        <p><i class="fa fa-phone"></i> <?php echo $row2['number'] ?></p>
                        <p class="">Date: <?php echo $row2['date'] ?></p>
                        <p class="">
                            <a class="btn btn-success btn" href="complete.php?id=<?php echo $row2['id']?>&step=1" role="button">Marked as complete</a>
                        </p>
                    </div>
                <?php } ?>
            <?php }else {?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5 class="">No Running Rent</h5>
                    </div>
                </div>
            <?php }?> 
        </div>
        <!-- Completed Bookings -->
        <div>   
            <h3 style='font-weight:300;text-decoration:underline'>Completed Bookings</h3>
            <?php if($count2>0){ ?>
                <?php while($row = $result2->fetch_assoc()){ ?>
                    <div class="" style="background:#E9ECEF;padding:20px; margin-bottom:15px;">
                        <h4 style='font-weight:300;'><?php echo $row['location'] ?> </h4>
                        <p class="">Car: <?php echo $row['space'] ?></p>
                        <hr class="my-4">
                        <p><i class="fa fa-user"></i> <?php echo $row['renter'] ?></p>
                        <p class="">Date: <?php echo $row['date'] ?></p>
                    </div>
                <?php } ?>
            <?php }else {?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5 class="">Zero Bookings</h5>
                    </div>
                </div>
            <?php }?> 
        </div>
	</div>

<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>