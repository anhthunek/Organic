<?php
// session_start();
include('./functions/userfunctions.php');
include('./includes/header.php')
?>

<!-- <div class="py-4"> -->
<div class="container">
    <div class="row">
        <div class=" col-md-12 col-xs-12">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php
                unset($_SESSION['message']);
            } ?>
            <!-- Slider main container -->
            <div class="swiper">
                <div class="swiper_1">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img src="assets/img/home_slide_1.jpg" alt="">
                            <div class="slide-content">
                                <p class="slide-content_sale">Exclusive offer <span>30% Off</span></p>
                                <h2 class="slide-content_title">STAY HOME & DELIVERED YOUR <span style="color: #76A713;">DAILY NEEDS</span></h2>
                                <p class="slide-content_desc">Vegetables contain many vitamins and minerals that are good for your health.</p>
                                <a href="shop.php" class="btn btn-danger slide-content_btn">SHOP NOW <i class="fa fa-arrow-right" style="color: #fff; padding-left: 10px;margin-right: 0;" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- <div class="swiper-slide"><img  src="assets/img/home_slide_1.jpg" alt=""></div> -->
                        <div class="swiper-slide"><img src="assets/img/home_slide_2.png" alt="">
                            <div class="slide-content">
                                <p class="slide-content_sale">ORGANIC</p>
                                <h2 class="slide-content_title">100% Fresh</h2>
                                <p class="slide-content_desc">Free shipping on all your order. We deliver you enjoy</p>
                                <a href="shop.php" class="btn btn-danger slide-content_btn">SHOP NOW <i class="fa fa-arrow-right" style="color: #fff; padding-left: 10px;margin-right: 0;" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="py-4"></div>
        <div class="col-md-12">
            <!-- <hr> -->

            <div class="swiper">
                <div class="swiper_3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="./assets/img/brand_1.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="./assets/img/brand_2.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="./assets/img/brand_3.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="./assets/img/brand_4.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="./assets/img/brand_5.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="./assets/img/brand_6.png" alt="">
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <!-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> -->
                </div>



            </div>
        </div>
        <!-- <div class="py-4"></div> -->
    </div>
    <div class="row">

        <div class="py-4"></div>
        <div class="col-md-12">
            <!-- <hr> -->
            <div class="home-category_title text-center mb-5 ">
                <h2>Shop by category</h2>
            </div>
            <div class="swiper">
                <div class="swiper_2">
                    <div class="swiper-wrapper">
                        <?php
                        $categories = getAllActive("categories");
                        if (mysqli_num_rows($categories) > 0) {
                            foreach ($categories as $item) {
                        ?>
                                <div class="swiper-slide" style="width: 20%;">
                                    <a href="shop.php?category=<?= $item['slug'] ?>">
                                        <!-- <div class="card shadow"> -->
                                        <div class="home-category_item">
                                            <img src="uploads/<?= $item['image'] ?>" alt="Category Image" class="w-100">
                                            <h6 class="text-center"><?= $item['name'] ?> </h6>
                                        </div>
                                        <!-- </div> -->
                                    </a>
                                </div>

                        <?php
                            }
                        } else {
                            echo "No data found";
                        }
                        ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>



            </div>
        </div>
        <div class="py-4"></div>
    </div>
    <div class="row">

        <!-- <div class="col-md-4 p-0">
            <div class="banner-area">
                <img src="./assets/img/banner_shop.jpg" alt="">
            </div>
        </div> -->
        <div class="col-md-12 p-0">
            <nav>
                <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">New</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Sale</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Top rated</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active ml-0" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="swiper w-100">
                        <div class="swiper_5">
                            <div class="swiper-wrapper">

                                <?php
                                $products = getAllActive("products");

                                if (mysqli_num_rows($products) > 0) {
                                    foreach ($products as $item) {

                                        $ngay_them_moi = strtotime($item['created_at']);
                                        $ngay_hien_tai = strtotime("now");

                                        $so_ngay_moi = 7; // Định nghĩa số ngày mà bạn muốn coi sản phẩm là mới

                                        if (($ngay_hien_tai - $ngay_them_moi) / (60 * 60 * 24) <= $so_ngay_moi) {
                                ?>

                                            <div class="swiper-slide">
                                                <a href="product-view.php?product=<?= $item['slug'] ?>">

                                                    <div class="product-item product_data ">

                                                        <div class="product_label">
                                                            <span class=" new mx-1">New</span>
                                                            <?php if ($item['original_price'] != 0) {  ?>
                                                                <span class=" sale">Sale -<?php echo 100 - round(($item['selling_price'] /  $item['original_price']) * 100)   ?>%</span>
                                                            <?php } ?>
                                                        </div>


                                                        <div class="product-img">
                                                            <img src="uploads/<?= $item['image'] ?>" alt="Product Image" class="w-100">

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
                                <?php }
                                    }
                                }
                                ?>

                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="swiper w-100">
                        <div class="swiper_5">
                            <div class="swiper-wrapper">

                                <?php
                                $products = getAllActive("products");

                                if (mysqli_num_rows($products) > 0) {
                                    foreach ($products as $item) {


                                        if ($item['original_price'] != 0) {
                                ?>

                                            <div class="swiper-slide">
                                                <a href="product-view.php?product=<?= $item['slug'] ?>">

                                                    <div class="product-item product_data ">

                                                        <div class="product_label">
                                                            <span class=" sale">Sale -<?php echo 100 - round(($item['selling_price'] /  $item['original_price']) * 100)   ?>%</span>
                                                            <?php
                                                            $ngay_them_moi = strtotime($item['created_at']);
                                                            $ngay_hien_tai = strtotime("now");

                                                            $so_ngay_moi = 7; // Định nghĩa số ngày mà bạn muốn coi sản phẩm là mới
                                                            if (($ngay_hien_tai - $ngay_them_moi) / (60 * 60 * 24) <= $so_ngay_moi) {  ?>

                                                                <span class=" new mx-1">New</span>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="product-img">
                                                            <img src="uploads/<?= $item['image'] ?>" alt="Product Image" class="w-100">

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
                                <?php }
                                    }
                                }
                                ?>

                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="swiper w-100">
                        <div class="swiper_5">
                            <div class="swiper-wrapper">

                                <?php
                                $products = getAllActive("products");
                                // echo mysqli_num_rows($products);
                                if (mysqli_num_rows($products) > 0) {
                                    foreach ($products as $item) {

                                        $prod_id = $item["id"];
                                        $reviews_query = "SELECT * FROM reviews where product_id = '$prod_id'";
                                        $review_query_run = mysqli_query($con, $reviews_query);
                                        if (mysqli_num_rows($review_query_run) > 0) {

                                            $total = 0;
                                            foreach ($review_query_run as $review) {
                                                // echo $review['rating']."-";
                                                $total += $review['rating'];
                                            }
                                            // echo $total;
                                            $avg_rating = round($total / mysqli_num_rows($review_query_run), 1);

                                            if ($avg_rating > 4) {


                                ?>

                                                <div class="swiper-slide">
                                                    <a href="product-view.php?product=<?= $item['slug'] ?>">

                                                        <div class="product-item product_data ">
                                                            <div class="product-img">
                                                                <img src="uploads/<?= $item['image'] ?>" alt="Product Image" class="w-100">

                                                            </div>
                                                            <div class="product-infor ">
                                                                <div><a href="" class="fs-5 "><?= $item['name'] ?> </a></div>
                                                                <div class="fs-5 text-left d-flex justify-content-between mb-3">
                                                                    <div>$<?= $item['selling_price'] ?></div>
                                                                    <?php

                                                                    if ($avg_rating > 0) {

                                                                    ?>
                                                                        <div class="rating-result"><span><?= $avg_rating ?></span><span><i class="fa fa-star"></i></span></div>

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
                                <?php }
                                        }
                                    }
                                }
                                ?>

                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="py-4"></div>
        <div class="col-md-12">
            <!-- <hr> -->
            <div class="home-customer py-4 px-5">
                <div class="home-customer_title text-center mb-5 ">
                    <h2>What customer say</h2>
                </div>
                <div class="swiper">
                    <div class="swiper_4">
                        <div class="swiper-wrapper">
                            <?php
                            $query = "SELECT user_name,  comment
                            FROM reviews
                            WHERE rating = 5 AND comment != ''
                            GROUP BY user_name
                            LIMIT 5;";
                            $reviews = mysqli_query($con, $query);
                            if (mysqli_num_rows($reviews) > 0) {
                                foreach ($reviews as $rv) {

                                     ?>
                                    <div class="swiper-slide">
                                        <div class="customer-say_item">
                                            <div class="customer-infor">
                                                <div class="image-acc"><img src="./assets/img/user.jpg" alt=""></div>

                                                <div class="customer-infor_name">
                                                    <h5 class="mb-2"><?= $rv['user_name'] ?></h5>
                                                    <p>
                                                        </span><i class="fa fa-star"></i></span>
                                                        </span><i class="fa fa-star"></i></span>
                                                        </span><i class="fa fa-star"></i></span>
                                                        </span><i class="fa fa-star"></i></span>
                                                        </span><i class="fa fa-star"></i></span>
                                                    </p>

                                                </div>

                                            </div>
                                            <div class="customer-say_item">
                                                <p><?= $rv['comment'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php  }
                            }
                            ?>



                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>



                </div>
            </div>
        </div>
        <div class="py-4"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- <hr> -->
            <div class="home-customer py-4 px-5">
                <div class="home-customer_title text-center mb-5 ">
                    <h2>Recent Blog</h2>
                </div>
                <div class="swiper">
                    <div class="swiper_4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="">
                                    <div class="content-block_image p-0 mb-2" style="width: 400px;">
                                        <a href="blog.php" alt="Our Market Picks: This Is What We Love">
                                            <img src="assets/img/blog-5_720x.webp" class="img w-100" alt="Our Market Picks: This Is What We Love">
                                        </a>
                                    </div>
                                    <div class="blog__content">
                                        <p class="blog__meta">
                                            <time datetime="2022-04-21T15:32:56Z">April 21, 2022</time>
                                        </p>
                                        <h5 class="blog_title-link">
                                            <a class="title-link-btn" href="#">Our Market Picks: This Is What We Love</a>
                                        </h5>


                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="">
                                    <div class="content-block_image p-0 mb-2 " style="width: 400px;">
                                        <a href="blog.php" alt="Our Market Picks: This Is What We Love">
                                            <img src="assets/img/blog4_720x.webp" class="img w-100" alt="Our Market Picks: This Is What We Love">
                                        </a>
                                    </div>
                                    <div class="blog__content">
                                        <p class="blog__meta">
                                            <time datetime="2022-04-21T15:32:56Z">April 21, 2022</time>
                                        </p>
                                        <h5 class="blog_title-link">
                                            <a class="title-link-btn" href="#">Our Market Picks: This Is What We Love</a>
                                        </h5>


                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="">
                                    <div class="content-block_image p-0 mb-2 " style="width: 400px;">
                                        <a href="blog.php" alt="Our Market Picks: This Is What We Love">
                                            <img src="assets/img/blog3_720x.webp" class="img w-100" alt="Our Market Picks: This Is What We Love">
                                        </a>
                                    </div>
                                    <div class="blog__content">
                                        <p class="blog__meta">
                                            <time datetime="2022-04-21T15:32:56Z">April 21, 2022</time>
                                        </p>
                                        <h5 class="blog_title-link">
                                            <a class="title-link-btn" href="#">Our Market Picks: This Is What We Love</a>
                                        </h5>


                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="">
                                    <div class="content-block_image p-0 mb-2 " style="width: 400px;">
                                        <a href="blog.php" alt="Our Market Picks: This Is What We Love">
                                            <img src="assets/img/blog2_720x.webp" class="img w-100" alt="Our Market Picks: This Is What We Love">
                                        </a>
                                    </div>
                                    <div class="blog__content">
                                        <p class="blog__meta">
                                            <time datetime="2022-04-21T15:32:56Z">April 21, 2022</time>
                                        </p>
                                        <h5 class="blog_title-link">
                                            <a class="title-link-btn" href="#">Our Market Picks: This Is What We Love</a>
                                        </h5>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>



                </div>
            </div>
        </div>
        <div class="py-4"></div>
    </div>

</div>
<!-- </div> -->

<?php include('./includes/footer.php') ?>