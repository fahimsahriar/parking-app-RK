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
?>
<?php 
    $space='';
    $id = $_GET['id'];
    $op = $_GET['op'];
    if(isset($_POST['submit'])){
        if($op==1){
            $sql = "UPDATE bookings SET accept = '1' WHERE id = '$id'";
            $conn->query($sql);
            // header('location: owner_page.php');
            echo '<div style="text-align:center;padding:15px;"><p><i class="far fa-check-circle"></i> Successfully Accepted</p><a class="btn btn-success" href="g-owner_page.php" role="button">Back to Dashboard</a></div>';
        }else{
            $sql = "UPDATE bookings SET accept = '2' WHERE id = '$id'";
            $conn->query($sql);
            // header('location: owner_page.php');
            echo '<div style="text-align:center;padding:15px;"><p><i class="far fa-check-circle"></i> Successfully Rejected</p><a class="btn btn-success" href="g-owner_page.php" role="button">Back to Dashboard</a></div>';
        }
        die();
    }    
?>
<div class="container" style="margin-bottom: 80px;">
    <h2 style="text-align:center">Booking Request</h2>
    <hr>
    <form method="POST">
        <?php if($op==1){ ?>
            <p>Did your check the user?</p>
            <h5>Click accept to accept the booking for this user - </h5>
            <button type="submit" name="submit" class="btn btn-success">Accept</button>    
        <?php }else{ ?>
            <h5>Click delete to ignore and delete the request - </h5>
            <button type="submit" name="submit" class="btn btn-danger">Delete</button>
        <?php }?>
    </form>
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>
