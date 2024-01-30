<?php
session_start();

include('./includes/header.php')
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['message'] ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Reset password</h3>
                    </div>
                    <div class="card-body">
                        <form action="./functions/auth.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">New password</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm new password</label>
                                <input type="password" name="cpassword" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
                            </div>
                            
                            <button type="submit" name="change_btn" style="background-color: #76A713;border-color:#76A713 ;" class="btn btn-success">OK</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php') ?>