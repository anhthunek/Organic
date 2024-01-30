<nav class="navbar navbar-expand-lg bg-link navbar-light fs-5 py-3 " id="nav">
  <div class="overlay d-none"></div>
  <div class="container header-middle">

    <div class="d-flex justify-content-between align-items-center w-100">
      <button class="fa fa-bars btn-toggle"></button>

      <div class="nav-logo"><a class="navbar-brand" href="index.php"><img style="width: 100px;" src="https://demo.casethemes.net/organio/wp-content/themes/orgio/assets/images/logo-mobile.png" alt=""></a></div>
      <div class="nav-middle">
        <button class="fa fa-close"></button>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="font-weight: 500;">
          <li class="nav-item mx-3">
            <a class="nav-link " href="index.php">Home</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contact.php">Contact us</a>
          </li>
          <?php if (isset($_SESSION['auth'])) { ?>
            <li class="nav-item account-item"><a class="nav-link " href="my-orders.php"><span><i class="fa fa-user-o" style="color: #333;" aria-hidden="true"></i></span>My account</a> </li>
            <li class="nav-item account-item"><a class="nav-link " href="logout.php"><span><i style="color: #333;" class="fa fa-arrow-right"></i></span>Log out</a> </li>
          <?php } ?>
        </ul>
      </div>
      <div class="nav-right ">
        <!-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> -->
        <div class="d-flex justify-content-right">
          <ul class="navbar-nav ms-auto ml-auto">
            <!-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li> -->
            <?php if (isset($_SESSION['auth'])) { ?>
              <li class="nav-item name-user dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user-circle" style=" color: #333; margin-right: 5px;" aria-hidden="true"></i> <span class=""><?= $_SESSION['auth_user']['name'] ?></span>
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="my-orders.php">My account</a></li>
                  <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                </ul>

              </li>
              <li class="nav-item cart">
                <a class="nav-link" href="cart.php">
                  <i class="fa fa-cart-plus fs-4" aria-hidden="true"></i>
                </a>

                <span><?php
                      $items = getCartItems();
                      echo mysqli_num_rows($items);
                      ?></span>
              </li>
          </ul>
        <?php
            } else {
        ?>
          <ul class="navbar-nav ms-auto ml-auto auth-actions" style="background-color: #9ade121f; border-radius: 50px; ">
            <li class="nav-item sign-up">
              <a class="nav-link " style="color: #fff; padding: 6px 20px;background-color: #76A713;border-radius: 50px;" href="register.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hover-2" style="padding: 6px 20px;" href="login.php">Log in <i style="color: #333; font-size: 20px;" class="fa fa-sign-in mx-0" aria-hidden="true"></i> </a>
            </li>
          </ul>
        <?php
            }
        ?>
        </div>

      </div>
    </div>

  </div>
</nav>