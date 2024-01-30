<?php
// session_start();
include('./functions/userfunctions.php');
include('./includes/header.php');
include('./authentication.php');
?>
<div class="py-3 bg-success px-5">
    <h6><a href="index.php" class="text-white">Home /</a> <a href="my-orders.php" class="text-white">My Orders</a> </h6>
</div>
<div class="py-3"></div>
<div class="container">
    <?php if (isset($_SESSION['auth'])) { ?>
        <h1 class="text-center mb-5">Welcome <span style="color: #76A713;"><?= $_SESSION['auth_user']['name'] ?> ! </span> <span><i class="fa fa-heart" style="color: #ff4f4f;" aria-hidden="true"></i></span></h1>
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="mb-3">My Account</h2>
                    <ul>
                        <li><a href="cart.php">View Cart (<span><?php
                                                                $items = getCartItems();
                                                                echo mysqli_num_rows($items);
                                                                ?></span>)</a></li>
                        <li><a href="">Change password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
               
                    
                </div>
                <div class="col-md-4">
                    <h2 class="mb-3">Account Details</h2>
                    <p>Phone: <?= $_SESSION['auth_user']['phone'] ?></p>
                    <p>Email: <?= $_SESSION['auth_user']['email'] ?></p>
                </div>
            </div>
        </div>
</div>
<?php } ?>

</div>
<div class="py-5">
    <div class="container">
        <h2 class="mb-3">Order History</h2>
        <hr>
        <div class="table-orders">
            <div class="card card-body shadow">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>

                                    <th>STT</th>
                                    <th>Tracking No</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $orders = getOrders();
                                if (mysqli_num_rows($orders) > 0) {
                                    $stt = 1;
                                    foreach ($orders as $item) {
                                ?>
                                        <tr>

                                            <td><?php echo $stt++; ?></td>

                                            <td><?= $item['tracking_no'] ?></td>
                                            <td class="fw-bold">$<?= $item['total_price'] ?></td>
                                            <td><?= $item['created_at'] ?></td>
                                            <td>
                                                <a href="view-order.php?t=<?= $item['tracking_no'] ?>" class="btn-view-details">View</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                   
                                    ?>
                                    <tr>
                                        <td colspan="5">No Orders Yet!</td>

                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('./includes/footer.php') ?>