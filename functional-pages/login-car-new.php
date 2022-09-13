<?php require 'C:\xampp\htdocs\Dhaka-Parking\header-new.php'; ?>
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

<div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-gray-800 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold text-white leading-tight tracking-tight text-gray-200md:text-2xl">
                Car Owner Sign In
            </h1>
            <form method="post" class="space-y-4 md:space-y-6" action="login-car-new.php">
                <div>
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-200">Your
                        username</label>
                    <input type="text" name="username" class="bg-gray-700 text-gray-200sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="" />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-200">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-700 text-gray-200sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="" />
                </div>
                <button type="submit" name="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                    in</button>
                <p style="color: red;"><?php echo "$error" ?></p>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Don’t have an account yet?
                    <a href="#" class="font-medium text-blue-600 hover:underline">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</div>

<div class="h-[240px]"></div>
<?php require 'C:\xampp\htdocs\Dhaka-Parking\footer-new.php'; ?>