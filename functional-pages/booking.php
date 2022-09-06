<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php include_once 'C:\xampp\htdocs\Dhaka-Parking\db_connect.php';

    $g_name = $_GET['g_name'];
    $c_name = $_GET['c_name'];
    $id = $_GET['id'];
    $space = $_GET['space'];
    $location = $_GET['location'];
    $i;

    // booking functions
    if(isset($_POST['submit'])){
        $number = $_POST['number']; 

        $b_space = $_POST['space'];
        $space = $space - $b_space;

        if($space<=0){
            $sql = "DELETE FROM `active` WHERE `active`.`id` = '$id'";
            $sql2 = "INSERT INTO bookings (location, space, customer, renter, number ) VALUES ('$location', '$b_space','$c_name', '$g_name', '$number ')";
        }else{
            $sql = "UPDATE active SET space = '$space' WHERE id = '$id'";
            $sql2 = "INSERT INTO bookings (location, space, customer, renter, number ) VALUES ('$location', '$b_space','$c_name', '$g_name', '$number ')";
        }
        $conn->query($sql);
        $conn->query($sql2);
        echo '<div style="text-align:center;padding:15px;"><p><i class="far fa-check-circle"></i> Successfully Booked !!!</p><a class="btn btn-success" href="car-user_page.php" role="button">Back</a></div>';
        die();
    }
?>
<div class="container" style="margin-bottom: 80px;">
    <h3 style="padding:15px;text-align:center">Booking Form</h3>
    <p>Garage owner: <?php echo $g_name ?></p>
    <p>Customer: <?php echo $c_name ?></p>
    <form method="POST">
        <div class="form-group">
            <label for="exampleFormControlInput1">Phone Number</label>
            <input type="phone" class="form-control" name="number">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Space</label>
            <select class="form-control" name="space">
            <?php for($i = 1;$i<=$space;$i++){ ?>
                <option><?php echo $i ?></option>
            <?php } ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>