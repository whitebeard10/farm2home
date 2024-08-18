<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <style>
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .card-title, .card-text {
      margin-bottom: 0;
    }
    .card-body {
      padding: 1rem;
    }
    .card-footer {
      padding: 0.5rem;
    }
    .btn-info {
      background-color: #17a2b8;
      border-color: #17a2b8;
    }
    /* New navbar styles */
    .navbar {
      box-shadow: 0 2px 4px rgba(0,0,0,.1);
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .navbar-brand i {
      color: #17a2b8;
    }
    .nav-item {
      margin-left: 10px;
    }
    .nav-link {
      font-size: 1.1rem;
      transition: color 0.3s ease;
    }
    .nav-link:hover {
      color: #17a2b8 !important;
    }
    .nav-link i {
      margin-right: 5px;
    }
    #cart-item {
      position: relative;
      top: -10px;
      left: -5px;
      font-size: 0.7rem;
    }
  </style>
</head>

<body>
<!-- Optimized Navbar start -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="../html/index.html">
      <i class="fas fa-home"></i> FARM TO HOME
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-th-list"></i> Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt"></i> Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <span class="position-relative">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart-item" class="badge badge-pill badge-danger"></span>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Optimized Navbar end -->

  <!-- Displaying Products Start -->
  <div class="container my-4">
    <div id="message"></div>
    <div class="row">
      <?php
        include 'cartSystemAccess.php';
        $stmt = $conn->prepare('SELECT * FROM product');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card border-secondary">
          <img src="<?= $row['product_image'] ?>" class="card-img-top" alt="<?= $row['product_name'] ?>">
          <div class="card-body">
            <h5 class="card-title text-center text-info"><?= $row['product_name'] ?></h5>
            <p class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i> <?= number_format($row['product_price'], 2) ?>/-</p>
            <form action="" class="form-submit">
              <div class="form-row">
                <div class="col">
                  <label for="quantity">Quantity:</label>
                  <input type="number" id="quantity" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                </div>
              </div>
              <input type="hidden" class="pid" value="<?= $row['id'] ?>">
              <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
              <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
              <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
              <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
              <button class="btn btn-info btn-block mt-2 addItemBtn" type="submit"><i class="fas fa-cart-plus"></i> Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {
    // Send product details to the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();
      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total number of items added to the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>