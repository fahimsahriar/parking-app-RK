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
    $space='';
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $space = $_POST['space'];

        $sql = "UPDATE active SET space = '$space' WHERE id = '$id'";
        $conn->query($sql);
        // header('location: owner_page.php');
        echo '<div style="text-align:center;padding:15px;"><p><i class="far fa-check-circle"></i> Successfully Deleted</p><a class="btn btn-success" href="g-owner_page.php" role="button">Back to Dashboard</a></div>';
        die();
    }    
?>
<div class="container" style="margin-bottom: 80px;">
    <h2 style="text-align:center">Edit Running Post</h2>
    <form method="POST">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Empty space in your garage</label>
            <select class="form-control" name="space" id="exampleFormControlSelect1">
                <option>1 car</option>
                <option>2 car</option>
                <option>3 car</option>
                <option>4 car</option>
                <option>5 car</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
<?php require '../footer.php'; ?>
