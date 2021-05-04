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
  font-size: 15px;
}
//#product{
  float: left;
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
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_products.php">All Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_account.php">My account</a>
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
  	
  	?>

 	
 	<form method="post" action="cart.php" enctype="multipart/form-data"> 

    <div class="container-fluid" id="headline">
      <div id="header">
        <div> 
        <?php 




        //========================run update form button for update price on the top header menu

          if (isset($_POST['update'])) {

        $qty = $_POST['qty'];

       // echo "<pre>";  
        //print_r($qty);
        //echo "<pre>";

        //echo "bro";
        
        foreach ($qty as $key => $value) {



          $insert_qty = "UPDATE cart set qty='$value' where p_id='$key'";

           $run_qty = mysqli_query($con,$insert_qty);


        }
        
        }
    // ================================ SELECTING DATA FROM CART AND ACCESS DATA DETAIL FROM PRODUCT TABLE

      $ip_add = getRealIpAddr();

      //$mysqli = new mysqli("localhost", "root", "Dkprasad" );

    $query="SELECT * FROM cart c INNER JOIN products p ON c.p_id=p.product_id WHERE c.ip_add='$ip_add'";   
          

          $run_pro_price = mysqli_query($con,$query);

          $total = 0;

          while($row = mysqli_fetch_array($run_pro_price)) {

      $product_title = $row['product_title'];
      $product_image = $row['product_img1'];
      $pro_id = $row['p_id'];
      $product_id = $row['p_id'];
      $product_qty = $row['qty'];
      $only_price = $row['product_price'];
      $only_price = $product_qty*$only_price;
      $total +=$only_price;

    }


        // HERE END OF THE UPDATING AND TOTALLING PRICE

        //============================================================


        // CHECKING IS USER LOGIN OR NOT USING SESSION

          if (!isset($_SESSION['customer_email'])) {
            
            echo " Welcome <span style='color:cyan;'>Guest!</span>";
           } 

           else{

            echo " Welcome <span style='color:cyan';> ".$_SESSION['customer_email']."</span>";
           }

        ?> <span style="color: yellow;">Myshop</span>
          Total Items:- <?php item(); ?> | Total Price:-

          <?php 
            //=================ACCESSING TOTAL PRICE 

            $ip_add = getRealIpAddr();

      //global $db;

      $query="SELECT * FROM cart c INNER JOIN products p ON c.p_id=p.product_id WHERE c.ip_add='$ip_add'";   
          

          $run_pro_price = mysqli_query($con,$query);

          $total = 0;

          while($row = mysqli_fetch_array($run_pro_price)) {

      
      $product_qty = $row['qty'];
      $only_price = $row['product_price'];
      $only_price = $product_qty*$only_price;
      $total +=$only_price;

    }
      echo "Rs: " . $total;


      //==================================================

            ?> 
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

      


        
        <table class="table">

  <thead>
    <tr>
      <th scope="col">Remove</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col" class="text-right">Total Price</th>
    </tr>
  </thead>




<?php
  
//=======================updating cart quantity==========
   cart();


      //===HERE AGAIN RUN THE ABOVE UPDATE QUANTITY AND PRICE CODE TO UPDATE FORM FIELD TO SHOE USER 


           if (isset($_POST['update'])) {

        $qty = $_POST['qty'];

       // echo "<pre>";  
        //print_r($qty);
        //echo "<pre>";

        //echo "bro";
        
        foreach ($qty as $key => $value) {



          $insert_qty = "UPDATE cart set qty='$value' where p_id='$key'";

           $run_qty = mysqli_query($con,$insert_qty);


        }
        
        }
    // ================================ SELECTING DATA FROM CART AND ACCESS DATA DETAIL FROM PRODUCT TABLE

      $ip_add = getRealIpAddr();

      //$mysqli = new mysqli("localhost", "root", "Dkprasad" );

    $query="SELECT * FROM cart c INNER JOIN products p ON c.p_id=p.product_id WHERE c.ip_add='$ip_add'";   
          

          $run_pro_price = mysqli_query($con,$query);

          $total = 0;

          while($row = mysqli_fetch_array($run_pro_price)) {

      $product_title = $row['product_title'];
      $product_image = $row['product_img1'];
      $pro_id = $row['p_id'];
      $product_id = $row['p_id'];
      $product_qty = $row['qty'];
      $only_price = $row['product_price'];
      $only_price = $product_qty*$only_price;
      $total +=$only_price;



        

        echo "
        <tbody>
          <tr>
            <td><input type='checkbox' name='remove[]' value='$pro_id'></td>
            <td>
       
              <div id='product'>
                <div class='card' style='width: 10rem; height:10rem'>
                  <h5 class='card-title text-center' >$product_title</h5>
                  
                  <img class='card-img-top' src='admin_area/products_images/$product_image' alt='Card image cap'>
                  <div class='card-body'>
                  </div>
                </div> 

              </div> 

            </td>
        
            <td>
              <input class='form-control form-control-sm' type='text' name= 'qty[".$product_id."]' size='2px' value=$product_qty>
            </td>
            <td class='text-right'> Rs  $only_price </td>
          </tr>
    
          ";

}


//============================================================================
        ?>

        

        </tbody>
  <tbody>
    <tr>
      <td  colspan="3" class="text-right "><b>Sub total</b></td>
      <td  colspan="4" class="text-right "><b><?php echo "Rs ".$total; ?></b></td>
      
    </tr>
  </tbody>

  <tbody>
    <tr>
      <td></td>
    </tr>
  </tbody>
  
  
  <tbody>
    <tr>
     <td   class="text-center "><a href="checkout.php" class="btn btn-dark" role="button">Checkout</a></td>
     <td   class="text-right "></td>
      <td   class="text-center "><button type="submit" name="continue" class="btn btn-dark">Continue Shopping</button></td>
      <td   class="text-right "><button type="submit"  name="update" class="btn btn-dark" >Update cart</button></td>
      
    </tr>
  </tbody>
</table>

      

      </form>

          <?php

          
      //===================DELETING PRODUCT FROM CART================================
      function updatecart(){

        global $con;

        if (isset($_POST['update'])) {
          
          foreach ($_POST['remove'] as $remove_id) {

            $delete_products = "DELETE FROM cart where p_id='$remove_id'";

            $run_delete = mysqli_query($con,$delete_products);

            if ($run_delete) {
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }

          
        }

        if (isset($_POST['continue'])) {
            echo "<script>window.open('index.php','_self')</script>";
          }

        }

        echo @$update_cart = updatecart();


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