<?php
include('./functions/userfunctions.php');
// session_start();
include('./includes/header.php');

$search = '';
$min = 0;
$max = 50;
if (!empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (!empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
}
if (!empty($_POST['search'])) {
    $search = $_POST['search'];
}

    if (isset($_GET['min']) && isset($_GET['max'])) {

        $min = $_GET['min'];
        $max = $_GET['max'];
    } 
    if (isset ($_GET['result'])) {
        $search = $_GET['result'];
    }



// if (isset($_GET['page'])) {
//     $search = $_GET['result'];
// }

?>

<div class="container-fluid">
    <div class="row">
        <div class="shop-header px-0">
            <img class="img-fluid" style="background-size: cover;" src="https://demo2.pavothemes.com/freshio/wp-content/uploads/2020/08/breadcrumb_woo.jpg" alt="">
            <h2 class="mb-3 fw-bold">Shop</h2>
        </div>
        <div class="py-3 px-5" style="background-color: #76A713;">
            <h6><a href="index.php" class="text-white">Home /</a> <a href="shop.php" class="text-white">Shop</a> </h6>
        </div>
    </div>
</div>

<!-- <div class="py-5"> -->
<div class="container-fuild mx-5">
    <div class="overlay d-none"></div>
    <div class="row">
        <div class="py-5"></div>
        <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="shop-sidebar mb-3">
                <div class="filter-price mb-4">
                    <h4 class="mb-4">SHop by Price</h4>
                    <div class="form-price-range-filter">
                        <form method="POST" action="shop.php">
                            <div class="filter-area mb-3 d-block text-center">

                                <div id="slider-range"></div>
                                <br>
                                <div class="d-flex align-items-center justify-content-around">
                                    <label for="min">From</label>
                                    <input type="" id="min" name="min_price" value="<?php echo $min; ?>">

                                    <label for="max">To</label>
                                    <input type="" id="max" name="max_price" value="<?php echo $max; ?>">
                                    <span class="">($)</span>
                                </div>

                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit_range" value="Filter Product" class="btn-submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="filter-category">
                    <h4 class="mb-3">Shop by Category</h4>
                    <ul>
                        <li>
                            <a href="shop.php">
                                All products
                            </a>
                            <span class="float-end">(<?php $products = getAllActive("products");
                                                        echo mysqli_num_rows($products) ?>)</span>
                        </li>

                        <?php
                        $categories = getAllActive("categories");
                        if (mysqli_num_rows($categories) > 0) {
                            foreach ($categories as $item) {
                        ?>
                                <li>
                                    <a href="shop.php?category=<?= $item['slug'] ?>">

                                        <?= $item['name'] ?>
                                    </a>
                                    <span class="float-end">(<?php $products = getProByCategory($item['id']);
                                                                echo mysqli_num_rows($products) ?>)</span>
                                </li>
                        <?php
                            }
                        } else {
                            echo "No data found";
                        }
                        ?>
                    </ul>
                </div>
                <!-- <div class="filter-status">
                    <h4 class="mb-3">STATUS</h4>
                </div> -->
            </div>

        </div>

        <div class="col-lg-9 col-md-12 col-sm-12 px-5" id="data">
            <!-- <hr> -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form class="d-flex mb-3" method="POST" action="shop.php">
                        <input class="form-control me-2" name="search" value="<?php echo isset($_POST['search']) ? $search : ''; ?>" required type="text" placeholder="Search for products..." aria-label="Search">
                        <button class="btn btn-outline-success" name="search-submit" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">

                <?php

                if (isset($_GET['category'])) {
                    $category_slug = $_GET['category'];
                    $category_data = getByslugActive('categories', $category_slug);
                    $category = mysqli_fetch_array($category_data);
                    if ($category) {
                        $cid = $category['id'];
                ?>

                        <div class="col-md-12">
                            <p class="result float-end">Showing <?php $products = getPagnigationByCategory($cid, $min, $max);
                                                                echo mysqli_num_rows($products) ?> of <?php $products = getAllActive("products");
                                                                                                        echo mysqli_num_rows($products) ?> products</p>
                        </div>

                    <?php }
                } else if (isset($_POST['submit_range']) || isset($_GET['min'])) {
                    ?>
                    <?php if (isset($_GET['category'])) {
                         $category_slug = $_GET['category'];
                         $category_data = getByslugActive('categories', $category_slug);
                         $category = mysqli_fetch_array($category_data);
                    } ?>
                    <div class="col-md-12">
                        <p class="result float-end">Showing <?php $query = "SELECT * FROM products where selling_price BETWEEN '$min' AND '$max'  ";
                                                            $products = mysqli_query($con, $query);
                                                            echo mysqli_num_rows($products) ?> of <?php $products = getAllActive("products");
                                                                                                    echo mysqli_num_rows($products) ?> products</p>
                    </div>
                <?php
                } else if (isset($_POST['search-submit']) || isset($_GET['result'])) { ?>
                    <div class="col-md-12">
                        <p class="result float-end">Showing <?php
                                                            $query = "SELECT * FROM products where name LIKE '%$search%'";
                                                            $products = mysqli_query($con, $query);

                                                            echo mysqli_num_rows($products) ?> of <?php $products = getAllActive("products");
                                                                                                    echo mysqli_num_rows($products) ?> products</p>
                    </div>
                <?php
                } else { ?>

                    <div class="col-md-12">
                        <p class="result float-end">All product (<?php $products = getAllActive("products");
                                                                    echo mysqli_num_rows($products) ?>)</p>
                    </div>

                <?php }

                ?>
            </div>
            <div class="row justify-content-center">

                <?php if (isset($_GET['category'])) {
                    $category_slug = $_GET['category'];
                    $category_data = getByslugActive('categories', $category_slug);
                    $category = mysqli_fetch_array($category_data);
                    if ($category) {
                        $cid = $category['id'];
                ?>
                        <?php
                        $products = isset($_POST['submit_range']) ? getPagnigationByCategory($cid, $min, $max) : getprodByCategory($cid);
                        // $products = getPagnigationByCategory($cid);
                        if (mysqli_num_rows($products) > 0) {
                            foreach ($products as $item) {
                        ?>

                                <div class="col-md-3 col-sm-6 mt-2">

                                    <div class="quick-view_area">

                                        <div class="quick-view <?= $item['slug'] ?> d-none px-0">
                                            <div class="bg-light py-4">
                                                <div class="container product_data mt-3">
                                                    <div class="row float-end">
                                                        <div class="col-md-12">
                                                            <button class="fa fa-close"></button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="shadow"><img src="uploads/<?= $item['image'] ?>" alt="product Image" class="w-100"></div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4 class="fw-bold"><?= $item['name'] ?>
                                                                <span class="fload-end text-danger"><?php if ($item['trending']) {
                                                                                                        echo "trending";
                                                                                                    }  ?></span>
                                                            </h4>
                                                            <div class="border my-3"></div>
                                                            <p class="mb-3"><?= $item['small_description'] ?></p>
                                                            <div class="row mb-4">
                                                                <div class="col-md-1  fs-3" style="color: #76A713;">$<span style="color: #76A713;" class="mr-2"><?= $item['selling_price'] ?></span></div>
                                                                <?php
                                                                if ($item['original_price'] == 0) {
                                                                    echo "";
                                                                ?>
                                                                <?php
                                                                } else {
                                                                ?>

                                                                    <div class="col-md-1 fs-3 px-4"><del><span style="color: #333;">$<?= $item['original_price'] ?></span></div>
                                                                <?php
                                                                }
                                                                ?>


                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="input-group mb-3" style="width: 130px;">
                                                                        <button class="input-group-text decrement-btn ">-</button>
                                                                        <input type="text" class="form-control text-center qty-input bg-white" value="1">
                                                                        <button class="input-group-text increment-btn ">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-4">
                                                                    <button class=" px-4 addToCartBtn" value="<?= $item['id'] ?>"><i class="fa fa-shopping-cart " aria-hidden="true"></i>Add to cart</button>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <button class="btn-buy buyBtn px-4" value="<?= $item['id'] ?>">Buy now</button>
                                                                </div>
                                                            </div>
                                                            <div class="border my-4"></div>
                                                            <p><?= $item['big_description'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
 
                                    <a href="product-view.php?product=<?= $item['slug'] ?>">

                                        <div class="product-item product_data ">
                                            <div class="product_label">
                                                <?php
                                                $ngay_them_moi = strtotime($item['created_at']);
                                                $ngay_hien_tai = strtotime("now");
    
                                                $so_ngay_moi = 7; // Định nghĩa số ngày mà bạn muốn coi sản phẩm là mới
    
                                                if (($ngay_hien_tai - $ngay_them_moi) / (60 * 60 * 24) <= $so_ngay_moi) { ?>
                                                    <span class=" new mx-1">New</span>
                                                <?php
                                                    // Thêm label cho sản phẩm mới   
                                                }
                                                if ($item['original_price'] != 0) { ?>
                                                    <span class=" sale">Sale -<?php echo 100 - round(($item['selling_price'] /  $item['original_price']) * 100)   ?>%</span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="product-img">
                                                <img src="uploads/<?= $item['image'] ?>" alt="Product Image" class="w-100">
                                                <div class="product-actions text-center">
                                                    <button type="button" class="fa fa-cart-plus addToCartBtn" value="<?= $item['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"></button>
                                                    <?php

                                                    ?>
                                                    <button type="button" data-target="<?= $item['slug'] ?>" class="fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view" value="<?= $item['id'] ?>"></button>


                                                </div>
                                            </div>
                                            <div class="product-infor ">
                                                <div><a href="" class="fs-5 "><?= $item['name'] ?> </a></div>
                                                <div class="fs-5 text-left d-flex justify-content-between mb-3">
                                                    <div>$<?= $item['selling_price'] ?></div>
                                                    <?php
                                                    $prod_id = $item["id"];
                                                    $reviews_query = "SELECT * FROM reviews where product_id = '$prod_id'";
                                                    $review_query_run = mysqli_query($con, $reviews_query);
                                                    if (mysqli_num_rows($review_query_run) > 0) {
                                                        $total = 0;
                                                        foreach ($review_query_run as $review) {
                                                            $total += $review['rating'];
                                                        }
                                                    ?>
                                                        <div class="rating-result"><span><?= round($total / mysqli_num_rows($review_query_run), 1) ?></span><span><i class="fa fa-star"></i></span></div>
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <div class="rating-result"><span>0</span><span><i class="fa fa-star"></i></span></div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="input-group mb-3" style="width: 130px;">
                                                    <button class="input-group-text decrement-btn ">-</button>
                                                    <input type="text" class="form-control text-center qty-input bg-white" value="1">
                                                    <button class="input-group-text increment-btn ">+</button>
                                                </div>
                                                <button class="btn-buy" value="<?= $item['id'] ?>">BUY NOW</button>

                                            </div>

                                        </div>
                                    </a>
                                </div>

                        <?php
                            }
                        } else {
                            echo "No data found";
                        }
                        ?>
                        <?php
                    } else {
                        echo  "Something went wrong";
                    }
                } else {

                    $products = getFilterPrice($min, $max, $search);


                    if (mysqli_num_rows($products) > 0) {
                        foreach ($products as $item) {
                        ?>

                            <div class="col-lg-3 col-md-6 col-sm-6 mt-2">

                                <div class="quick-view_area">

                                    <div class="quick-view <?= $item['slug'] ?> d-none px-0">
                                        <div class="bg-light py-4">
                                            <div class="container product_data mt-3">
                                                <div class="row float-end">
                                                    <div class="col-md-12">
                                                        <button class="fa fa-close"></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="shadow"><img src="uploads/<?= $item['image'] ?>" alt="product Image" class="w-100"></div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h4 class="fw-bold"><?= $item['name'] ?>
                                                            <span class="fload-end text-danger"><?php if ($item['trending']) {
                                                                                                    echo "trending";
                                                                                                }  ?></span>
                                                        </h4>
                                                        <div class="border my-3"></div>
                                                        <p class="mb-3"><?= $item['small_description'] ?></p>
                                                        <div class="row mb-4">
                                                            <div class="col-md-1  fs-3" style="color: #76A713;">$<span style="color: #76A713;" class="mr-2"><?= $item['selling_price'] ?></span></div>
                                                            <?php
                                                            if ($item['original_price'] == 0) {
                                                                echo "";
                                                            ?>
                                                            <?php
                                                            } else {
                                                            ?>

                                                                <div class="col-md-1 fs-3 px-4"><del><span style="color: #333;">$<?= $item['original_price'] ?></span></div>
                                                            <?php
                                                            }
                                                            ?>


                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="input-group mb-3" style="width: 130px;">
                                                                    <button class="input-group-text decrement-btn ">-</button>
                                                                    <input type="text" class="form-control text-center qty-input bg-white" value="1">
                                                                    <button class="input-group-text increment-btn ">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-4">
                                                                <button class=" px-4 addToCartBtn" value="<?= $item['id'] ?>"><i class="fa fa-shopping-cart " aria-hidden="true"></i>Add to cart</button>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button class="btn-buy buyBtn px-4" value="<?= $item['id'] ?>">Buy now</button>
                                                            </div>
                                                        </div>
                                                        <div class="border my-4"></div>
                                                        <p><?= $item['big_description'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="product-view.php?product=<?= $item['slug'] ?>">

                                    <div class="product-item product_data ">
                                        <div class="product_label">
                                            <?php
                                            $ngay_them_moi = strtotime($item['created_at']);
                                            $ngay_hien_tai = strtotime("now");
    
                                            $so_ngay_moi = 7; // Định nghĩa số ngày mà bạn muốn coi sản phẩm là mới
    
                                            if (($ngay_hien_tai - $ngay_them_moi) / (60 * 60 * 24) <= $so_ngay_moi) { ?>
                                                <span class=" new mx-1">New</span>
                                            <?php
                                                // Thêm label cho sản phẩm mới   
                                            }
                                            if ($item['original_price'] != 0) {
    
                                            ?>
                                                <span class=" sale">Sale -<?php echo 100 - round(($item['selling_price'] /  $item['original_price']) * 100)   ?>%</span>
                                            <?php
                                            }
                                            ?>
                                        </div>


                                        <div class="product-img">
                                            <img src="uploads/<?= $item['image'] ?>" alt="Product Image" class="w-100">
                                            <div class="product-actions text-center">
                                                <button type="button" class="fa fa-cart-plus addToCartBtn" value="<?= $item['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"></button>

                                                <button type="button" data-target="<?= $item['slug'] ?>" class="fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view" value="<?= $item['id'] ?>"></button>


                                            </div>
                                        </div>
                                        <div class="product-infor ">
                                            <div><a href="" class="fs-5 "><?= $item['name'] ?> </a></div>
                                            <div class="fs-5 text-left d-flex justify-content-between mb-3">
                                                <div>$<?= $item['selling_price'] ?></div>
                                                <?php
                                                $prod_id = $item["id"];
                                                $reviews_query = "SELECT * FROM reviews where product_id = '$prod_id'";
                                                $review_query_run = mysqli_query($con, $reviews_query);
                                                if (mysqli_num_rows($review_query_run) > 0) {
                                                    $total = 0;
                                                    foreach ($review_query_run as $review) {
                                                        $total += $review['rating'];
                                                    }
                                                ?>
                                                    <div class="rating-result"><span><?= round($total / mysqli_num_rows($review_query_run), 1) ?></span><span><i class="fa fa-star"></i></span></div>
                                                <?php

                                                } else {
                                                ?>
                                                    <div class="rating-result"><span>0</span><span><i class="fa fa-star"></i></span></div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="input-group mb-3" style="width: 130px;">
                                                <button class="input-group-text decrement-btn ">-</button>
                                                <input type="text" class="form-control text-center qty-input bg-white" value="1">
                                                <button class="input-group-text increment-btn ">+</button>
                                            </div>
                                            <button class="btn-buy" value="<?= $item['id'] ?>">BUY NOW</button>

                                        </div>

                                    </div>
                                </a>
                            </div>
                <?php     }
                    } else {
                        echo "No data found";
                    }
                }
                ?>

                <?php if (!isset($_GET['category'])) {
                    
                    clickPagnigation($min, $max, $search);
                } ?>
            </div>

        </div>

    </div>
</div>
<!-- </div> -->


<?php include('./includes/footer.php') ?>