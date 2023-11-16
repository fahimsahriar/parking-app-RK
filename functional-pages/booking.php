<?php require '../header.php'; ?>
<?php include_once '../db_connect.php';
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
if (isset($_POST['submit'])) {
    $b_space = $_POST['space'];
    $space = $space - $b_space;
    $day = $_POST['duration-day'];
    $hour = $_POST['duration-hour'];
    $total_cost = $space * (($day * 24 * 10) + ($hour * 10));

    if ($space <= 0) {
        $sql = "DELETE FROM `active` WHERE `active`.`id` = '$id'";
        $sql2 = "INSERT INTO bookings (location, space, customer, renter,day,hour,cost ) VALUES ('$location', '$b_space','$customer_username', '$renter_username','$day','$hour','$total_cost')";
    } else {
        $sql = "UPDATE active SET space = '$space' WHERE id = '$id'";
        $sql2 = "INSERT INTO bookings (location, space, customer, renter,day,hour,cost ) VALUES ('$location', '$b_space','$customer_username', '$renter_username','$day','$hour','$total_cost')";
    }
    $conn->query($sql);
    $conn->query($sql2);
    echo '<div style="text-align:center;padding:15px;"><p>Booking Request Send <i style="color:green" class="fa-lg far fa-check-circle"></i></p><a class="btn btn-success" href="car-booking-req.php" role="button">Check Booking Request Page</a></div>';
    die();
}
?>
<div class="container" style="margin-bottom: 80px;">
    <h3 style="padding:15px;text-align:center">Booking Form</h3>
    <hr class="w-30">
    <div class="row about-list">
        <div class="col-md-6">
            <div class="media">
                <label>Owner</label>
                <p><?php echo $g_name ?></p>
            </div>
            <div class="media">
                <label>Rate</label>
                <p>BDT 10 per hour</p>
            </div>
            <div class="media">
                <label>Location</label>
                <p><?php echo $location ?></p>
            </div>
        </div>
    </div>
    <hr>
    <form method="POST" class="">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Space</label>
            <select onchange="qf()" id="drop" class="form-control form-control-sm" name="space">
                <?php for ($i = 1; $i <= $space; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?> Car, 10x10 meter</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Duration</label>
            <input id="day" class="form-control" type="number" class="form-control" name="duration-day" placeholder="Days">
            <input min="1" max="5" id='hour' class="form-control mb-2" ype="number" class="form-control" name="duration-hour" placeholder="Hours">
            <p class="" id="current-price"><span id="day-c">0</span> days, <span id="hour-c">0</span> hours </p>
            <p>Total: <span id="pricew">0</span> Taka</p>
        </div>
        <div></div>
        <hr class="mt-2">
        <button type="submit" name="submit" class="form-group btn btn-success">Request A Booking</button>
    </form>
</div>

<style>
    .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
    }

    @media (max-width: 767px) {
        .about-text h3 {
            font-size: 35px;
        }
    }

    .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
    }

    @media (max-width: 767px) {
        .about-text h6 {
            font-size: 18px;
        }
    }

    .about-text p {
        font-size: 18px;
        max-width: 450px;
    }

    .about-text p mark {
        font-weight: 600;
        color: #20247b;
    }

    .about-list {
        padding-top: 10px;
    }

    .about-list .media {
        padding: 5px 0;
    }

    .about-list label {
        color: #20247b;
        font-weight: 600;
        width: 100px;
        margin: 0;
        margin-left: 0;
        position: relative;
    }

    .about-list label:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        right: 11px;
        width: 1px;
        height: 12px;
        background: #20247b;
        -moz-transform: rotate(15deg);
        -o-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
        margin: auto;
        opacity: 0.5;
    }

    .about-list p {
        margin: 0;
        font-size: 15px;
    }

    @media (max-width: 991px) {
        .about-avatar {
            margin-top: 30px;
        }
    }

    .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }

    .about-section .counter .count-data {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .about-section .counter .count {
        font-weight: 700;
        color: #20247b;
        margin: 0 0 5px;
    }

    .about-section .counter p {
        font-weight: 600;
        margin: 0;
    }
</style>
<?php require '../footer.php'; ?>

<script src="../js/booking.js"></script>