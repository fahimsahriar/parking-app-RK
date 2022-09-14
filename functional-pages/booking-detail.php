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

    //parking owner information gethering
    $renter = $row['renter'];
    $sql2 = "SELECT * FROM user_detail WHERE username = '$renter'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    //car owner information gethering
    $customer = $row['customer'];
    $sql3 = "SELECT * FROM user_detail WHERE username = '$customer'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();

    //chatting related sql query
    $role = $_SESSION['ROLE'];
    if (isset($_POST['submit'])) {
        $message = $_POST['msg'];
        $sql4 = "INSERT INTO messages(booking_id,role,message) VALUES('$id','$role', '$message') ";
        $conn->query($sql4);
        //echo $message;
    }

    //chating history related query
    $sql5 = "SELECT * FROM messages WHERE booking_id = '$id'";
    $result4 = $conn->query($sql5);
    //$count = $result4->fetch_assoc();
    $count3 = mysqli_num_rows($result4);


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
                                            ?>Status: Booked<?php
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
                                    <?php echo $row3['address'] ?><br>
                                    <abbr title="Phone">Phone: </abbr><?php echo $row3['phone'] ?>
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
                            <?php echo $row2['address'] ?><br>
                            <abbr title="Phone">Phone: </abbr> <?php echo $row2['phone'] ?>
                        </address>
                    </div>
                </div>
                <div class="col-lg-4" id="mess-icon" style="display:none;">
                    <button class="btn" onclick="openForm()">Chat <i class='fas fa-comment-dots'></i></button>
                </div>
                <i class='fas fa-refresh' style="color:#000 ;"></i>
                <div class="chat-popup card mb-4 chat-part" id="myForm" >
                    <div><h4>Chat</h4></div>
                    <ul>
                        <?php 
                            if ($count3 > 0) {
                                while ($row4 = $result4->fetch_assoc()) {
                                    ?> 
                                <li>
                                    <div class="main-msg">
                                    <?php if ($row4['role'] == $role) { ?>
                                        <div class="ind-msg">
                                        <?php }else{ ?>
                                        <div class="ind-msg ind-right">
                                        <?php } ?>    
                                            <p><?php echo $row4['message'] ?></p> 
                                        </div>
                                    </div>
                                </li>
                                <?php
                                }
                            }
                        ?>
                    </ul>
                    <form method="post" action="booking-detail.php?id=<?php echo $id ?>" class="form-container">
                        <label for="msg"><b>Message</b></label>
                        <textarea placeholder="Type message.." name="msg" required></textarea>

                        <button type="submit" name ="submit" class="btn">Send</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>

<style>
    ul{
        list-style-type: none;
    }
    .chat-history{
        border: 1px solid black;
        position: relative;
    }
    .main-msg{
        width: 100%;
    }
    .ind-msg{
        width: 80%;
        background: #6c757d;
        color: white;
        padding: 7px;
        border-radius: 11px;
        margin: 8px 5px;
    }
    .ind-right{
        background: #136ebf;
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

    .text-reset {
        --bs-text-opacity: 1;
        color: inherit !important;
    }

    a {
        color: #5465ff;
        text-decoration: none;
    }


    .chat-part{box-sizing: border-box;}

    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
    }

    /* The popup chat - hidden by default */
    .form-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
    background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
    opacity: 1;
    }
</style>
<!--scripts for chatting--->
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("mess-icon").style.display = "none";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("mess-icon").style.display = "block";
    }
</script>
<?php require '../footer.php'; ?>