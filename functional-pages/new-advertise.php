<?php require '../header.php'; ?>
<?php
    if (!isset($_SESSION['isLogin'])) {
        header('location: login.php');
        die();
    }
    if ($_SESSION['ROLE'] == '2') {
        header('location: logout.php');
        die();
    }
    $location = '';
    $space = '';
    $username = $_SESSION['username'];

    if (isset($_POST['submit'])) {
        $location = $_POST['location'];
        $space = $_POST['space'];

        $sql = "INSERT INTO active (location, space, username ) VALUES ('$location ', '$space','$username ')";
        $conn->query($sql);
        header('location: g-owner_page.php');
    }
?>

<div class="container">
    <!-- running posts -->
    <h2 style="text-align:center;text-decoration:underline">New Advertise</h2>
    <div class="new_post" id="hellp">
        <h3>Creating a new Post</h3>
        <form method="POST">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Location</label>
                <select class="form-control" name="location" id="exampleFormControlSelect1">
                    <option value="Notun Bazar">Notun Bazar</option>
                    <option value="Badda">Badda</option>
                    <option value="Gulsan">Gulsan</option>
                    <option value="Banani">Banani</option>
                    <option value="Uttara">Uttara</option>
                </select>
            </div>
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
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>