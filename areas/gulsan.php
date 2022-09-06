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
    $c_name = $_SESSION['username'];
    $sql3 = "SELECT fullName FROM user_detail WHERE username='$c_name'";
    $result3 = $conn->query($sql3);
    $row2 = $result3->fetch_assoc();
    $customer_name = $row2['fullName'];
?>
<div class="container">
    <div>
    <div class="heading"><h2 style="text-align:center">Parking space in Gulsan</h2></div>
    </div>
    <?php 
        $location='Gulsan';
        $sql2 = "SELECT user_detail.fullName, active.location, active.space, active.id FROM active JOIN user_detail ON user_detail.username=active.username WHERE location='$location' ORDER BY date DESC";
        $result2 = $conn->query($sql2);
        $count2 = mysqli_num_rows($result2);
    ?>
    <!-- new try -->
    <?php if($count2>0){ ?>
        <?php while($row = $result2->fetch_assoc()){ ?>
            <div class="" style="background:#E9ECEF;padding:20px; margin-bottom:15px;">
                <h3 class="">Empty Space Available in <?php echo $location ?></h3>
                <p class="">Car: <?php echo $row['space'] ?></p>
                <hr class="my-4">
                <p><i class="fa fa-user"></i> <?php echo $row['fullName'] ?></p>
                <p class="">
                    <a class="btn btn-success btn" href="../functional-pages/booking.php?g_name=<?php echo $row['fullName']?>&c_name=<?php echo $customer_name?>&id=<?php echo $row['id']?>&space=<?php echo $row['space']?>&location=<?php echo $location ?>" role="button">Book</a>
                </p>
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

<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>