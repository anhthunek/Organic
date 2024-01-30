<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You already logged in!";
    header('Location: index.php ');
}
include('./includes/header.php')
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['message'] ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Login Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="./functions/auth.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">No account yet? <a href="register.php" >Create account <i class="fa fa-arrow-right " style="color: #333;" aria-hidden="true"></i></a></p>
                                <p><a href="change.php">Forgot password?</a></p>
                            </div>
                            <button type="submit" name="login_btn" style="background-color: #76A713;border-color:#76A713 ;" class="btn btn-success">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php') ?>