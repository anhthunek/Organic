<?php
// session_start();
include('../middleware/adminMiddleware.php');
include('./includes/header.php');

?>




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
                                    <th>User</th>
                                    <th>Tracking No</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $orders = getOrderHistory();
                                if (mysqli_num_rows($orders) > 0) {
                                    $stt = 1;
                                    foreach ($orders as $item) {
                                ?>
                                        <tr>

                                            <td><?php echo $stt++; ?></td>
                                            <td><?php echo $item['name'] ?></td>
                                            <td><?= $item['tracking_no'] ?></td>
                                            <td class="fw-bold">$<?= $item['total_price'] ?></td>
                                            <td><?= $item['created_at'] ?></td>
                                            <td>
                                                <a href="view-order.php?t=<?= $item['tracking_no'] ?>" class="btn-view-details btn btn-success">View</a>
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