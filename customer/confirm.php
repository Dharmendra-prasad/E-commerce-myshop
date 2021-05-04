<?php

session_start();
include("includes/db.php");
include("function/functions.php");

	if (isset($_GET['order_id'])) {
		
		$order_id = $_GET['order_id'];

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Confirmation</title>
</head>

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
  	body{
  background-color: #fff;
  font-family: 'Maven Pro', sans-serif;
}
  </style>
<body>

<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post"> 
<h2 class="text-center">Please Confirm Your Order</h2>
	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Invoice No:</th>
     <td><input type="text"  name="invoice_no"></td>	
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Amount sent:</th>
     <td><input type="text"  name="amount"></td>	
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Select payment mode:</th>
     <td><select name="payment_mode">
     	<option>Select payment</option>
     	<option>Bank transfer</option>
     	<option>Easy paisa</option>
     	<option>paypal</option>
     </select></td>	
    </tr>
  </thead>
<thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Transaction/Reffrence ID:</th>
     <td><input type="text"  name="tr"></td>	
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Easy paisa/UBL OMNI code:</th>
     <td><input type="text"  name="code"></td>	
    </tr>
  </thead>

  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Payment Date:</th>
     <td><input type="text"  name="date"></td>	
    </tr>
  </thead>
  
  
    <tr >
     <td align="center" colspan="5"><button type="submit" name="confirm" class="btn btn-dark btn-lg btn-block text-center">Confirm Payment</button></td>
    </tr>
  
</table>
</form>

</body>
</html>

<?php
		if (isset($_POST['confirm'])) {

			$update_id = $_GET['update_id'];
			$invoice = $_POST['invoice_no'];
			$amount = $_POST['amount'];
			$payment = $_POST['payment_mode'];
			$ref_no = $_POST['tr'];
			$code = $_POST['code'];
			$date = $_POST['date'];
			
			$insert_payment = "INSERT INTO payment (invoice_no,amount,payment_mode,ref_no,code,payment_date)values('$invoice','$amount','$payment','$ref_no','$code','$date')";

			$run_payment = mysqli_query($con,$insert_payment);


      $update_order = "UPDATE customer_orders set order_status='complete' where order_id='$update_id'";

      $run_order = mysqli_query($con,$update_order);

      $update_pending_order = "UPDATE pending_orders set order_status='complete' where customer_pending_id='$update_id'";

      $run_pending_order = mysqli_query($con,$update_pending_order);

			if ($run_payment) {
				
				echo "<h2>Payment Recived, Your order will be completed within 24 hours.</h2>";

			}

			

			
		}

?>