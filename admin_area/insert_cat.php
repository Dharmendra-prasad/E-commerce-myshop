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
<form action="" method="post" enctype="multipart/form-data">

<h4 class="text-center">Insert New Category</h4>
<br>
<br>
	<table class="table">
  <thead>
    <tr>
      <th class="text-right">Insert New Category</th>
      	<td><input type="text" name="cat_title" placeholder="Insert Category"></td>  
    </tr>
  </thead>

   <tbody>
    <tr>
      
        <td colspan="4" class="text-center"><input type="submit" class="btn btn-outline-light" name="insert_cat"></input></td>  
    </tr>
  </tbody>


  
</table>


</form>
</body>
</html>
<?php 

  if (isset($_POST['insert_cat'])) {
      

      $cat_title = $_POST['cat_title'];

      $insert_cat = "INSERT INTO categories (cat_title) values ('$cat_title')";

      $run_cat = mysqli_query($con,$insert_cat );

      if ($run_cat) {
          
        echo "<script>alert('New category inserted  successfully')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";

      }


  }

 ?>