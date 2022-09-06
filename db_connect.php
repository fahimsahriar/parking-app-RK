<?php

$username = "root";
$password = "";
$servername = "localhost";
$dbname = "parking_db";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    
}


?>