<?php
include("includes/db.php");

//error_reporting(0);

//===============================getting the specific product=======================
if (isset($_GET['edit_pro'])) {
    
    $edit_id = $_GET['edit_pro'];

    $get_edit = "SELECT * FROM products where product_id = '$edit_id'" ;

    $run_edit = mysqli_query($con,$get_edit);

    $row_edit = mysqli_fetch_array($run_edit);

    $update_id = $row_edit['product_id'];
    $p_title = $row_edit['product_title'];
    $cat_id = $row_edit['cat_id'];
    $brand_id = $row_edit['brand_id'];
    $p_img1 = $row_edit['product_img1'];
    $p_img2 = $row_edit['product_img2'];
    $p_img3 = $row_edit['product_img3'];
    $p_price = $row_edit['product_price'];
    $p_desc = $row_edit['product_desc'];
    $p_keywords = $row_edit['product_keywords'];

}

//=============================getting specific product category title from category table============

  $get_cat = "select * from categories where cat_id='$cat_id'";

  $run_cat = mysqli_query($con,$get_cat);

  $cat_row = mysqli_fetch_array($run_cat);

  $cat_edit_title = $cat_row['cat_title'];

  //=============================getting specific product brand title from brand table============

  $get_brand = "select * from brands where brand_id='$brand_id'";

  $run_brand = mysqli_query($con,$get_brand);

  $brand_row = mysqli_fetch_array($run_brand);

  $brand_edit_title = $brand_row['brand_title'];

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
<form action="" method="post" enctype="multipart/form-data">
<h3 class="text-center">Update or edit product</h3>
	<table class="table">
  
  <thead>
    <tr>
      <th class="text-right">Product Title</th>
      	<td><input type="text" name="product_title" value="<?php echo $p_title; ?> "></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Category</th>
      	<td>
      		<select name="product_cat">
      			<option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>

      			<?php

$get_cats = "select * from categories";

$run_cats = mysqli_query($con,$get_cats);

while($row_cats = mysqli_fetch_array($run_cats)){

		$cats_id = $row_cats['cat_id'];
		$cats_title = $row_cats['cat_title'];


      echo "<option value='$cats_id'>$cats_title</option>";
    
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
      		<option value="<?php echo $brand_id; ?>"><?php echo $brand_edit_title; ?></option>

      		<?php

$get_brands = "select * from brands";

$run_brands = mysqli_query($con,$get_brands);

while($row_brands = mysqli_fetch_array($run_brands)){

		$brands_id = $row_brands['brand_id'];
		$brands_title = $row_brands['brand_title'];


      echo "<option value='$brands_id'>$brands_title</option>";
    
     }
?>
      	</select></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Image 1</th>
      	<td><input type="file" name="product_img1"><img class="rounded" style="width: 50px;" src="products_images/<?php echo $p_img1;?>"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Image 2</th>
      	<td><input type="file" name="product_img2"><img class="rounded" style="width: 50px;" src="products_images/<?php echo $p_img2;?>"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Image 3</th>
      	<td><input type="file" name="product_img3"><img class="rounded" style="width: 50px;" src="products_images/<?php echo $p_img3;?>"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Price</th>
      	<td><input type="text" name="product_price" value="<?php echo $p_price; ?>"></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right align-middle">Product Description</th>
      	<td><textarea name="product_desc" cols="34" rows="6" ><?php echo $p_desc; ?></textarea></td>  
    </tr>
  </thead>

  <thead>
    <tr>
      <th class="text-right">Product Keyword</th>
      	<td><input type="text" name="product_keywords" value="<?php echo $p_keywords; ?>"></td>  
    </tr>
  </thead>

  <tbody class="tbody-dark">
    <tr>
      
      	<td colspan="4" class="text-center"><input type="submit" class="btn btn-outline-light" name="update_product" value="Update Product"></input></td>  
    </tr>
  </tbody>
  
</table>


</form>

</body>
</html>

<?php  

include("includes/db.php");

	

	if(isset($_POST['update_product'])){
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



		if($product_img1=='')
		{
			echo "<script>alert('please select at least one image!')</script>";
			exit();
		}

		else
		{	
			
		//inser images to its folder
			move_uploaded_file($temp_name1,"products_images/".$product_img1);
			move_uploaded_file($temp_name2,"products_images/".$product_img2);
			move_uploaded_file($temp_name3,"products_images/".$product_img3);


			//update data query



			$update_product = "UPDATE products SET cat_id= '$product_cat',brand_id='$product_brand',date =NOW(),product_title = '$product_title',product_img1 = '$product_img1',product_img2 = '$product_img2',product_img3 = '$product_img3',product_price = '$product_price',product_desc='$product_desc', product_keywords = '$product_keywords' where product_id ='$update_id'  ";

			$run_product = mysqli_query($con,$update_product);

			if($run_product)
			{
				echo "<script>alert('product updated  successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
			}
			

		}
	}

?>
