<?php
    require '../header.php';
    if (!isset($_SESSION['isLogin'])) {
        header('location: login.php');
        die();
    }
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM bookings WHERE id = '$id'";
    $result1 = $conn->query($sql1);
    $row = $result1->fetch_assoc();

    //$raw_date = date ('Y-m-d H:i:s', $row['date']);
    $date1 = ( new DateTime($row['date']) )->format('d M Y');
    //echo $date1;

    $renter = $row['renter'];
    $sql2 = "SELECT * FROM user_detail WHERE username = '$renter'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    $customer = $row['customer'];
    $sql3 = "SELECT * FROM user_detail WHERE username = '$customer'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();


?>

<div class="container-fluid">

    <div class="container">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0" style="text-decoration: underline;"><a href="#" class="text-muted"></a> Booking #id-<?php echo $id ?></h2>
        </div>

        <!-- Main content -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3"><?php echo $date1 ?></span>
                                <span class="badge rounded-pill bg-info">
                                    <?php
                                        if(((int)$row['complete'])==2){
                                            ?>Complete<?php
                                        }else{
                                            ?>Status: Pending<?php
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex mb-2">
                                            <div class="flex-shrink-0 mr-5">
                                                <img src="https://via.placeholder.com/280x280/FF69B4/000000" alt="" width="35" class="img-fluid">
                                            </div>
                                            <div class="flex-lg-grow-1 ms-3">
                                                <h6 class="small mb-0">Location: <?php echo $row['location'] ?></h6>
                                                <span class="small">Duration: <?php echo $row['day'] ?> days, <?php echo $row['hour'] ?> hours</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $row['space'] ?> car</td>
                                    <td class="text-end"><?php echo $row['cost'] ?> tk</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">VAT</td>
                                    <td class="text-end">0.00 tk</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Discount</td>
                                    <td class="text-danger text-end">0 tk</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="2">TOTAL</td>
                                    <td class="text-end">BDT <?php echo $row['cost'] ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- Payment -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Payment Method</h3>
                                <p>BKash <br>
                                    Total: BDT <?php echo $row['cost'] ?> <span class="badge bg-success rounded-pill">PAID</span></p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Billing address</h3>
                                <address>
                                    <strong><?php echo $row3['fullName'] ?></strong><br>
                                    San Francisco, CA 94103<br>
                                    <abbr title="Phone">P:</abbr><?php echo $row3['phone'] ?>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <!-- Shipping information -->
                    <div class="card-body">
                        <h3 class="h6">Parking Owner Information</h3>
                        <hr>
                        <address>
                            <strong><?php echo $row2['fullName'] ?></strong><br>
                            San Francisco, CA 94103<br>
                            <abbr title="Phone">Phone: </abbr> <?php echo $row2['phone'] ?>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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

    .text-reset {
        --bs-text-opacity: 1;
        color: inherit !important;
    }

    a {
        color: #5465ff;
        text-decoration: none;
    }
</style>


<?php require '../footer.php'; ?>