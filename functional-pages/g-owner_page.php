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
    <input type="checkbox" id="show">
    <label for="show" class="show-btn">Create A New Advertise</label>
    <div class="container new_post" id="hellp">
        <label for="show" class="close-button">Close</label>
        <h3>Creating a new Post</h3>
        <form method="POST">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Location</label>
                <select class="form-control" name="location" id="exampleFormControlSelect1">
                    <option value="Notun Bazar">Notun Bazar</option>
                    <option value="Badda">Badda</option>
                    <option value="Gulsan">Gulsan</option>
                    <option value="Banani">Banani</option>
                    <option value="Uttara">Uttara</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Empty space in your garage</label>
                <select class="form-control" name="space" id="exampleFormControlSelect1">
                    <option>1 car</option>
                    <option>2 car</option>
                    <option>3 car</option>
                    <option>4 car</option>
                    <option>5 car</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
    $sql2 = "SELECT user_detail.fullName, active.location, active.space,active.id FROM active JOIN user_detail ON user_detail.username=active.username WHERE active.username='$username' ORDER BY date DESC";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);
    ?>
    <?php if ($count2 > 0) { ?>
        <?php while ($row = $result2->fetch_assoc()) { ?>
            <div class="" style="background:#E9ECEF;padding:20px; margin-bottom:15px;">
                <h3 class="">Empty Space Available in <?php echo $row['location'] ?> </h3>
                <p class="">Car: <?php echo $row['space'] ?></p>
                <hr class="my-4">
                <p><i class="fa fa-user"></i> <?php echo $row['fullName'] ?></p>
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
                <h3 class="">Empty Space Rented in <?php echo $row['location'] ?> </h3>
                <p><i class="fa fa-user"></i> <?php echo $row['customer'] ?></p>
                <p><i class="fa fa-phone"></i> <?php echo $row['number'] ?></p>
                <hr class="my-4">
                <p class="">Space: <?php echo $row['space'] ?> Car</p>
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