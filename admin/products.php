<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Products</h4>
            </div>
            <div class="card-body" id="products_table">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products = getAll("products");
                        if (mysqli_num_rows($products) > 0) {
                            foreach ($products as $item) {
                        ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td>
                                        <img src="../uploads/<?= $item['image'] ?>" width="50" height="50" alt="<?= $item['name'] ?>">
                                    </td>
                                    <td><?= $item['status'] == '0' ? "Visible" : "Hidden" ?></td>
                                    <td style="display: flex;">
                                        <a href="edit-product.php?id=<?= $item['id'] ?>" style="margin-right: 20px;" class="btn btn-primary">Edit</a>
                                        <button type="button" name="delete_product_btn" class="btn btn-danger delete_product_btn" value="<?= $item['id'] ?>">Delete</button>

                                    </td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "No records found";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>