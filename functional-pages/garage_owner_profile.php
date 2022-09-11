<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php
    if(!isset($_SESSION['isLogin'])){
        header('location: login.php');
		die();
    }
    if($_SESSION['ROLE'] == '2'){
        header('location: logout.php');
        die(); 
    }
    $username = $_SESSION['username'];
?>
<link rel="stylesheet" href="style_user.css">

<?php 
    $sql1 = "SELECT * FROM user_detail WHERE fullName='$customer_name'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $sql2 = "SELECT * FROM bookings JOIN user_detail on bookings.renter = user_detail.username  WHERE user_detail.username='$username' AND bookings.complete='1' ORDER BY date DESC";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);
?>
	<!--home page-->
	<div class="container">
        <div>   
            <h4 style='font-weight:300'>Garage Owner Name: <?php echo $customer_name?></h4>
            <p>Total Bookings : <?php echo $count2 ?> </p>
            <hr>
        </div>
        <div>   
            <h3 style='font-weight:300;text-decoration:underline'>Completed Bookings  </h3>
            <?php if($count2>0){ ?>
                <?php while($row = $result2->fetch_assoc()){ ?>
                    <div class="" style="background:#1e7e347d;padding:20px; margin-bottom:15px;color:#000;">
                        <h5 style='font-weight:500;'><a style="color:#000;" href="booking-detail.php?id=<?php echo $row['id'] ?>" >bk-id-<?php echo $row['id'] ?></a></h5>
                        <p class="">Location: <?php echo $row['location'] ?> | Car: <?php echo $row['space'] ?></p>

                        <hr class="my-4">
                        <p><i class="fa fa-user"></i> <?php echo $row['renter'] ?> <i class="ml-5 fa fa-phone"></i> <?php echo $row['number'] ?> </p>
                        <p class="">Date: <?php echo $row['date'] ?></p>
                    </div>
                <?php } ?>
            <?php }else {?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5 class="">No Active Post</h5>
                    </div>
                </div>
            <?php }?> 
        </div>
    </form>
	</div>

<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>