<!DOCTYPE html>
<html>
<head>
	<title>Payment Option</title>
</head>
<body>
<?php 
	include("includes/db.php");
	//include("function/functions.php");


?>
<div class="container-fluid text-center">
	<h2 >Pyment option for you</h2>

	<?php  

	$ip = getRealIpAddr();

	$get_customer = "SELECT * FROM customers where customer_ip = '$ip'";

	$run_customer = mysqli_query($con,$get_customer);

	$customer = mysqli_fetch_array($run_customer);

	$customer_id = $customer['customer_id'];

	?>


	<a href="http://www.paypal.com"> <img style="width: 200px;" class="rounded mx-auto d-block" src="images/PayPal-and-Mastercardedit.png"></a>
	<a href="order.php?c_id=<?php echo $customer_id; ?>" class='btn btn-dark' style="width: 100%;">Pay Offline</a>
	<small>If you selected "Pay Offline" option then please check your email or account to  find the Invoice NO for your order</small>
</div>

</body>
</html>


