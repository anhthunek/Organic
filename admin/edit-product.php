<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getById("products", $id);
                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
                    ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product
                        <a href="products.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Select Category</label>
                                    <select name="category_id" class="form-select" required>
                                        <option selected>Select Category</option>
                                        <?php
                                        $categories = getAll("categories");
                                        if (mysqli_num_rows($categories) > 0) {
                                            foreach ($categories as $item) {
                                        ?>
                                                <option value="<?= $item['id'] ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                        <?php
                                            }
                                        } else {
                                            echo "No category available";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <input type="hidden" name="product_id" value="<?= $data['id'] ?>" >
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <input required type="text" value="<?= $data['name'] ?>" name="name" placeholder="Enter name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slug</label>
                                    <input required type="text" value="<?= $data['slug'] ?>" name="slug" placeholder="Enter slug" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Small Description</label>
                                    <textarea required rows="4" name="small_description" placeholder="Enter small description" class="form-control mb-2"><?= $data['small_description'] ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea required rows="5" name="description" placeholder="Enter description" class="form-control mb-2"><?= $data['big_description'] ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Original Price</label>
                                    <input type="text" name="original_price" value="<?= $data['original_price'] ?>" placeholder="Enter original price" class="form-control mb-2">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Selling Price</label>
                                    <input required  type="text" name="selling_price" value="<?= $data['selling_price'] ?>" placeholder="Enter selling price" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input  type="file" name="image" class="form-control mb-2">
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                    <label for="">Current Image</label>
                                    <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="roduct image">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Quantity</label>
                                        <input required type="number" value="<?= $data['qty'] ?>" name="qty" placeholder="Enter quantity" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status']== 0 ? '' : 'checked' ?> >
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Popular</label>
                                        <input type="checkbox" name="trending" <?= $data['trending']== 0 ? '' : 'checked' ?>>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Title</label>
                                    <input required type="text" value="<?= $data['meta_title'] ?>" name="meta_title" placeholder="Enter meta title" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Description</label>
                                    <textarea required rows="3" value="<?= $data['meta_description'] ?>" name="meta_description" placeholder="Enter meta description" class="form-control mb-2"><?= $data['meta_description'] ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Keywords</label>
                                    <textarea required rows="3" value="<?= $data['meta_keywords'] ?>" name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-2"><?= $data['meta_keywords'] ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            <?php
                }
                else {
                    echo "product not found for given id";
                }
            } else {
                echo "Id missing from url";
            }
            ?>


        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php') ?>