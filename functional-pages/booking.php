<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php include_once 'C:\xampp\htdocs\Dhaka-Parking\db_connect.php';
    $renter_username = $_GET['renter_username'];
    $customer_username = $_GET['customer_username'];
    $g_name = $_GET['g_name'];
    $c_name = $_GET['c_name'];
    $id = $_GET['id'];
    $space = $_GET['space'];
    $location = $_GET['location'];
    $i;
    //echo $renter_username;
    // booking functions
    if(isset($_POST['submit'])){
        $number = $_POST['phone-number'];
        $b_space = $_POST['space'];
        $space = $space - $b_space;
        $day = $_POST['duration-day'];
        $hour = $_POST['duration-hour'];
        $total_cost = $space*(($day*24*10)+($hour*10));

        if($space<=0){
            $sql = "DELETE FROM `active` WHERE `active`.`id` = '$id'";
            $sql2 = "INSERT INTO bookings (location, space, customer, renter, number,day,hour,cost ) VALUES ('$location', '$b_space','$customer_username', '$renter_username', '$number ','$day','$hour','$total_cost')";
        }else{
            $sql = "UPDATE active SET space = '$space' WHERE id = '$id'";
            $sql2 = "INSERT INTO bookings (location, space, customer, renter, number,day,hour,cost ) VALUES ('$location', '$b_space','$customer_username', '$renter_username', '$number','$day','$hour','$total_cost')";
        }
        $conn->query($sql);
        $conn->query($sql2);
        echo '<div style="text-align:center;padding:15px;"><p><i class="far fa-check-circle"></i> Successfully Booked !!!</p><a class="btn btn-success" href="car-user_page.php" role="button">Back</a></div>';
        die();
    }
?>
<div class="container" style="margin-bottom: 80px;">
    <h3 style="padding:15px;text-align:center">Booking Form</h3>
    <hr class="w-30">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                Rate: 10 tk/hr
            </div>
            <div class="col-sm">
                <p><span style="text-decoration: underline; font-weight:bold ;">Parking owner:</span>  <?php echo $g_name ?></p>
                <p><span style="text-decoration: underline; font-weight:bold ;">Location:</span>  <?php echo $location ?></p>
            </div>
            <div class="col-sm">
                <p><span style="text-decoration: underline; font-weight:bold ;">Car owner:</span> <?php echo $c_name ?></p>
            </div>
        </div>
        </div>
    <hr>
    <form method="POST" class="">
        <div class="form-group ">
            <label for="exampleFormControlInput1">Phone Number</label>
            <input class="form-control" type="phone" class="form-control" name="phone-number"  placeholder="Here, enter your cell number, where parking owner can call you">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Space</label>
            <select onchange="qf()" id="drop" class="form-control form-control-sm" name="space">
            <?php for($i = 1;$i<=$space;$i++){ ?>
                <option value="<?php echo $i ?>" ><?php echo $i ?> Car, 10x10 meter</option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Duration</label>
            <input id="day" class="form-control" type="number" class="form-control" name="duration-day"  placeholder="Days">
            <input min="1" max="5" id='hour' class="form-control mb-2" ype="number" class="form-control" name="duration-hour"  placeholder="Hours">
            <p class="" id="current-price"><span id="day-c">0</span> days, <span id="hour-c">0</span> hours </p>
            <p>Total: <span id="pricew">0</span> Taka</p>
        </div>
        <div></div>
        <hr class="mt-2">
        <button type="submit" name="submit" class="form-group btn btn-success">Confirm Booking</button>
    </form>
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>

<script src="../js/booking.js"></script>