<?php 
    session_start();
    include ('../config/dbconn.php');
    function getAll ($table) {
        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);
    }
    function getById ($table, $id) {
        global $con;
        $query = "SELECT * FROM $table WHERE id = '$id'";
        return $query_run = mysqli_query($con, $query);
    }
    
    function redirect($url, $message) {
        $_SESSION['message'] = $message;
        header('Location: '.$url);
        exit(0);
    }
    function getAllOrders () {
        global $con;
        $query = "SELECT * FROM orders  where status = '0' ";
        return $query_run = mysqli_query($con, $query);
    }
    function checkTrackingNoValid ($trackingNo) {
        global $con;

        $query = "SELECT * FROM orders where tracking_no = '$trackingNo' ";
        return mysqli_query($con, $query);
    }
    function getOrderHistory () {
        global $con;

        $query = "SELECT * FROM orders where status != '0' ";
        return mysqli_query($con, $query);
    }
?>