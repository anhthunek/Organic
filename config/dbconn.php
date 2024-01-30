<?php

// Kết nối đến MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organic";

$con = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// mysqli_close($con);
?>