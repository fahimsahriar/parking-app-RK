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
$username = $_SESSION['username'];
$rating_sql = "SELECT rating FROM user_detail  WHERE username = '$username'";
$total_rating = $conn->query($rating_sql);
$total_rating_1 = $total_rating->fetch_assoc();
$total_rating_string = $total_rating_1['rating'];
$total_rating_int = (int)$total_rating_string;
//echo $total_rating_1['rating'];
if (isset($_POST['submit'])) {
    $rating = $_POST['rating1'];
    $total_rating_int  = ($rating + $total_rating_int)/2;
    if ($_SESSION['ROLE'] == '1') {
        $d_id = "garage_owner_profile.php";
        $sql = "UPDATE bookings SET complete = '$step',customer_review='$rating' WHERE id = '$id'";
    } else {
        $d_id = "customer_profile.php";
        $sql = "UPDATE bookings SET complete = '$step',renter_review='$rating' WHERE id = '$id'";
    }
    $sql_rating_update = "UPDATE user_detail SET rating = '$total_rating_int'  WHERE username = '$username'";
    $conn->query($sql_rating_update);
    $conn->query($sql);
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
    <div class="feedback" style="margin-top: 30px;">
        <h4>Rate and complete the booking</h4>
        <hr>
        <form method="post">
            <label>Your overall experience with the person ?</label><br>
            <span class="star-rating">
                <input type="radio" name="rating1" value="1"><i class="fa fa-star">1</i>
                <input type="radio" name="rating1" value="2"><i class="fa fa-star">2</i>
                <input type="radio" name="rating1" value="3"><i class="fa fa-star">3</i>
                <input type="radio" name="rating1" value="4"><i class="fa fa-star">4</i>
                <input type="radio" name="rating1" value="5"><i class="fa fa-star">5</i>
            </span>

            <div class="clear"></div>
            <hr class="survey-hr">
            <button type="submit" name="submit" class="btn btn-success btn">Submit Rating</button>
        </form>
    </div>
    <!--<form method="POST">
        <p>Do you want to complete the running post?</p>
        <a class="btn btn-success" href="customer_profile.php" role="button">NO</a>
        <button type="submit" name="submit" class="btn btn-danger">YES</button>
    </form>-->
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>