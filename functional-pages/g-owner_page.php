<?php
    require '../header.php';
    if (!isset($_SESSION['isLogin'])) {
        header('location: login.php');
        die();
    }
    if ($_SESSION['ROLE'] == '2') {
        header('location: logout.php');
        die();
    }
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
    $sql2 = "SELECT user_detail.fullName, active.location, active.space,active.id FROM active JOIN user_detail ON user_detail.username=active.username WHERE active.username='$username' ORDER BY date DESC";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);
    $sql2 = "SELECT * FROM bookings JOIN user_detail on bookings.renter = user_detail.username  WHERE user_detail.username='$username' AND bookings.complete<>'2'";
    $result3 = $conn->query($sql2);
    $count3 = mysqli_num_rows($result3);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />


<div class="container">
    <div class="container-xl px-4 mt-4">
        <h3 style="margin-top: 10px; display:inline-block">Dashboard</h3>
        <a style="float:right ;" class="btn btn-primary" href="new-advertise.php">Create A New Advertise</a>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <!-- Billing card 1-->
                <div class="card h-100 border-start-lg border-start-primary">
                    <div class="card-body">
                        <div class="text-muted h4"><?php echo $count2 ?> Running</div>
                        <div class="h3">Advertisement</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <!-- Billing card 2-->
                <div class="card h-100 border-start-lg border-start-secondary">
                    <div class="card-body">
                        <div class="text-muted h4"><?php echo $count3 ?> Running</div>
                        <div class="h3">Rent</div>
                        <a class="text-arrow-icon small text-secondary" href="./garage_owner_profile.php">
                            See Rents
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <!-- Billing card 3-->
                <div class="card h-100 border-start-lg border-start-success">
                    <div class="card-body">
                        <div class="text-muted h4">8 Booking</div>
                        <div class="h3 d-flex align-items-center">Request</div>
                        <a class="text-arrow-icon small text-secondary" href="./booking-request.php">
                            See Rents
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Billing history card-->
        <div class="card mb-4">
            <div class="card-header">Advertisement History</div>
            <div class="card-body p-0">
                <!-- Billing history table-->
                <div class="table-responsive table-billing-history">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-gray-200" scope="col">ID</th>
                                <th class="border-gray-200" scope="col">Location</th>
                                <th class="border-gray-200" scope="col">Space</th>
                                <th class="border-gray-200" scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($count2 > 0) { ?>
                            <?php while ($row = $result2->fetch_assoc()) { ?>
                            <tr>
                                <td>#ad-id-<?php echo $row['id'] ?></td>
                                <td> <?php echo $row['location'] ?></td>
                                <td><?php echo $row['space'] ?> car</td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        <a class="" href="edit.php?id=<?php echo $row['id'] ?>" role="button">Click to edit</a>  /
                                        <a style="color:red;" href="delete.php?id=<?php echo $row['id'] ?>" role="button">Delete</a>
                                    </span>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* body{   
        margin-top:20px;
        background-color:#f2f6fc;
        color:#69707a;
    } */
    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .fa-2x {
        font-size: 2em;
    }

    .table-billing-history th,
    .table-billing-history td {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        padding-left: 1.375rem;
        padding-right: 1.375rem;
    }

    .table> :not(caption)>*>*,
    .dataTable-table> :not(caption)>*>* {
        padding: 0.75rem 0.75rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }

    .border-start-primary {
        border-left-color: #0061f2 !important;
    }

    .border-start-secondary {
        border-left-color: #6900c7 !important;
    }

    .border-start-success {
        border-left-color: #00ac69 !important;
    }

    .border-start-lg {
        border-left-width: 0.25rem !important;
    }

    .h-100 {
        height: 100% !important;
    }
</style>
<?php require '../footer.php'; ?>