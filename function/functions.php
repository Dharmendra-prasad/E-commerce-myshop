<?php  
	$db = mysqli_connect('localhost','root','','myshop');





		//function for getting id_address

		  function getRealIpAddr()
  {
    if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
    {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
    //to check ip passed from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  	//=============================== creating script for cart

  function cart()
  {
  	if (isset($_GET['add_cart'])) {

  		global $db;

  		$ip_add = getRealIpAddr();

  		$p_id = $_GET['add_cart'];

  		$check_pro = "SELECT * FROM cart where ip_add='$ip_add' AND p_id='$p_id'";

  		$run_check = mysqli_query($db,$check_pro);

  		if(mysqli_num_rows($run_check)>0)
  		{
  			echo "";
  		}
  		else
  		{
  			$q = "insert into cart (p_id,ip_add,qty) values ('$p_id','$ip_add','1')";

  			$run_q = mysqli_query($db,$q);

  			echo "<script> window.open('index.php','_self')</script>";
  		}
  	}
  }

  //GETTING THE DEFAULT FOR THE CUSTOMER

  function getDefault(){

    global $db;

    $c = $_SESSION['customer_email'];

    $get_c = "SELECT * FROM customers customer_email='$c' ";

    $run_c = mysqli_query($db,$get_c);

    $row_c = mysqli_fetch_array($run_c);
      
      $customer_id = $row_c['customer_id'];

         

                  $get_orders = "SELECT * FROM customer_orders where customer_id='$customer_id' AND order_status='pending' ";

                  $run_orders = mysqli_query($db,$get_orders);

                  $count_orders = mysqli_num_rows($run_orders);

                    if ($count_orders>0) {
                    
                        echo "

                        <div>
                        <h2>Important!</h2>
                        <h2>You have $count_orders pending orders</h2>
                        <h2>Please see your orders detail by clicking this <a href='my_account.php?my_orders' class='badge badge-dark'>link</a></h2>
                        </div>  
                        ";

                    }
              
              
    
  }

  	//=============================== gettin number of items form the cart


  function item(){

  	if(isset($_GET['add_cart'])){

  		global $db;

  		$ip_add = getRealIpAddr();

  		$get_items = "SELECT * FROM cart where ip_add='$ip_add'";

  		$run_items = mysqli_query($db,$get_items);

  		$count_items = mysqli_num_rows($run_items);

  	}

  	else
  	{
  		global $db;
  		
  		$ip_add = getRealIpAddr();

  		$get_items = "SELECT * FROM cart where ip_add='$ip_add'";

  		$run_items = mysqli_query($db,$get_items);

  		$count_items = mysqli_num_rows($run_items);
  	}

  	echo $count_items;
  }


    //================================Getting the price of the items from the cart
  function total_price(){

    $ip_add = getRealIpAddr();

      global $db;

  		$query="SELECT * FROM cart c INNER JOIN products p ON c.p_id=p.product_id WHERE c.ip_add='$ip_add'";   
          

          $run_pro_price = mysqli_query($db,$query);

          $total = 0;

          while($row = mysqli_fetch_array($run_pro_price)) {

      
      $product_qty = $row['qty'];
      $only_price = $row['product_price'];
      $only_price = $product_qty*$only_price;
      $total +=$only_price;

    }
  		echo "Rs " . $total;
  }


	//=============================== adding product brom database
	function getPro()
	{

		global $db;

		if (!isset($_GET['cat'])) {
			
		
			if (!isset($_GET['brand'])) {
			
			



        $get_products = "SELECT * FROM products ORDER BY rand() LIMIT 0,6";
        
        $run_products = mysqli_query($db,$get_products);
        
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

        }
      

	}



//=============================== adding product using categories
	function getCatPro()
	{

		global $db;

		if (isset($_GET['cat'])) {
			
		
			$cat_id = $_GET['cat'];
			
			



        $get_cat_products = "SELECT * FROM products where cat_id='$cat_id'";
        
        $run_cat_products = mysqli_query($db,$get_cat_products);

        $count = mysqli_num_rows($run_cat_products);

        if ($count==0) {
        	echo "<h2 class='text-center'>No Product fount in this category!</h2>";
        }
        
        while($row_cat_products = mysqli_fetch_array($run_cat_products))
        {
          $pro_id = $row_cat_products["product_id"];
          $pro_title = $row_cat_products["product_title"];
          $pro_cat = $row_cat_products["cat_id"];
          $pro_brand = $row_cat_products["brand_id"];
          $pro_desc = $row_cat_products["product_desc"];
          $pro_price = $row_cat_products["product_price"];
          $pro_image = $row_cat_products["product_img1"];

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
      

	}



//=============================== adding product using brands

	function getBrandPro()
	{

		global $db;

		if (isset($_GET['brand'])) {
			
		
			$brand_id = $_GET['brand'];
			
			



        $get_brand_products = "SELECT * FROM products where brand_id='$brand_id'";
        
        $run_brand_products = mysqli_query($db,$get_brand_products);

        $count = mysqli_num_rows($run_brand_products);

        if ($count==0) {
        	echo "<h2 class='text-center'>No Product fount in this Brand!</h2>";
        }
        
        while($row_brand_products = mysqli_fetch_array($run_brand_products))
        {
          $pro_id = $row_brand_products["product_id"];
          $pro_title = $row_brand_products["product_title"];
          $pro_cat = $row_brand_products["cat_id"];
          $pro_brand = $row_brand_products["brand_id"];
          $pro_desc = $row_brand_products["product_desc"];
          $pro_price = $row_brand_products["product_price"];
          $pro_image = $row_brand_products["product_img1"];

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
      

	}




//=============================== accessing brand from database

	function getBrands()
	{

global $db;		

$get_brands = "select * from brands";

$run_brands = mysqli_query($db,$get_brands);

while($row_brands = mysqli_fetch_array($run_brands)){

    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];


      echo "<li class='nav-item'>
       <a class='nav-link' href='index.php?brand=$brand_id'>$brand_title</a>
      </li>";
    
     }

	}




//=============================== accessing categories from database

	function getCats()
	{
		global $db;
		
		$get_cats = "select * from categories";

$run_cats = mysqli_query($db,$get_cats);

while($row_cats = mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];


      echo "<li class='nav-item'>
       <a class='nav-link' href='index.php?cat=$cat_id'>$cat_title</a>
      </li>";
    
     }
	}



?>
