<?php
include("includes/db.php");
//error_reporting(0);

 

  if (isset($_GET['edit_brand'])) {
      

      $brand_id = $_GET['edit_brand'];

      $edit_brand = "SELECT * FROM brands where brand_id = '$brand_id'";

      $run_edit = mysqli_query($con,$edit_brand );

      $row_edit  = mysqli_fetch_array($run_edit);

      $brand_title = $row_edit['brand_title'];

      $brand_edit_id = $row_edit['brand_id'];

    
  }


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

<h4 class="text-center">Edit Brand</h4>
<br>
<br>
	<table class="table">
  <thead>
    <tr>
      <th class="text-right">Edit Brand</th>
      	<td><input type="text" name="brand_title1" value="<?php echo $brand_title; ?>"></td>  
    </tr>
  </thead>

   <tbody>
    <tr>
      
        <td colspan="4" class="text-center"><input type="submit" class="btn btn-outline-light" name="update_brand" value="Update Brand"> </input></td>  
    </tr>
  </tbody>


  
</table>


</form>
</body>
</html>

<?php  
  
  if (isset($_POST['update_brand'])) {
    $brand_title123 = $_POST['brand_title1'];

    $update_brand = "UPDATE  brands SET brand_title = '$brand_title123' where brand_id = '$brand_edit_id' ";

    $run_update = mysqli_query($con,$update_brand);

    if ($run_update) {
       
          
        echo "<script>alert('Brand updated  successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";

      
    }
  }

?>