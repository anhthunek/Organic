<?php
// session_start();
include('./functions/userfunctions.php');
include('./includes/header.php');
include('./authentication.php');
?>
<div class="py-3 bg-success px-5">
    <h6><a href="index.php" class="text-white">Home /</a> <a href="checkout.php" class="text-white">Check Out</a> </h6>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow" id="cart">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h2 class="mb-3">Order Details</h2>

                    <hr>

                    <?php
                    $items = getCartItems();
                    $totalPrice = 0;
                    foreach ($items as $citem) { ?>
                        <div class="">
                            <div class="row product_data align-items-center md-row  ">
                                <div class="col-md-2">
                                    <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px">
                                </div>
                                <div class="col-md-4">
                                    <h5><?= $citem['name'] ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <h5>x<?= $citem['prod_qty'] ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <h5>$<?= $citem['selling_price'] ?></h5>
                                </div>
                                <div class="col-md-2">
                                <button class="btn btn-danger deleteItem" value="<?= $citem['cid']?>"> <i class="fa fa-trash" style=" margin-right:0; color:#fff" ></i></button>
                            </div>


                            </div>
                        </div>


                        <div class="xs-row">
                            <div class="d-flex align-items-center jutify-content-between w-100">
                                <div class="mr-4">
                                    <div class=""><img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px"></div>
                                </div>
                                <!-- <div class=""> -->
                                        <div>
                                            <div><h5 style="font-size: 18px; "><?= $citem['name'] ?></h5></div>
                                     
                                        <div class="d-flex ml-auto ">
                                            <h5>$<?= $citem['selling_price'] ?></h5>
                                            <h5>x<?= $citem['prod_qty'] ?></h5>
                                        </div>
                                        </div>
                                    
                            </div>
                            <button class="btn btn-light deleteItem" value="<?= $citem['cid']?>"> <i class="fa fa-trash" style=" margin-right:0; color: #ff4f4f;font-size: 30px; " ></i></button>
                                
                        </div>
                        <div class="mb-2"></div>
                    <?php
                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                    }
                    ?>
                    <hr>
                    <h5 class="mt-4">Total: <span class="float-end fw-bold">$<?= $totalPrice ?></span></h5>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <h2 class="mb-3">Information</h2>
                    <hr>
                    <form action="functions/placeorder.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="fw-bold">Name</label>
                                <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="fw-bold">E-mail</label>
                                <input type="text" name="email" required placeholder="Enter your email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="fw-bold">Phone</label>
                                <input type="text" name="phone" required placeholder="Enter your phone number" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="fw-bold">Pin code</label>
                                <input type="text" name="pincode" required placeholder="Enter your pin code" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="fw-bold">Address</label>
                                <textarea name="address" required  class="form-control" rows="5"></textarea>
                            </div>
    
                        </div>
                        <div class="float-end">
                        <div class="col-md-12">
                            <!-- <input type="hidden" name="payment_mode" value="COD"> -->
                            <?php 
                                $query = "SELECT * from orders";

                            ?>
                            <select name="payment_method" id="" class="form-select mb-3" style="width: 200px; ">
                                            <option value="COD" >COD</option>
                                            <option value="Credit card" >Credit card</option>
                                            
                                        </select>
                          
                            <button <?php echo $totalPrice ==0  ? 'disabled' : '' ?> type="submit" name="placeOrderBtn" style="background-color: #76A713;border-color:#76A713 ;" class="btn btn-success float-end">Place Order</button>
                        </div>
                    </div>
                    </form>
                    
                </div>


            </div>

        </div>

    </div>
</div>

<?php include('./includes/footer.php') ?>