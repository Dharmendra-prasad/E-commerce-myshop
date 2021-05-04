<?php  
	@session_start();

	include("includes/db.php");
	//include("function/functions.php");
?>

<div>
		<!-- Default form login -->
		<div class="container-fluid" align="center">
<form action="checkout.php" method="post" style="width:400px;" class="text-left">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="c_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entil">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="c_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
   
 	<a href="checkout.php?forgot_pass" class="form-text text-muted" style="text-decoration: none;">Forgot Password</a>
    <br>
  
  <button type="submit" name="c_login" class="btn btn-dark">Submit</button>

</form>
<br>
<br>
<?php 
	if (isset($_GET['forgot_pass'])) {
		echo "

		<div class='text-center'>
		<form action='' method='post'>
		<div class='input-group mb-3'>
  			<input type='email' class='form-control' placeholder='Enter email' aria-label='Recipient's username' aria-describedby='basic-addon2' name='c_email' required>
  				<div class='input-group-append'>
    		<button class='btn btn-outline-dark' type='submit' name='forgot_pass'>Send Password</button>
  		</div>
		</div>

		</form>
		</div>

		";


		if (isset($_POST['forgot_pass'])) {
			$c_email = $_POST['c_email'];
			$sel_c = "SELECT * from customers where customer_email='$c_email'";

			$run_c = mysqli_query($con,$sel_c);

			$check_c = mysqli_num_rows($run_c);

			$row_c = mysqli_fetch_array($run_c);

			$name_c = $row_c['customer_name'];

			$pass_c = $row_c['customer_password'];

			if ($check_c==0) {
				echo "<script>alert('This is invalid Email')</script>";
				exit();

			}
			else{
					$from = 'admin@gmail.com';
					$subject = 'Your Password';
					$message = " 
					<html>
					<h3>Dear $name_c</h3>
					<p>You requested for your Password at www.myshop.com</p>
					<b>Your Password is <span style='color:red;'>$</span></b>
					<h3>Thankyou for visiting our website</h3>
					</html>
					";

					mail($c_email,$subject,$message,$from);

					echo "<script>alert('Password is sent to your email!')</script>";
					echo "<script>window.open('checkout.php','_self')</script>";
			}
		}
	}
 ?>


</div> 
<br>
	<a href="customer_register.php" class='btn btn-dark' style="width: 100%;">New Register Here</a>
<!-- Default form login -->
</div> 
<?php 

	if (isset($_POST['c_login'])) {
		$customer_email = $_POST['c_email'];
		$customer_pass = $_POST['c_pass'];

		$sel_customer = "SELECT * FROM customers where customer_email='$customer_email' AND customer_password='$customer_pass' ";

		$run_customer = mysqli_query($con,$sel_customer);

		$check_customer = mysqli_num_rows($run_customer);

		$get_ip = getRealIpAddr();

		$sel_cart = "SELECT * FROM cart where ip_add='$get_ip'";

		$run_cart = mysqli_query($con,$sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if ($check_customer==0) {

			echo "<script>alert('password or email is not correct.') </script>";
				exit();
		}

		if ($check_customer==1 AND $check_cart==0) {

			$_SESSION['customer_email'] = $customer_email;

			//echo "<script>alert('you hace to login first!')</script>";

			echo "<script>window.open('customer/my_account.php','_self')</script>";
		}

		else{

			$_SESSION['customer_email'] = $customer_email;

			echo "<script>alert('you successfully loged in. Ready to order.')</script>";

			include("customer/payment_option.php");

		}

	}




/* $check_customer = mysqli_num_rows($run_customer);

		$get_ip = getRealIpAddr();

		$sel_cart = "SELECT * FROM cart where ip_add='$get_ip'";

		$run_cart = mysqli_query($con,$sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if ($check_customer==0) {
				
				echo "<script>alert('password or email is not correct.') </script>";
				exit();
		}

		if ($check_customer==1 AND $check_cart==0) {

			$_SESSION['customer_email']=$customer_email;
			
			echo "<script>window.open('customer/my_account.php','_self')</script>"

		}

		else{


			$_SESSION['customer_email']=$customer_email;

			echo "<script>window.open('payment_option.php','_self')</script>";
		}

	} */

?>	