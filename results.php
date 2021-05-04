<?php
include("includes/db.php");
include("function/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>My shop</title>
  <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/style.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!--google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
  
<style type="text/css">

  
body{
  background-color: #fff;
  font-family: 'Maven Pro', sans-serif;
}

.one{
  background-color: #2d3436;
}
.two{
  background-color: #ecf0f1;
}

.side_title{
  background-color:#fff;
  padding: 10px;
  font-size: 22px; 

}

#cats a{
  color:#fff;
  padding: 10px;
  text-align: center;
}
#cats li{
  margin: 8px;
}
#cats a:hover{
  color:#b2bec3;
}
#headline{
  background-color: #2d3436;
}
#header{
  color: #fff;
  float: right;
  padding: 5px;
  font-size: 20px;
}
#product{
  float: right;
  padding: 5px;
  margin: 5px;
}
.footer{
  background-color: #2d3436;
  color:#fff; 

}
</style>
</head>

<body>
<!--navigation bar-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_products.php">All Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_account.php">My account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_register.php">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Shopping Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      
      
      
    </ul>
    <form method="get" action="results.php" class="form-inline my-2 my-lg-0" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="user_query">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search" >Search</button>
    </form>
  </div>
</nav>
<br>

<!--nav bar end-->
<!--container-->

<div class="container-fluid">
  <div class="row" id="division">
  <!--left side-->
  <div class="col-3 one" >
    <br>
    <div class="container-fluid side_title">Catogories</div>

      <ul class="navbar-nav mr-auto " id="cats">
     
<?php

    getCats();

?>    
    </ul>

    <div class="container-fluid side_title">Brands</div>

    <ul class="navbar-nav mr-auto b" id="cats">
     
      <?php
            getBrands();
      ?>
     
    
    </ul>

  </div>
  <!--left side end-->
  

  <!--right side-->
  <div class="col-9 two" >
    <div class="container-fluid" id="headline">
      <div id="header">
        <div>Welcome to <span style="color: yellow;">Myshop</span> Items:- Price</div>
     </div>  
    </div>

    <div id="products_box">
          <?php 
            
          	if (isset($_GET['search'])) {
          		
          	$user_keyword = $_GET['user_query'];

            $get_products = "SELECT * FROM products where product_keywords like '%$user_keyword%'";
        
        $run_products = mysqli_query($con,$get_products);
        
        while($row_products = mysqli_fetch_array($run_products))
        {
          $pro_id = $row_products["product_id"];
          $pro_title = $row_products["product_title"];
          $pro_cat = $row_products["cat_id"];
          $pro_brand = $row_products["brand_id"];
          $pro_desc = $row_products["product_desc"];
          $pro_price = $row_products["product_price"];
          $pro_image = $row_products["product_img1"];

        echo "<div id='product'>
                <div class='card' style='width: 18rem; height:24rem'>
                  <h5 class='card-title text-center' >$pro_title</h5>
                  <img class='card-img-top' src='admin_area/products_images/$pro_image' alt='Card image cap'>
                  <div class='card-body'>
                  
                  <p class='card-text'><b>Price: Rs $pro_price</b></p>
                  <a href='details.php?pro_id=$pro_id' class='btn btn-dark'>Detail</a>
                  <a href='index.php?add_cart=$pro_id' class='btn btn-dark'>Add to cart</a>
                  </div>
                </div> 

              </div>          
        ";

        }

    }

           ?>  
    </div>
  </div>
  <!--right side end-->
</div>
</div>
<!--container end-->
<br>
<!--footer end-->
<div class="container-fluid footer">
  <div class="text-center ">
    2018-19 www.royal_solution.com
  </div>
</div>


<!--footer end-->


</body>
</html>