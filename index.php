<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/fad89713bc.js" crossorigin="anonymous"></script>
</head>
<body>
    
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="./index.php"><i class="fa-solid fa-mobile-screen"></i>&nbsp;&nbsp;Mobile Store</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active"  href="./index.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./checkout.php">Checkout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-danger" id="cart-item"></span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
        <?php  
            include 'config.php';
            $stmt = $conn->prepare("SELECT * FROM product");
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()):
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="<?= $row['product_image'] ?>" alt="product image" class="card-img-top" height="250">
                    <div class="card-body p-1">
                        <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
                        <h5 class="card-text text-center text-danger"><i class="fa-solid fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>
                    </div>
                    <div class="card-footer p-1">
                        <form action="" class="form-submit">
                            <input type="hidden" class="pid" value="<?= $row['id'] ?>" >
                            <input type="hidden" class="pname" value="<?= $row['product_name'] ?>" >
                            <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>" >
                            <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>" >
                            <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>" >
                            <button type="button" class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

    </div>
</div>


<!-- jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){
        //sent data for cart Ajax request
        $(".addItemBtn").click(function(e){
            e.preventDefault();

            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();

            $.ajax({
                url:'action.php',
                method:'post',
                data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
                success:function(response){
                    $("#message").html(response);
                    window.scrollTo(0,0);
                    load_cart_item_number();
                }
            });

        });

        load_cart_item_number();
        //show cart number ajax request
        function load_cart_item_number(){
            $.ajax({
                url:'action.php',
                method: 'get',
                data: {cartItem:"cart_item"},
                success:function(response){
                    $("#cart-item").html(response);
                }
            });
        }

    });





</script>




</body>
</html>