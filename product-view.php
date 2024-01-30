<?php
include('./functions/userfunctions.php');
// session_start();
include('./includes/header.php');

if (isset($_GET['product'])) {
    $comment = '';
    $rating = 0;
    $product_slug = $_GET['product'];
    $product_data = getByslugActive('products', $product_slug);
    $product = mysqli_fetch_array($product_data);
    $product_id = $product['id'];
    $categories = getAllActive("categories");
    $cat_id = $product['category_id'];
    if ($product) {
        if (!empty($_POST['comment'])) {
            $comment = $_POST['comment'];
        }
        if (!empty($_POST['star-num'])) {
            $rating = $_POST['star-num'];
        }
?>
        <div class="py-3" style="background-color: #76A713;">
            <div class="container">
                <h6 class="text-white"><a href="index.php" class="text-white">Home / </a><a href="shop.php" class="text-white">Shop /</a> <?= $product['name'] ?> </h6>
            </div>
        </div>
        <div class="bg-light py-4">
            <div class="overlay d-none"></div>
            <div class="container product_data mt-3">
                <div class="row mb-5">
                    <div class="col-md-4 ">
                        <div class="shadow mb-4"><img src="uploads/<?= $product['image'] ?>" alt="product Image" class="w-100"></div>
                    </div>
                    <div class="col-md-8 ">
                        <div class="d-flex ">

                            <div class="mb-2">
                                <h4 class="fw-bold"><?= $product['name'] ?>
                                </h4>
                            </div>
                            <div class="mx-3">
                                <?php
                                $ngay_them_moi = strtotime($product['created_at']);
                                $ngay_hien_tai = strtotime("now");

                                $so_ngay_moi = 7; // Định nghĩa số ngày mà bạn muốn coi sản phẩm là mới

                                if (($ngay_hien_tai - $ngay_them_moi) / (60 * 60 * 24) <= $so_ngay_moi) { ?>
                                    <span class=" new mx-1">New</span>
                                <?php
                                    // Thêm label cho sản phẩm mới   
                                }
                                if ($product['original_price'] != 0) { ?>
                                    <span class="sale ">Sale</span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="">
                                <span class="" style="font-size: 14px;color:4f4f4f"><?php foreach ($categories as $cat) {
                                                                                        echo $cat['id'] === $product['category_id'] ? $cat['name'] : '';
                                                                                    }  ?></span>
                            </div>
                            <?php

                            $prod_id = $product["id"];
                            $reviews_query = "SELECT * FROM reviews where product_id = '$prod_id'";
                            $review_query_run = mysqli_query($con, $reviews_query);
                            if (mysqli_num_rows($review_query_run) > 0) {
                                $total = 0;
                                foreach ($review_query_run as $review) {
                                    $total += $review['rating'];
                                }
                            ?>
                                <div class="rating-result mx-4"><span><?= round($total / mysqli_num_rows($review_query_run), 1) ?></span><span><i class="fa fa-star"></i></span></div>
                            <?php

                            } else {
                            ?>
                                <div class="rating-result mx-4"><span>0</span><span><i class="fa fa-star"></i></span></div>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="border mb-3"></div>
                        <p class="mb-3"><?= $product['small_description'] ?></p>
                        <div class="prod_price mb-4">
                            <div class="fs-3" style="color: #76A713;">$<span style="color: #76A713;" class="mr-2"><?= $product['selling_price'] ?></span></div>
                            <?php
                            if ($product['original_price'] == 0) {
                                echo "";
                            ?>
                            <?php
                            } else {
                            ?>

                                <div class="fs-3 "><del><span style="color: #333;">$<?= $product['original_price'] ?></span></div>
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
                        <div class="prod_actions mt-3">
                            <div class="">
                                <button class=" px-4 addToCartBtn " value="<?= $product['id'] ?>"><i class="fa fa-shopping-cart " aria-hidden="true"></i>Add to cart</button>
                            </div>
                            <div class="">
                                <button class="btn-buy buyBtn px-4" value="<?= $product['id'] ?>">Buy now</button>
                            </div>
                        </div>
                        <div class="border my-4"></div>
                        <p><?= $product['big_description'] ?></p>
                    </div>
                </div>
                <div class="row mb-5">
                    <h4 class="fs-2 fw-bold text-center mb-5">Reviews <?php
                                                                        $query = "SELECT * FROM reviews where product_id = '$product_id'";
                                                                        $reviews = mysqli_query($con, $query);
                                                                        $result = mysqli_num_rows($reviews);
                                                                        echo "($result)";
                                                                        ?></h4>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12 ">
                        <?php if (isset($_SESSION['auth'])) { ?>

                            <form class=" mb-3" method="POST" action="">
                                <section class='rating-widget d-flex align-items-center mb-2'>

                                    <!-- Rating Stars Box -->
                                    <div class='rating-stars '>
                                        <ul id='stars' class="my-0">
                                            <li class='star' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class='success-box d-flex align-items-center'>
                                        <div class='clearfix'></div>
                                        <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K' />
                                        <div class='text-message'></div>
                                        <div class='clearfix'></div>
                                    </div>



                                </section>
                                <input type="hidden" class="star-number" name="star-num" value="">
                                <input class="form-control me-2 py-3 mb-2" value="<?php echo isset($_POST['comment']) && ''; ?>" type='text' name="comment" type="text" placeholder="Leave a comment..." aria-label="Comment">
                                <button class="btn btn-outline-success send-btn" name="send-submit" type="submit">Send</button>
                            </form>

                        <?php } ?>
                    </div>

                    <div class="col-md-12">
                        <?php

                        if (isset($_POST['send-submit']) && isset($_SESSION['auth']) && $rating != 0) {
                            $result = getReview($product_id, $_SESSION['auth_user']['name'], $rating, $comment);
                        }

                        $query = "SELECT * FROM reviews where product_id = '$product_id' ORDER BY created_at DESC";
                        $reviews = mysqli_query($con, $query);

                        echo "<div class='card card-body shadow'>";
                        //    print_r($query_run);
                        if (mysqli_num_rows($reviews) > 0) {

                            foreach ($reviews as $review) {

                        ?>

                                <div class="comment-item d-flex mb-3">
                                    <div class="comment-img"><img src="./assets/img/user.jpg" alt=""></div>
                                    <div class="mx-2">
                                        <p class="result-star"><?php for ($i = 1; $i <= $review['rating']; $i++) { ?>
                                                <span style="color:#FFCC36;"><i class="fa fa-star"></i></span>
                                            <?php

                                                                } ?>
                                        </p>
                                        <h6><?php echo $review['user_name'] ?></h6>
                                        <span style="font-size: 14px;"><?php echo $review['created_at'] ?></span>
                                        <p class="fw-bold"><?php echo $review['comment'] ?></p>
                                    </div>
                                </div>

                            <?php

                            }
                        } else { ?>
                            <p class="fs-5">No Reviews Yet!</p>
                        <?php

                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <h4 class="fs-2 fw-bold text-center mb-5">Related Products</h4>
                <div class="col-md-12 ">
                    <div class="swiper">
                        <div class="swiper_6 ">
                            <div class="swiper-wrapper ">
                                <?php
                                $products = getProByCategory($cat_id);
                                foreach ($products as $item) {
                                    if ($item['id'] !== $product['id']) {
                                ?>
                                        <div class="swiper-slide">
                                            <a href="product-view.php?product=<?= $item['slug'] ?>">

                                                <div class="product-item product_data ">
                                                    <div class="product_label" style="top: 30px; left: 30px">
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
                                                            <span class=" sale">Sale</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>


                                                    <div class="product-img">
                                                        <img src="uploads/<?= $item['image'] ?>" alt="Product Image" class="w-100">

                                                    </div>
                                                    <div class="product-infor ">
                                                        <div>
                                                            <p class="fs-5 "><?= $item['name'] ?> </p>
                                                        </div>
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

<?php
    } else {
        echo "Product not found";
    }
} else {
    echo "Something went wrong";
}
?>

<?php include('./includes/footer.php') ?>