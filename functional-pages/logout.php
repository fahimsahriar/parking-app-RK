<?php
    session_start();
    if ($_SESSION['ROLE'] == 2) {
        unset($_SESSION['ROLE']);
        unset($_SESSION['isLogin']);
        header('location: login-car.php');
        die();
    } else if ($_SESSION['ROLE'] == 1) {
        unset($_SESSION['ROLE']);
        unset($_SESSION['isLogin']);
        header('location: login-parking.php');
        die();
    }
?>