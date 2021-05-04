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
  	.list-group-item {
background-color: transparent;
//border-top: 1px solid #ddd;
//border-radius: 0;
color: #fff;
}
.edit_delete:hover{
	font-size: 15px;
	transition: 0s;
}
  </style>

</head>
<body>

<div class="container">
  <h2 class="text-center">View All Products</h2>

   <?php
   if (isset($_GET['view_products'])) { ?>
                   
  <table class="table">
    <thead>
      <tr>
        <th>Product Id</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php  

    	include("includes/db.php");

    	$i = 0;

    	$get_pro = "SELECT * from products";

    	$run_pro = mysqli_query($con,$get_pro);

    	while ($row_pro = mysqli_fetch_array($run_pro)) {
    		
    		$p_id = $row_pro['product_id'];
    		$p_title = $row_pro['product_title'];
    		$p_img = $row_pro['product_img1'];
    		$p_price = $row_pro['product_price'];
    		$p_id = $row_pro['product_id'];
    		$p_id = $row_pro['product_id'];
    		$p_status = $row_pro['status'];

    		$i++;

    	

    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $p_title; ?></td>
        <td><img style="width: 50px;" class="rounded" src="products_images/<?php echo $p_img; ?>"</td>
        <td><?php echo $p_price; ?></td>
        <td>
        		<?php
        		
        		$get_sold = "SELECT * FROM pending_orders where product_id = '$p_id' ";

        		$run_sold = mysqli_query($con,$get_sold );

        		$count = mysqli_num_rows($run_sold);

        		echo $count;

        	?>
        </td>
        <td><?php echo $p_status; ?></td>
        <td><a href="index.php?edit_pro=<?php echo $p_id; ?> " class="edit_delete" style="text-decoration: none;color: #fff;">Edit</a></td>
        <td><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>" class="edit_delete" style="text-decoration: none;color: #fff;">Delete</a></td>
        
      </tr>
      <?php 

  }

       ?>
      
    </tbody>
  </table>

  <?php 

	} 

  ?>
</div>

</body>
</html>
