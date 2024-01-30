<?php
session_start();
include('config/dbconn.php');
function getReview($prod_id, $user_name, $rating, $comment)
{
    global $con;
    if (isset($_POST['send-submit'])) {
        $comment = mysqli_real_escape_string($con, $_POST['comment']);
        $query = "INSERT INTO reviews (product_id, user_name,rating, comment) VALUES ('$prod_id','$user_name','$rating','$comment')";
        $_SESSION['message'] = "Your comment saved successfully!";
    } else {
        echo "Please rate this";
    }
    $query_run = mysqli_query($con, $query);

    return $query_run;
}
function getFilterPrice($min, $max, $search)
{

    global $con;

    $records_per_page = 8;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $start_from = ($current_page - 1) * $records_per_page;
    if (!empty($search)) {
        $query = "SELECT * FROM products WHERE name LIKE '%$search%' AND status= '0'  LIMIT $start_from, $records_per_page ";
    } else {

        $query = "SELECT * from products where selling_price BETWEEN '$min' AND '$max' AND status= '0'  LIMIT $start_from, $records_per_page ";
    }
    $query_run = mysqli_query($con, $query);

    return $query_run;
}
function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status= '0'";
    return $query_run = mysqli_query($con, $query);
}
function getByslugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug = '$slug' AND status = '0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}
function getProByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id = '$category_id' AND status = '0' ";
    return $query_run = mysqli_query($con, $query);
}
function getPagnigationByCategory($category_id, $min, $max)
{
    global $con;
    $records_per_page = 12;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $start_from = ($current_page - 1) * $records_per_page;
    $sql = "SELECT * FROM products WHERE category_id = '$category_id' AND selling_price BETWEEN '$min' AND '$max' AND status= '0' LIMIT $start_from, $records_per_page";
    return $result = $con->query($sql);
}
function getprodByCategory($category_id)
{
    global $con;
    $records_per_page = 12;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $start_from = ($current_page - 1) * $records_per_page;

    $sql = "SELECT * FROM products WHERE category_id = '$category_id'  AND status= '0' LIMIT $start_from, $records_per_page";

    return $result = $con->query($sql);
}
function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id,c.prod_qty, p.id as pid, p.name,p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}
function getByIdActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id' AND status = '0'";
    return $query_run = mysqli_query($con, $query);
}

function clickPagnigation($min, $max, $search)
{
    global $con;
    $records_per_page = 8;

    if (empty($search)) {
        $sql = "SELECT COUNT(id) AS total FROM products where selling_price BETWEEN '$min' AND '$max'";
        $result = $con->query($sql);
        // mysqli_num_rows($result);
        $row = $result->fetch_assoc();
        $total_records = $row['total'];
        $total_pages = ceil($total_records / $records_per_page);

        echo "<div class='pagination justify-content-center mt-4'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($total_records < 9) {
                echo "";
            } else {
                echo "<a class='fs-5 pagination-a' href='?page=$i&min=$min&max=$max'>$i</a> ";
            }
        }
        echo "</div>";
    } else {
        // $search = $_POST['search'];
        $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
        $query_run = mysqli_query($con, $query);
        $total_records = mysqli_num_rows($query_run);
        $total_pages = ceil($total_records / $records_per_page);

        echo "<div class='pagination justify-content-center mt-4'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($total_records < 9) {
                echo "";
            } else {

                echo "<a class='fs-5 pagination-a' href='?page=$i&result=$search'>$i</a> ";
            }
        }
        echo "</div>";
    }
}
function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId'";
    return $query_run = mysqli_query($con, $query);
}
function checkTrackingNoValid($trackingNo)
{
    global $con;

    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders where tracking_no = '$trackingNo' AND user_id = '$userId'";
    return mysqli_query($con, $query);
}
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit(0);
}
