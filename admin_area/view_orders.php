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
  <h4 class="text-center">View Orders</h4>
    <table class="table">
      <thead>
        <tr>
          <th>Order No.</th>
          <th>Customer</th>
          <th>Invoice NO.</th>
          <th>Product ID</th>
          <th>Quantity</th>
          <th>Status</th>
          <th>Delete</th>
        </tr>  
      </thead>
      <tbody>
      <?php  

      $get_order = "SELECT * FROM pending_orders ";

      $run_order = mysqli_query($con,$get_order);
      $i=0;

      while ($row_order = mysqli_fetch_array($run_order)) {
          
          $order_id = $row_order['customer_pending_id'];
          $c_id = $row_order['customer_id'];
          $invoice = $row_order['invoice_no'];
          $p_id = $row_order['product_id'];
          $qty = $row_order['qty'];
          $status = $row_order['order_status'];
          
          $i++;

      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php 

          $get_customer = "SELECT * FROM customers where customer_id = '$c_id'";
          $run_customer = mysqli_query($con,$get_customer);
          $row_customer = mysqli_fetch_array($run_customer);

          $customer_email = $row_customer['customer_email'];

           

          echo $customer_email;

          ?></td>
          <td><?php echo $invoice; ?></td>
          <td><?php echo $p_id; ?></td>
          <td><?php echo $qty; ?></td>
          <td><?php


              if ($status == 'pending') {
                  
                 echo $status = 'pending';
              }

              else{

              echo $status;

            }
          ?></td>
          <td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>" class="edit_delete" style="text-decoration: none;color: #fff;">Delete</a></td>
        </tr>

        <?php } ?>
      </tbody>
    </table>

</body>
</html>