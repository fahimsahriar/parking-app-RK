<?php 
    require 'C:\xampp\htdocs\Dhaka-Parking\header.php';
    if (!isset($_SESSION['isLogin'])) {
        header('location: login.php');
        die();
    }
    if ($_SESSION['ROLE'] == '2') {
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

    $sql2 = "SELECT * FROM bookings JOIN user_detail on bookings.renter = user_detail.username  WHERE user_detail.username='$username' AND bookings.complete='2' ORDER BY date DESC";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);

    $sql3 = "SELECT * FROM bookings JOIN user_detail ON bookings.renter = user_detail.username WHERE renter='$username' AND bookings.complete<'2' ORDER BY date DESC";
    $result3 = $conn->query($sql3);
    $count3 = mysqli_num_rows($result3);
?>
<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $customer_name ?></h4>
                                <p class="text-secondary mb-1"><?php print ($row1['role1'] == 1) ? 'Parking Owner' : 'Car Owner' ?></p>
                                <p class="text-muted font-size-sm">Completed Booking: <?php echo $count2 ?></p>
                                <p>Rating: <?php echo $row1['rating'] ?><i class="fa fa-star"></i></p>
                                <hr>
                                <p class="text-muted font-size-sm">Email: fip@jukmuh.al</p>
                                <p class="text-muted font-size-sm">Phone: <?php echo $row1['phone'] ?></p>
                                <p class="text-muted font-size-sm">Address: <?php echo $row1['address'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card" style="margin-bottom: 10px ;">
                    <div class="card-cody m-3">
                        <h5 style='font-weight:300;text-decoration:underline'>Running Rent</h5>
                        <?php if ($count3 > 0) { ?>
                            <?php while ($row2 = $result3->fetch_assoc()) { ?>
                                <div class="" style="background:#dec780;padding:20px; margin-bottom:15px;">
                                    <h5 style='font-weight:500;'><a style="color:#000;" href="booking-detail.php?id=<?php echo $row2['id'] ?> ">bk-id-<?php echo $row2['id'] ?></a></h5>
                                    <p class="">Location: <?php echo $row2['location'] ?> | Car: <?php echo $row2['space'] ?></p>

                                    <hr class="my-4">
                                    <p class="">Date: <?php echo $row2['date'] ?></p>
                                    <?php if ($row2['complete']==1) { ?>
                                    <p class="">
                                        <a class="btn btn-success btn" href="complete.php?id=<?php echo $row2['id'] ?>&step=2" role="button">Marked as complete</a>
                                    </p>
                                    <?php }?>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h5 class="">No Running Rent</h5>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card mt-10">
                    <div class="card-cody m-3 mt-0">
                        <h5 style='font-weight:300;text-decoration:underline'>Completed Bookings </h5>
                        <?php if ($count2 > 0) { ?>
                            <?php while ($row = $result2->fetch_assoc()) { ?>
                                <div class="" style="background:#1e7e347d;padding:20px; margin-bottom:15px;color:#000;">
                                    <h5 style='font-weight:500;'><a style="color:#000;" href="booking-detail.php?id=<?php echo $row['id'] ?>">bk-id-<?php echo $row['id'] ?></a></h5>
                                    <p class="">Location: <?php echo $row['location'] ?> | Car: <?php echo $row['space'] ?></p>
                                    <hr class="">
                                    <p class="">Date: <?php echo $row['date'] ?></p>
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
                </div>
            </div>
        </div>
        
    </div>
</div>
<style>
    body {
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
</style>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>