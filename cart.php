<?php
// session_start();
include('./functions/userfunctions.php');
include('./includes/header.php');
include('./authentication.php');
?>
<div class="py-3 bg-success px-5">
    <h6><a href="index.php" class="text-white">Home /</a> <a href="cart.php" class="text-white">Cart</a> </h6>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow"><div class="row">
            <div class="col-md-12">
                
                <div id="cart">
                    <?php
                    $items = getCartItems();
                    // echo mysqli_num_rows($items);
                    
                    if (mysqli_num_rows($items) >0) { ?>
                    <div class="row align-items-center cart-header">
                    <div class="col-md-2">
                        <h6>Product</h6>
                    </div>
                    <div class="col-md-3">
                        <h6>Name</h6>
                    </div>
                    <div class="col-md-2"><h6>Price</h6></div>
                    <div class="col-md-3"><h6>Quantity</h6></div>
                    <div class="col-md-2"><h6>Remove</h6></div>
                </div>
                <div class="row cart-title">
                    <h4>Your cart</h4>
                </div>
                <hr> <?php  
                        
                    foreach ($items as $citem) { ?>
                        <div class="row product_data align-items-center py-3 md-row ">
                            <div class="col-md-2 ">
                                <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                            </div>
                            <div class="col-md-3">
                                <h5><?= $citem['name'] ?></h5>
                            </div>
                            <div class="col-md-2">
                            <h5>$<?= $citem['selling_price'] ?></h5>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                <div class="input-group " style="width: 130px;">
                                    <button class="input-group-text decrement-btn updateQty">-</button>
                                    <input type="text" class="form-control text-center qty-input bg-white" value="<?= $citem['prod_qty'] ?>">
                                    <button class="input-group-text increment-btn updateQty">+</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger deleteItem" value="<?= $citem['cid']?>"> <i class="fa fa-trash" style="margin-right: 5px; color:#fff" ></i> Remove</button>
                            </div>
                        </div>

                        <!-- Responsive -->
                        <div class="xs-row ">
                            <div class="d-flex align-items-center ">
                                <div class="">
                                <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="150px">
                                </div>
                                <div class="">
                                <h5 class="mb-2" style="font-size: 18px;"><?= $citem['name'] ?></h5>
                                <h5 class="mb-2">$<?= $citem['selling_price'] ?></h5>
                                <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                    <div class="input-group mb-4 " style="width: 130px;">
                                        <button class="input-group-text decrement-btn updateQty">-</button>
                                        <input type="text" class="form-control text-center qty-input bg-white" value="<?= $citem['prod_qty'] ?>">
                                        <button class="input-group-text increment-btn updateQty">+</button>
                                    </div>
                                    <button class="btn btn-danger deleteItem" value="<?= $citem['cid']?>"> <i class="fa fa-trash" style="margin-right: 5px; color:#fff" ></i> Remove</button>
                                </div>
                             
                            </div>
                        </div>
                        <hr>
                    <?php
                    } ?> <div class="float-end">
                    <a href="checkout.php" style="background-color: #76A713;border-color:#76A713 ;" class="btn btn-success">Check Out</a>
                </div> <?php                     
                }
                else {
                    ?> 
                        <h3 style="color: #76A713;" class="text-center fw-bold">Your cart is empty!</h3>
                    <?php 

                }
                    ?>
                </div>
                

            </div>
        </div></div>
        
    </div>
</div>

<?php include('./includes/footer.php') ?>