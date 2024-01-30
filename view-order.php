<?php
// session_start();
include('./functions/userfunctions.php');
include('./includes/header.php');
include('./authentication.php');

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $orderData = checkTrackingNoValid($tracking_no);
    if (mysqli_num_rows($orderData) <0) {
        ?>
        <h4>Something went wrong</h4>
     <?php 
     die();
    }
}
else {
    ?>
        <h4>Something went wrong</h4>
     <?php 
     die();
}
$data=mysqli_fetch_array($orderData);
?>
<div class="py-3 bg-success px-5">
    <h6><a href="index.php" class="text-white">Home /</a> 
    <a href="my-orders.php" class="text-white">My Orders</a>
    <a href="view-order.php" class="text-white">Order Details</a>
 </h6>
</div>
<div class="py-3"></div>



</div>
<div class="py-5">
    <div class="container">
        <div class="mb-3 d-flex align-items-center justify-content-between"><h4>View Orders</h4>  <a href="my-orders.php" class="btn btn-warning text-white  float-end">Back</a></div>
        <hr>
        <div class="table-orders">
            <div class="card card-body shadow">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                       
                        <div class="row">
                        <h4 class="mb-4">Delivery Details</h4>
                            <div class="col-md-12 mb-3">
                                <label for="">Name</label>
                                <div class="border p-1 ">
                                    <?= $data['name'] ?>
                                </div>
                                
                               
                                
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="">E-mail</label>
                                <div class="border p-1">
                                    <?= $data['email'] ?>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="">Phone</label>
                                <div class="border p-1">
                                    <?= $data['phone'] ?>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="">Tracking_no</label>
                                <div class="border p-1">
                                    <?= $data['tracking_no'] ?>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="">Address</label>
                                <div class="border p-1">
                                    <?= $data['address'] ?>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="">PIN code</label>
                                <div class="border p-1">
                                    <?= $data['pincode'] ?>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <h4 class="mb-3">Order Details</h4>
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="px-3">Product</th>
                                        <th>Price</th>
                                        <th class="">Quantity</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                    <?php 
                            $userId = $_SESSION['auth_user']['user_id'];
                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*,oi.qty as orderqty, p.* FROM orders o, order_items oi, products p where o.user_id = '$userId' and oi.order_id = o.id and p.id= oi.prod_id AND o.tracking_no = '$tracking_no'" ;

                                $order_query_run = mysqli_query($con, $order_query);
                                if (mysqli_num_rows($order_query_run) >0) {
                                    foreach ($order_query_run as $item) {
                                        ?> 
                                        <tr>
                                            <td><img style="width: 80px;" src="uploads/<?= $item['image'] ?>" alt="Product_img"></td>
                                            <td><?= $item['price'] ?></td>
                                            <td><?= $item['orderqty'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                                
                                </tbody>

                                
                                
                            </table>
                            <!-- <hr> -->
                                <h4 class="mb-2">Total: <span class="float-end">$ <?= $data['total_price'] ?></span></h4>
                                <div class="float-end fs-5 mb-2 ">
                                    <h4>Payment Method: <span class="float-end"><?= $data['payment_mode'] ?></span> </h4>
                                    
                                </div>
                                <h4 class="mb-2">Status: <span class="float-end">
                                    <?php 
                                        if ($data['status'] == 0) {
                                            echo "Under Process...";
                                        }
                                        else if ($data['status'] == 1) {
                                            echo "Completed";
                                        }
                                        else if ($data['status'] == 2) {
                                            echo "Cancelled";
                                        }
                                    ?>
                                </span></h4>
                        </div>        

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('./includes/footer.php') ?>