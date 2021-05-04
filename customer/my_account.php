<?php

session_start();
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
  background-color: #fff;
}
.two{
  background-color: #fff;
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
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../all_products.php">All Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../customer/my_account.php">My account</a>
      </li>


      <?php
        if (!isset($_SESSION['customer_email'])) {
          
        ?>
      <li class="nav-item">
        <a class="nav-link" href="../customer_register.php">Sign Up</a>
      </li>
      <?php
      }
      ?>


      <li class="nav-item">
        <a class="nav-link" href="../cart.php">Shopping Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contact.php">Contact Us</a>
      </li>
      
      
      
    </ul>
    <form method="get" action="results.php" class="form-inline my-2 my-lg-0" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="user_query">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
  </div>
</nav>
<br>

<!--nav bar end-->
<!--container-->

<div class="container-fluid">
  <div class="row" id="division">
  <!--left side-->
    
     <div class="col-9 two" >

    <?php  
    cart();
    ?>
  
  

    <div class="container-fluid" id="headline">
      <div id="header">
        <div> 
        <?php 

          if (!isset($_SESSION['customer_email'])) {
            
            echo " Welcome <span style='color:cyan;'>Guest!</span>";
           } 

           else{

            echo " Welcome <span style='color:cyan';> ".$_SESSION['customer_email']."</span>";
           }

        ?> &nbsp;

            <?php
            
            if(!isset($_SESSION['customer_email'])){

            echo "<a href='../checkout.php' class='btn btn-outline-light' style=''>Log In</a>";

            }

            else{

              echo "<a href='../logout.php' class='btn btn-outline-light' style=''>Log Out</a>";

            }
          ?>

          </span>
        </div>
     </div>  
    </div>


    


    <div id="products_box">

    <h5 class="text-center">Manage Your Account</h5>


          <?php 

           getDefault();

          ?>
          
          <?php 

          if (isset($_GET['my_orders'])) {
            
            include("my_orders.php");

          }
           if (isset($_GET['edit_account'])) {
            
            include("edit_account.php");
          }
          
          if (isset($_GET['change_pass'])) {
            
            include("change_pass.php");
          }
          
           if (isset($_GET['delete_account'])) {
            
            include("delete_account.php");
          }
           ?>  
    </div>

  </div>


  <!--left side end-->
  
<?php 
  	getRealIpAddr();
 ?>
  <!--right side-->

  <div class="col-3 one" >
    <br>
    

      <ul class="list-group">
  <li class="list-group-item list-group-item-action list-group-item-dark active"><strong>Manage Account</strong></li>
  <?php  

    $user_session = $_SESSION['customer_email'];

    $get_customer = "SELECT * FROM customers where customer_email='$user_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_pic = $row_customer['customer_image'];

    echo "<img src='customer_photos/$customer_pic' class='img-thumbnail' ";
  ?>&<br>
  <a href="my_account.php?my_orders" class="list-group-item list-group-item-action">My Order</a>
  <a href="my_account.php?edit_account" class="list-group-item list-group-item-action">Edit Account</a>
  <a href="my_account.php?change_pass" class="list-group-item list-group-item-action">Change Password</a>
  <a href="my_account.php?delete_account" class="list-group-item list-group-item-action">Delete Account</a>
  <a href="logout.php" class="list-group-item list-group-item-action ">Logout</a>
</ul>

    

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