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

    $mysqltime = date ('Y-m-d H:i:s', $row['date']);
    echo $mysqltime;

?>

<div class="container-fluid">

    <div class="container">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Booking #id-<?php echo $id ?></h2>
        </div>

        <!-- Main content -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3"><?php echo $row['date'] ?></span>
                                <span class="me-3">bk-id-<?php echo $id ?></span>
                                <span class="badge rounded-pill bg-info">
                                    <?php
                                        if($row['complete']!=2){
                                            ?>Status: Pending<?php
                                        }else{
                                            ?>Complete<?php
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
                                                <h6 class="small mb-0"><?php echo $row['space'] ?> car in <?php echo $row['location'] ?></h6>
                                                <span class="small">Duration: 4 hours</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td class="text-end">$79.99</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">VAT</td>
                                    <td class="text-end">$20.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Discount (Code: NEWYEAR)</td>
                                    <td class="text-danger text-end">-$10.00</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="2">TOTAL</td>
                                    <td class="text-end">$169,98</td>
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
                                <p>Visa -1234 <br>
                                    Total: $169,98 <span class="badge bg-success rounded-pill">PAID</span></p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Billing address</h3>
                                <address>
                                    <strong>John Doe</strong><br>
                                    1355 Market St, Suite 900<br>
                                    San Francisco, CA 94103<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
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
                            <strong>John Doe</strong><br>
                            1355 Market St, Suite 900<br>
                            San Francisco, CA 94103<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
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