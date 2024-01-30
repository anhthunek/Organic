<?php
include('./functions/userfunctions.php');
// session_start();
include('./includes/header.php');
if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getByslugActive('categories', $category_slug);
    $category = mysqli_fetch_array($category_data);
    if ($category) {
        $cid = $category['id'];
?>
        <div class="py-3 " style="background-color: #76A713;">
            <div class="container">
                <row><h6 class="text-white"><a href="index.php" class="text-white">Home / </a><a href="categories.php" class="text-white">Shop /</a> <?= $category['name'] ?> </h6></row>
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    
                        <h2 class="mb-3"><?= $category['name'] ?></h2>
                        <hr>
                        <?php
                        $products = getProByCategory($cid);
                        if (mysqli_num_rows($products) > 0) {
                            foreach ($products as $item) {
                        ?>
                                <div class="col-md-3 mt-2">
                                    <a href="product-view.php?product=<?= $item['slug'] ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image'] ?>" alt="Product Image" class="w-100">
                                                <h5 class="text-center"><?= $item['name'] ?> </h5>
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

<?php
    }
    else {
        echo  "Something went wrong";
    }
} else {
    echo "Something went wrong";
}
?>
<?php include('./includes/footer.php') ?>