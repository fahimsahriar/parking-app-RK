<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php
if (!isset($_SESSION['isLogin'])) {
    header('location: login.php');
    die();
}
//if ($_SESSION['ROLE'] == '1') {
   // header('location: logout.php');
    //die();
//}
?>
<?php
$id = $_GET['id'];
$step = $_GET['step'];
if (isset($_POST['submit'])) {
    $sql = "UPDATE bookings SET complete = '$step' WHERE id = '$id'";
    $conn->query($sql);
    if ($_SESSION['ROLE'] == '1') {
        $d_id = "garage_owner_profile.php";
    } else {
        $d_id = "customer_profile.php";
    }
    $d_id = '<div style="text-align:center;padding:15px;"><p><i class="far fa-check-circle"></i>Thank you for having our service</p><a class="btn btn-success" href="'.$d_id;
    $d_id = $d_id.'" ';
    $d_id = $d_id.' role="button">Back to Dashboard</a></div>';
    $temp_url = '';
    $temp_url = $temp_url.$d_id;

    echo $temp_url;
    die();
}
?>

<div class="container" style="margin-bottom: 80px;">
    <div class="feedback">
        <p>Dear Customer,<br>
            Thank you for getting your car services at our workshop. We would like to know how we performed. Please spare some moments to give us your valuable feedback as it will help us in improving our service.</p>

        <h4>Please rate your service experience and complete the booking</h4>

        <form method="post">
            <label>1. Your overall experience with the person ?</label><br>

            <span class="star-rating">
                <input type="radio" name="rating1" value="1"><i></i>
                <input type="radio" name="rating1" value="2"><i></i>
                <input type="radio" name="rating1" value="3"><i></i>
                <input type="radio" name="rating1" value="4"><i></i>
                <input type="radio" name="rating1" value="5"><i></i>
            </span>

            <div class="clear"></div>
            <hr class="survey-hr">
            <button type="submit" name="submit" class="btn btn-success btn">Submit your review</button>
        </form>
    </div>
    <!--<form method="POST">
        <p>Do you want to complete the running post?</p>
        <a class="btn btn-success" href="customer_profile.php" role="button">NO</a>
        <button type="submit" name="submit" class="btn btn-danger">YES</button>
    </form>-->
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>