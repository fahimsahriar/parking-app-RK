<?php require 'C:\xampp\htdocs\Dhaka-Parking\header.php'; ?>
<?php
$error = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_detail WHERE username='$username' and pass='$password'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['ROLE'] = $row['role1'];
        $_SESSION['isLogin'] = 'yes';
        $_SESSION['username'] = $row['username'];
        if ($row['role1'] == 2) {
            header('location: car-user_page.php');
            die();
        } else if ($row['role1'] == 1) {
            header('location: g-owner_page.php');
            die();
        }
    } else {
        $error = 'Wrong username and password';
    }
}
?>
<div class="container justify-content-center" style="margin-top: 3%;margin-bottom:100px">
    <form method="post" class="border p-3 rounded shadow">
        <h2 style="text-align:center">Car Owner Sign In</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="username" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-success" name="submit">Login</button>
        <p><?php echo "$error" ?></p>
        <p><a href="../functional-pages/registration-car.php">Create New Account</a></p>
    </form>
</div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>