<?php require '../header.php'; ?>
<?php
    if(!isset($_SESSION['isLogin'])){
        header('location: login.php');
        die();
    }
    if($_SESSION['ROLE'] == '2'){
        header('location: logout.php');
        die(); 
    }
?>
<?php 
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $sql = "DELETE FROM active WHERE id = '$id'";
        $conn->query($sql);
        echo '<div style="text-align:center;padding:15px;"><p><i class="far fa-check-circle"></i> Successfully Deleted</p><a class="btn btn-success" href="g-owner_page.php" role="button">Back to Dashboard</a></div>';
        die();
    }    
?>
<div class="container" style="margin-bottom: 80px;">
    <h2 style="text-align:center">Delete Running Post</h2>
    <form method="POST">
        <p>Do you want to delete the running post?</p>
        <a class="btn btn-success" href="owner_page.php" role="button">NO</a>
        <button type="submit" name="submit" class="btn btn-danger">YES</button>
    </form>
</div>
