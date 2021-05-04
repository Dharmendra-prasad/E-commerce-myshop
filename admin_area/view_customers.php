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
  <h4 class="text-center">View Customers</h4>
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Image</th>
          <th>Country</th>
          <th>Delete</th>
        </tr>  
      </thead>
      <tbody>
      <?php  

      $get_c = "SELECT * FROM customers ";

      $run_c = mysqli_query($con,$get_c);
      $i=0;

      while ($row_c = mysqli_fetch_array($run_c)) {
          
          $c_name = $row_c['customer_name'];
          $c_id = $row_c['customer_id'];
          $c_email = $row_c['customer_email'];
          $c_image = $row_c['customer_image'];
          $c_country = $row_c['customer_country'];
          
          $i++;

      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $c_name; ?></td>
          <td><?php echo $c_email; ?></td>
          <td><img style="width: 70px;" class="rounded" src="../customer/customer_photos/<?php echo $c_image; ?>"</td>
          <td><?php echo $c_country; ?></td>
          <td><a href="index.php?delete_c=<?php echo $c_id; ?>" class="edit_delete" style="text-decoration: none;color: #fff;">Delete</a></td>
        </tr>

        <?php } ?>
      </tbody>
    </table>

</body>
</html>