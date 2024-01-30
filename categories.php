<?php
include('./functions/userfunctions.php');
// session_start();
include('./includes/header.php');
?>

<!-- <div class="py-5"> -->
    <div class="container-fuild">
        <div class="row">
            <div class="shop-header">
                <img class="img-fluid" style="background-size: cover;" src="https://demo2.pavothemes.com/freshio/wp-content/uploads/2020/08/breadcrumb_woo.jpg" alt="">
                <h2 class="mb-3 fw-bold">Shop</h2>
            </div>
            <div class="py-3 px-5" style="background-color: #76A713;">
                    <h6><a href="index.php" class="text-white">Home /</a> <a href="categories.php" class="text-white">Shop</a> </h6>
            </div>
            <div class="py-5"></div>
            <div class="col-md-12 px-5">
                <!-- <hr> -->
                <?php
                $categories = getAllActive("categories");
                if (mysqli_num_rows($categories) > 0) {
                    foreach ($categories as $item) {
                ?>
                        <div class="col-md-3 mt-2">
                            <a href="products.php?category=<?= $item['slug'] ?>">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img src="uploads/<?= $item['image'] ?>" alt="Category Image" class="w-100">
                                        <h4 class="text-center"><?= $item['name'] ?> </h4>
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
            </div>
        </div>
    </div>
<!-- </div> -->

<?php include('./includes/footer.php') ?>