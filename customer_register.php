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
  background-color: #2d3436;
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
//#cart_decoration a:hover{
 color: #fff;
}

#product_box{
  float: right;
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
        <a class="nav-link" href="customer/my_account.php">My account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customer_register.php">Sign Up</a>
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
  
<?php 
  	getRealIpAddr();
 ?>
  <!--right side-->
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

        ?> <span style="color: yellow;">Myshop</span>
          Total Items:- <?php item(); ?> | Total Price:- <?php total_price(); ?> 
          <span id="cart_decoration"><a href='cart.php' class='btn btn-outline-light' style=''>Go to cart</a>&nbsp;

            <?php
            
            if(!isset($_SESSION['customer_email'])){

            echo "<a href='checkout.php' class='btn btn-outline-light' style=''>Log In</a>";

            }

            else{

              echo "<a href='logout.php' class='btn btn-outline-light' style=''>Log Out</a>";

            }
          ?>

          </span>
        </div>
     </div>  
    </div>


    


  <div id="products_box">
  <form action="customer_register.php" method="post" enctype="multipart/form-data">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center" scope="col" colspan="2">Create An Account</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <th class="text-right" scope="row">Customer Name</th>
            <td class="text-center" scope="row"><input type="text" name="c_name" required></td>
          </tr>
          <tr>
            <th class="text-right" scope="row">Customer E-mail</th>
            <td class="text-center"><input type="email" name="c_email" required></td>
          </tr>
          <tr>
            <th class="text-right" scope="row">Customer Password</th>
            <td class="text-center"><input type="Password" name="c_pass" required></td>
          </tr>
          <tr>
            <th class="text-right" scope="row">Customer Country</th>
            <td class="text-center">

                <select name="c_country">
                  <option>Select Country</option>
                  <option>India</option>
                  <option>Iran</option>
                  <option>Japan</option>
                  <option>China</option>
                  <option>Pakistan</option>
                  <option>UAE</option>
                  <option>Saudi Arab</option>
                  <option>United Kingdom</option>
                  <option>United State</option>
                </select>

            </td>
          </tr>
          <tr>
            <th class="text-right" scope="row">Customer City</th>
            <td class="text-center"><input type="text" name="c_city" required></td>
          </tr>
          <tr>
            <th class="text-right" scope="row">Customer Contact</th>
            <td class="text-center"><input type="text" name="c_contact" required></td>
          </tr>
          <tr>
            <th class="text-right" scope="row">Customer Address</th>
            <td class="text-center"><input type="text" name="c_address" required></td>
          </tr>
          <tr>
            <th class="text-right" scope="row">Customer Image</th>
            <td class="text-right"><input type="file" name="c_image" required></td>
          </tr>
          <tr>
            <td colspan="2" class="text-center"><input type="submit"  name="register" class="btn btn-outline-dark btn-lg " value="Submit"></td>
          </tr>

        </tbody>
      </table>

    </form>         
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



<?php  
  
  if (isset($_POST['register'])) {
      
      $c_name = $_POST['c_name'];
      $c_email = $_POST['c_email'];
      $c_pass = $_POST['c_pass'];
      $c_country = $_POST['c_country'];
      $c_city = $_POST['c_city'];
      $c_contact = $_POST['c_contact'];
      $c_address = $_POST['c_address'];
      $c_image = $_FILES['c_image']['name'];
      $c_image_tmp = $_FILES['c_image']['tmp_name'];
      $c_ip = getRealIpAddr();

      $insert_customer = "INSERT INTO customers (customer_name,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip ) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip' ) ";

      $run_customer = mysqli_query($con,$insert_customer);

      move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image" );

      //checking is there any product added in the cart

      $sel_cart = "SELECT * FROM cart where ip_add='$c_ip'";

      $run_cart = mysqli_query($con,$sel_cart);

      $check_cart = mysqli_num_rows($run_cart);

      if ($check_cart>0) {
          
          $_SESSION['customer_email'] = $c_email;

          echo "<script>alert('Account created successfully, Thank You!') </script>";

          echo "<script>window.open('checkout.php','_self')</script>";   
      }
      else{

        $_SESSION['customer_email'] = $c_email;

        echo "<script>alert('Account created successfully, Thank You!') </script>";
        echo "<script>window.open('index.php','_self')</script>";

      }


  }


?>