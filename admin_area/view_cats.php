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

<h4 class="text-center">View Categories</h4>
<br>
<br>
	<table class="table">
  <thead>
    <tr>
      <th >Category ID</th>
      	<th >Category Title</th> 
        <th >Edit</th>
        <th >Delete</th> 
    </tr>
  </thead>
  <tbody>
  <?php  

    $get_cats = "SELECT *  FROM categories";

    $run_cats = mysqli_query($con,$get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {
      

      $cat_id = $row_cats['cat_id'];

      $cat_title = $row_cats['cat_title'];

  ?>
    <tr>
      <td><?php echo $cat_id; ?></td>
      <td><?php echo $cat_title; ?></td>
      <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>" class="edit_delete" style="text-decoration: none;color: #fff;">Edit</a></td>
      <td><a href="index.php?delete_cat=<?php echo $cat_id; ?>" class="edit_delete" style="text-decoration: none;color: #fff;">Delete</a></td>
    </tr>


    <?php   }   ?>
  </tbody>

   


  
</table>


</form>
</body>
</html>