<?php
    session_start();
    unset($_SESSION['ROLE']);
    unset($_SESSION['isLogin']); 
    header('location: login.php');
    die();
?>