<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You already logged in!";
    header('Location: index.php ');
    exit();
}
include('./includes/header.php')
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-alert" role="alert">
                        <?= $_SESSION['message'] ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Register Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="./functions/auth.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" placeholder="Enter your name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="number" name="phone" placeholder="Enter your phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" style="background-color: #76A713;border-color:#76A713 ;" name="register_btn" class="btn btn-success " >Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php') ?>