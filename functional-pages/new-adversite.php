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


<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer.php'; ?>