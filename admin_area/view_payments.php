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
  <h4 class="text-center">View Payments</h4>
    <table class="table">
      <thead>
        <tr>
          <th>Payment No.</th>
          <th>Invoice No</th>
          <th>Amount Paid</th>
          <th>Payment Method</th>
          <th>Ref No.</th>
          <th>Code</th>
          <th>Payment Date</th>
        </tr>  
      </thead>
      <tbody>
      <?php  

      $get_payment = "SELECT * FROM payment";

      $run_payment = mysqli_query($con,$get_payment);
      $i=0;

      while ($row_payments = mysqli_fetch_array($run_payment)) {
          
          $payment_id = $row_payments['payment_id'];
          $invoice_no = $row_payments['invoice_no'];
          $amount = $row_payments['amount'];
          $payment_mode = $row_payments['payment_mode'];
          $ref_no = $row_payments['ref_no'];
          $code = $row_payments['code'];
          $date = $row_payments['payment_date'];
          
          $i++;

      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $invoice_no; ?></td>
          <td><?php echo $amount; ?></td>
          <td><?php echo $payment_mode; ?></td>
          <td><?php echo $ref_no; ?></td>
          <td><?php echo $code; ?></td>
          <td><?php echo $date; ?></td>
        </tr>

        <?php } ?>
      </tbody>
    </table>

</body>
</html>