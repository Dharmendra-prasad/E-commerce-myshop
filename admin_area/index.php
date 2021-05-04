<?php  
  session_start();
  if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
  }

  else{

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
  background: linear-gradient(to top left, #660033 -1%, #ff9999 104%);
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
  font-size: 30px;
}
#header{
  color: #fff;
  float: right;
  padding: 5px;
  font-size: 15px;
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
//#cart_decoration a:hover{
 color: #fff;
}
#wrapper{padding-top: 10px;
color:#fff;}

body{

  background-image: url("header-background.jpg");
  background-repeat:no-repeat; background-position:center; background-size:cover; 
}
.list-group-item {
background-color: transparent;
//border-top: 1px solid #ddd;
//border-radius: 0;
color: #fff;
}
#active_bar{
  background-color: #fff;
  color: #000;
  border-style: none;
}

.edit_delete:hover{
  font-size: 15px;
  transition: 0s;
}

</style>
</head>
<body>

  <nav class="navbar navbar-light bg-light">
  <a href="index.php" class="navbar-brand">Admin Pannel</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<div class="container-fluid" id="wrapper">
    <div class="row">

    <!--=================left side========================-->
      <div class="col-9">
        <!--<img src="google-apps-admin-panel-icon.png" class="rounded" alt="Cinque Terre">-->
        <h2 class="text-center"><?php echo @$_GET['logged_in']; ?> </h2>
        <?php

        if(!isset($_GET['insert_product'] ) && !isset($_GET['view_products']) && !isset($_GET['edit_pro']) && !isset($_GET['insert_cat']) && !isset($_GET['view_cats']) && !isset($_GET['edit_cat']) && !isset($_GET['delete_cat']) && !isset($_GET['insert_brand']) && !isset($_GET['view_brands']) && !isset($_GET['edit_brand']) && !isset($_GET['delete_brand']) && !isset($_GET['view_customers']) && !isset($_GET['delete_c']) && !isset($_GET['view_orders']) && !isset($_GET['view_payments']))
        {

        echo "<div class='display-2 text-center' style='padding-top: 1em;opacity: .5;''>Welcome Dharmendra</div>
        <div class='display-3 text-center' style='padding-top:1em;opacity: .5;''>Manage Your Shop</div>";
          
        }

        

         include("includes/db.php");

         if(isset($_GET['insert_product'])){

          include("insert_product.php");

         }

         if(isset($_GET['view_products'])){

          include("view_products.php");

         }

         if(isset($_GET['edit_pro'])){

          include("edit_pro.php");

         }

         if(isset($_GET['insert_cat'])){

          include("insert_cat.php");

         }

         if(isset($_GET['view_cats'])){

          include("view_cats.php");

         }

         if(isset($_GET['edit_cat'])){

          include("edit_cat.php");

         }

         if(isset($_GET['delete_cat'])){

          include("delete_cat.php");

         }

         if(isset($_GET['insert_brand'])){

          include("insert_brand.php");

         }

         if(isset($_GET['view_brands'])){

          include("view_brands.php");

         }

         if(isset($_GET['edit_brand'])){

          include("edit_brand.php");

         }

         if(isset($_GET['delete_brand'])){

          include("delete_brand.php");

         }

         if(isset($_GET['view_customers'])){

          include("view_customers.php");

         }

         if(isset($_GET['delete_c'])){

          include("delete_c.php");

         }

         if(isset($_GET['view_orders'])){

          include("view_orders.php");

         }

         if(isset($_GET['view_payments'])){

          include("view_payments.php");

         }



        ?>


      </div>


    <!--=================left side========================-->


    <!--=================right side========================-->

      <div class="col-3">
        <ul class="list-group">
  <li class="list-group-item list-group-item-action list-group-item active" id='active_bar'><strong>Manage Account</strong></li>

  <a href="index.php?insert_product" class="list-group-item list-group-item-action ">Insert New Products</a>
  <a href="index.php?view_products" class="list-group-item list-group-item-action">View All Products</a>
  <a href="index.php?insert_cat" class="list-group-item list-group-item-action">Insert New Category</a>
  <a href="index.php?view_cats" class="list-group-item list-group-item-action">View All Categories</a>
  <a href="index.php?insert_brand" class="list-group-item list-group-item-action ">Insert New Brands</a>
  <a href="index.php?view_brands" class="list-group-item list-group-item-action ">View All Brands</a>
  <a href="index.php?view_customers" class="list-group-item list-group-item-action ">View Customers</a>
  <a href="index.php?view_orders" class="list-group-item list-group-item-action ">View Orders</a>
  <a href="index.php?view_payments" class="list-group-item list-group-item-action ">View Payments</a>
  <a href="logout.php" class="list-group-item list-group-item-action ">Log Out</a>
  
  
</ul>
      </div>

    <!--=================right side========================-->  
    </div>
</div>

</body>
</html>


<?php } ?>