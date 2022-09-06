<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\db_connect.php'; ?>
<?php
$username = '';
$password = '';
$r = 0;
$error = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $fullName = $_POST['fullName'];
    $nid = $_POST['nid'];
    $Car_Name = $_POST['Car_Name'];
    $Model = $_POST['Model'];
    $Registration_NO = $_POST['Registration_NO'];
    $phone = $_POST['phone'];
    $r = 2;

    $sql2 = "SELECT * FROM user_detail WHERE username='$username'";
    $result = $conn->query($sql2);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $error = '* Already have an account using this username <a href="../functional-pages/login-car.php">Login</a>';
    } else {
        $sql = "INSERT INTO user_detail (username, pass,phone, role1, fullName, NID, Car_Name, Model, Registrations_NO ) VALUES ('$username', '$password','$phone' ,'$r', '$fullName', '$nid', '$Car_Name', '$Model',   '$Registration_NO')";
        $conn->query($sql);
        $error = 'Account created succesfully <a href="../functional-pages/login-car.php">Login</a>';
    }
}
?>
<div class="container" style="margin-top: 30px;margin-bottom: 30px;">
    <form method="POST" class="border p-3 rounded shadow">
        <h2 style="text-align:center;margin-bottom:30px;">Sign Up as Car Owner</h2>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="username" name="username" class="form-control" id="inputEmail4" placeholder="Enter username">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Full Name</label>
                <input type="username" name="fullName" class="form-control" id="inputEmail4" placeholder="Full Name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Phone</label>
                <input type="number" name="phone" class="form-control" id="inputEmail4" placeholder="Phone Number">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">NID</label>
                <input type="number" name="nid" class="form-control" id="inputEmail4" placeholder="National Identity Number">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Car Name <small>(Not required for garage owner)</small></label>
                <input type="username" name="Car_Name" class="form-control" id="inputEmail4" placeholder="Car Name"">
            </div>
            <div class=" form-group col-md-6">
                <label for="inputEmail4">Model <small>(Not required for garage owner)</small></label>
                <input type="text" name="Model" class="form-control" id="inputEmail4" placeholder="Car Model">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Registration Number of Car <small>(Not required for garage owner)</small></label>
                <input type="text" name="Registration_NO" class="form-control" id="inputEmail4" placeholder="Car Registration Number">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" name="pass" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <p style="color: red;"><?php echo "$error" ?></p>
        <button type="submit" class="btn btn-success" name="submit">Sign Up</button>
    </form>
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>