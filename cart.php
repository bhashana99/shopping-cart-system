<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
        <a class="nav-link "  href="./index.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./checkout.php">Checkout</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-danger" id="cart-item"></span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    <tr>
                        <td colspan="7">
                            <h4 class="text-center text-info m-0">Products in your cart!</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <a href="action.php?clear=all" class="badge-danger badge p-"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                        </th>
                    </tr>
</table>
            </div>
        </div>
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