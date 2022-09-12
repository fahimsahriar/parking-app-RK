<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php
if (!isset($_SESSION['isLogin'])) {
    header('location: login.php');
    die();
}
if ($_SESSION['ROLE'] == '2') {
    header('location: logout.php');
    die();
}
?>
<?php
$location = '';
$space = '';
$username = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $space = $_POST['space'];

    $sql = "INSERT INTO active (location, space, username ) VALUES ('$location ', '$space','$username ')";
    $conn->query($sql);
    header('location: g-owner_page.php');
}
?>
<link rel="stylesheet" href="style_owner.css">
<div class="heading">
    <h2 style="text-align:center">Parking Owner Dashboard</h2>
</div>
<div class="container">
    <!-- running posts -->
    <h2 style="text-align:center;text-decoration:underline">Running Advertise</h2>
    <a class="show-btn" href="new-advertise.php">Create A New Advertise</a>
    <?php
    $sql2 = "SELECT user_detail.fullName, active.location, active.space,active.id FROM active JOIN user_detail ON user_detail.username=active.username WHERE active.username='$username' ORDER BY date DESC";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);
    ?>
    <?php if ($count2 > 0) { ?>
        <?php while ($row = $result2->fetch_assoc()) { ?>
            <div class="" style="background:#E9ECEF;padding:20px; margin-bottom:15px;">
                <h5 style='font-weight:500;'><a style="color:#000;" href="#">ad-id-<?php echo $row['id'] ?></a></h5>
                <p class="">Location: <?php echo $row['location'] ?> &nbsp; Space: <?php echo $row['space'] ?> car</p>

                <hr class="my-4">
                <p class="">
                    <a class="btn btn-success btn" href="edit.php?id=<?php echo $row['id'] ?>" role="button">Edit</a>
                    <a class="btn btn-danger btn" href="delete.php?id=<?php echo $row['id'] ?>" role="button">Delete</a>
                </p>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h5 class="">No Active Post</h5>
            </div>
        </div>
    <?php } ?>
    <!--Booked Post  -->
    <h2 style="text-align:center;text-decoration:underline">Running Rent</h2>
    <?php
    $sql2 = "SELECT * FROM bookings JOIN user_detail on bookings.renter = user_detail.username  WHERE user_detail.username='$username' AND bookings.complete<>'2'";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);
    ?>
    <?php if ($count2 > 0) { ?>
        <?php while ($row = $result2->fetch_assoc()) { ?>
            <div class="" style="background:#FFC947;padding:20px; margin-bottom:15px;color:#2C2E43;">

                <h5 style='font-weight:500;'><a style="color:#000;" href="booking-detail.php?id=<?php echo $row['id'] ?> ">bk-id-<?php echo $row['id'] ?></a></h5>
                <p class="">Location: <?php echo $row['location'] ?> &nbsp; Space: <?php echo $row['space'] ?> car</p>

                <hr class="my-4">
                <p><i class="fa fa-user"></i> <?php echo $row['renter'] ?> <i class="ml-5 fa fa-phone"></i> <?php echo $row['number'] ?> </p>
                <p class="">Date: <?php echo $row['date'] ?></p>

                <hr class="my-4">
                <?php if ($row['complete'] == 1) { ?>
                    <a class="btn btn-success btn" href="complete.php?id=<?php echo $row['id']?>&step=2" role="button">Marked as complete</a>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h5 class="">No Active Post</h5>
            </div>
        </div>
    <?php } ?>
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>