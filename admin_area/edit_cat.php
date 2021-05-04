<?php
include("includes/db.php");
//error_reporting(0);

 

  if (isset($_GET['edit_cat'])) {
      

      $cat_id = $_GET['edit_cat'];

      $edit_cat = "SELECT * FROM categories where cat_id = '$cat_id'";

      $run_edit = mysqli_query($con,$edit_cat );

      $row_edit  = mysqli_fetch_array($run_edit);

      $cat_title = $row_edit['cat_title'];

      $cat_edit_id = $row_edit['cat_id'];

    
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

<h4 class="text-center">Edit Category</h4>
<br>
<br>
	<table class="table">
  <thead>
    <tr>
      <th class="text-right">Edit Category</th>
      	<td><input type="text" name="cat_title1" value="<?php echo $cat_title; ?>"></td>  
    </tr>
  </thead>

   <tbody>
    <tr>
      
        <td colspan="4" class="text-center"><input type="submit" class="btn btn-outline-light" name="update_cat" value="Update Category"> </input></td>  
    </tr>
  </tbody>


  
</table>


</form>
</body>
</html>

<?php  
  
  if (isset($_POST['update_cat'])) {
    $cat_title123 = $_POST['cat_title1'];

    $update_cat = "UPDATE  categories SET cat_title = '$cat_title123' where cat_id = '$cat_edit_id' ";

    $run_update = mysqli_query($con,$update_cat);

    if ($run_update) {
       
          
        echo "<script>alert('Category updated  successfully')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";

      
    }
  }

?>