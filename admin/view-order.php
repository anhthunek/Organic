<?php

// session_start();
include('../middleware/adminMiddleware.php');
include('./includes/header.php');
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

<div class="py-1">
    <div class="container">
        <div class="mb-3 d-flex align-items-center justify-content-between"> <a href="orders.php" class="btn btn-warning text-white  float-end">Back</a></div>
        
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
                           
                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*,oi.qty as orderqty, p.* FROM orders o, order_items oi, products p where oi.order_id = o.id and p.id= oi.prod_id AND o.tracking_no = '$tracking_no'" ;

                                $order_query_run = mysqli_query($con, $order_query);
                                if (mysqli_num_rows($order_query_run) >0) {
                                    foreach ($order_query_run as $item) {
                                        ?> 
                                        <tr>
                                            <td><img style="width: 80px;" src="../uploads/<?= $item['image'] ?>" alt="Product_img"></td>
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
                                <div class="">
                                    <h4 class="mb-2">Status: <span class="float-end">
                                    <form method="POST" action="code.php">
                                        <input type="hidden"  name="tracking_no" value="<?= $data['tracking_no'] ?>">
                                        <select name="order_status" id="" class="form-select mb-3" style="width: 200px; ">
                                            <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?>>Under process</option>
                                            <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?>>Completed</option>
                                            <option value="2" <?= $data['status'] == 2 ? 'selected' : '' ?>>Cancelled</option>
                                        </select>
                                        <button type="submit" name="update_order-btn" class="btn btn-success float-end">Update</button>
                                    </form>
                                        
                                        
                                        
                                       
                                    </span></h4>
                                </div>
                        </div>        

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('./includes/footer.php') ?>