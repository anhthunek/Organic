$(document).ready(function () {
  // Btn toggle
  $(".btn-toggle").click(function (e) { 
    e.preventDefault();
    $(".nav-middle").addClass("nav-active");
    $(".overlay").removeClass("d-none");
    $(".header-middle").removeClass("fixed");
  });
  $(".nav-middle .fa-close").click(function (e) { 
    e.preventDefault();
    $(".nav-middle").removeClass("nav-active");
    $(".header-middle").addClass("fixed");
  });
  // Quick-view
  $(".fa.fa-eye").click(function (e) {
    e.preventDefault();
    var target = $(this).data("target"); // Lấy giá trị của thuộc tính data-target
    $("." + target).removeClass("d-none"); // Hiển thị hoặc ẩn phần tử tương ứng với data-target
    $(".overlay").removeClass("d-none");
  });
  // Quick-view
  $(".fa.fa-close").click(function (e) {
    e.preventDefault();

    $(".quick-view").addClass("d-none"); // Hiển thị hoặc ẩn phần tử tương ứng với data-target
    $(".overlay").addClass("d-none");
  });
  // Navigation

  // Pagination
  $(function () {
    $("#pagination-demo").twbsPagination({
      totalPages: 5,
      visiblePages: 2,
      next: "Next",
      prev: "Prev",
      onPageClick: function (event, page) {
        //fetch content and render here
        $("#page-content").text("Page? + page + ?content here");
      },
    });
  });

  $(".increment-btn").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".qty-input").val();
    console.log("hello");
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;

      $(this).closest(".product_data").find(".qty-input").val(value);
    }
  });
  $(".decrement-btn").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".qty-input").val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;

      $(this).closest(".product_data").find(".qty-input").val(value);
    }
  });

  $(".addToCartBtn").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".qty-input").val();
    var prod_id = $(this).val();
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "add",
      },

      success: function (response) {
        if (response == 201) {
          alertify.success("Product added to cart cuccessfully!");
          $("#shop").load(location.href + " #shop");
        } else if (response == 401) {
          alertify.success("Login to continue!");
        } else if (response == "Already existed") {
          alertify.success("Product already in cart!");
        } else if (response == 500) {
          alertify.success("Something went wrong");
        }
      },
    });
  });
  $(".btn-buy").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".qty-input").val();
    var prod_id = $(this).val();
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "add",
      },
    });
    window.location.href = "checkout.php";
  });

  $(document).on("click", ".updateQty", function () {
    var qty = $(this).closest(".product_data").find(".qty-input").val();
    var prod_id = $(this).closest(".product_data").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "update",
      },
      success: function (response) {
        // alert(response);
      },
    });
  });


  $(document).on("click", ".deleteItem", function () {
    var cart_id = $(this).val();
    // alert(cart_id)
    $.ajax({
      type: "POST",
      url: "functions/handlecart.php",
      data: { cart_id: cart_id, scope: "delete" },

      success: function (response) {
        if (response == 200) {
          alertify.success("Product removed successfully!");
          $("#cart").load(location.href + " #cart");
        } else {
          alertify.success(response);
        }
      },
    });
  });


  // Header fixed
    $(window).scroll(function() {
        if (window.pageYOffset > 200) {
            console.log("hello");
            $(".header-middle").addClass("fixed");
        } else {
            $(".header-middle").removeClass("fixed");
        }
    });

  $('.send-btn').click(function (e) { 
    // e.preventDefault();
    // Reload trang
    location.reload();
  
  });
  // Filter price
 
});
