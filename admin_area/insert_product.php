<?php
include("includes/db.php");
//error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin pannel</title>

	<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

  <style type="text/css">
    
    .list-group-item {
background-color: transparent;
//border-top: 1px solid #ddd;
//border-radius: 0;
color: #fff;
}
  </style>

</head>
<body>
<form action="insert_product.php" method="post" enctype="multipart/form-data">


	<table class="table">
  <thead>
    <tr>
      <th class="text-center" colspan="4"><h3>Insert New Product:</h3></th>
      
    </tr>
  </thead>
  <thead>
    <tr>
      <th class="text-right">Product Title</th>
      	<td><input type="text" name="product_title"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Category</th>
      	<td>
      		<select name="product_cat">
      			<option >Select Category</option>

      			<?php

$get_cats = "select * from categories";

$run_cats = mysqli_query($con,$get_cats);

while($row_cats = mysqli_fetch_array($run_cats)){

		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];


      echo "<option value='$cat_id'>$cat_title</option>";
    
     }
?>
      		</select>
      	</td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Brand</th>
      	<td><select name="product_brand">
      		<option>Select Brands</option>

      		<?php

$get_brands = "select * from brands";

$run_brands = mysqli_query($con,$get_brands);

while($row_brands = mysqli_fetch_array($run_brands)){

		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];


      echo "<option value='$brand_id'>$brand_title</option>";
    
     }
?>
      	</select></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Image 1</th>
      	<td><input type="file" name="product_img1"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Image 2</th>
      	<td><input type="file" name="product_img2"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Image 3</th>
      	<td><input type="file" name="product_img3"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Price</th>
      	<td><input type="text" name="product_price"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right align-middle">Product Description</th>
      	<td><textarea name="product_desc" cols="34" rows="6"></textarea></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Keyword</th>
      	<td><input type="text" name="product_keywords"></td>  
    </tr>
  </thead>

  <tbody class="tbody-dark">
    <tr>
      
      	<td colspan="4" class="text-center"><input type="submit" class="btn btn-outline-light" name="insert_product"></input></td>  
    </tr>
  </tbody>
  
</table>


</form>
</body>
</html>

<?php  

include("includes/db.php");

	

	if(isset($_POST['insert_product'])){
		//text data variables
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$status = 'on';
		$product_keywords = $_POST['product_keywords'];

		//image name

		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];

		//image temp names

		$temp_name1 = $_FILES['product_img1']['tmp_name'];
		$temp_name2 = $_FILES['product_img2']['tmp_name'];
		$temp_name3 = $_FILES['product_img3']['tmp_name'];

		//image type
		$type_name1 = $_FILES['product_img1']['type'];
		$type_name2 = $_FILES['product_img2']['type'];
		$type_name3 = $_FILES['product_img3']['type'];



		if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_img1=='')
		{
			echo "<script>alert('please fill all the field')</script>";
			exit();
		}

		else
		{	
			
		//inser images to its folder
			move_uploaded_file($temp_name1,"products_images/".$product_img1);
			move_uploaded_file($temp_name2,"products_images/".$product_img2);
			move_uploaded_file($temp_name3,"products_images/".$product_img3);


			//inserting data query

			$insert_product = "INSERT INTO products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keywords,status) values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keywords','$status')";

			$run_product = mysqli_query($con,$insert_product);

			if($run_product)
			{
				echo "<script>alert('product inserted  successfully')</script>";
        echo "<script>window.open('index.php?insert_product','_self')</script>";
			}
			

		}
	}

?>
