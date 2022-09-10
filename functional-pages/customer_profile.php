<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php
if (!isset($_SESSION['isLogin'])) {
    header('location: login.php');
    die();
}
if ($_SESSION['ROLE'] == '1') {
    header('location: logout.php');
    die();
}
?>
<link rel="stylesheet" href="style_user.css">

<?php
$sql1 = "SELECT * FROM user_detail WHERE fullName='$customer_name'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$customer_username = $row1['username'];
//echo $customer_username ;

$sql2 = "SELECT * FROM bookings WHERE customer='$customer_username' AND complete='1' ORDER BY date DESC";
$result2 = $conn->query($sql2);
$count2 = mysqli_num_rows($result2);

$sql3 = "SELECT * FROM bookings JOIN user_detail ON bookings.customer = user_detail.username WHERE customer='$customer_username' AND complete='0' ORDER BY date DESC";
$result3 = $conn->query($sql3);
$count3 = mysqli_num_rows($result3);
?>
<div class="container">
    <div>
        <h4 style='font-weight:300'>Full Name: <?php echo $customer_name ?></h4>
        <p>Total Bookings : <?php echo $count2 ?> </p>
        <p>Car Name : <?php echo $row1['Car_Name'] ?> </p>
        <p>Model : <?php echo $row1['Model'] ?> </p>
        <p>Registration NO : <?php echo $row1['Registrations_NO'] ?> </p>
        <p>NID : <?php echo $row1['NID'] ?> </p>
        <hr>
    </div>
    <!-- Running Rent -->
    <div>
        <h3 style='font-weight:300;text-decoration:underline'>Running Rent</h3>
        <?php if ($count3 > 0) { ?>
            <?php while ($row2 = $result3->fetch_assoc()) { ?>
                <div class="" style="background:#dec780;padding:20px; margin-bottom:15px;">
                    <h5 style='font-weight:500;'><a style="color:#000;" href="booking-detail.php?id=<?php echo $row2['id'] ?> " >bk-id-<?php echo $row2['id'] ?></a></h5>
                    <p class="">Location: <?php echo $row2['location'] ?> | Car: <?php echo $row2['space'] ?></p>

                    <hr class="my-4">
                    <p><i class="fa fa-user"></i> <?php echo $row2['renter'] ?> <i class="ml-5 fa fa-phone"></i> <?php echo $row2['number'] ?> </p>
                    <p class="">Date: <?php echo $row2['date'] ?></p>
                    <p class="">
                        <a class="btn btn-success btn" href="complete.php?id=<?php echo $row2['id'] ?>&step=1" role="button">Marked as complete</a>
                    </p>
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
    <!-- Completed Bookings -->
    <div class="">
        <h3 style='font-weight:300;text-decoration:underline'>Completed Bookings</h3>  
            <?php if ($count2 > 0) { ?>
                <?php while ($row = $result2->fetch_assoc()) { ?>
                    <div class="" style="background:#1e7e347d;padding:20px; margin-bottom:15px;">
                        <h5 style='font-weight:500;'><a style="color:#000;" href="booking-detail.php?id=<?php echo $row['id'] ?> " >bk-id-<?php echo $row['id'] ?></a></h5>
                        <p class="">Location: <?php echo $row['location'] ?> | Car: <?php echo $row['space'] ?></p>
                        <hr class="my-4">
                        <p><i class="fa fa-user"></i> <?php echo $row['renter'] ?></p>
                        <p class="">Date: <?php echo $row['date'] ?></p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5 class="">Zero Bookings</h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <style>
        body {
            background: #eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
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
            border-radius: 1rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }

        .avatar-text {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: #000;
            color: #fff;
            font-weight: 700;
        }

        .avatar {
            width: 3rem;
            height: 3rem;
        }

        .rounded-3 {
            border-radius: 0.5rem !important;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }

        .me-4 {
            margin-right: 1.5rem !important;
        }
    </style>

    <?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>