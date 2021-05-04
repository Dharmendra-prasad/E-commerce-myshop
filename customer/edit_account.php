<?php
session_start();

include("includes/db.php");

if (isset($_GET['edit_account'])) {
	
	$customer_email = $_SESSION['customer_email'];

	$get_customer = "SELECT * FROM customers where customer_email='$customer_email'";

	$run_customer = mysqli_query($con,$get_customer);

	$row = mysqli_fetch_array($run_customer);

	$id = $row['customer_id'];
	$name = $row['customer_name'];
	$email = $row['customer_email'];
	$pass = $row['customer_password'];
	$country = $row['customer_country'];
	$city = $row['customer_city'];
	$contact = $row['customer_contact'];
	$address = $row['customer_address'];
	$image = $row['customer_image'];

}

?>

	<form action="" method="post" enctype='multipart/form-data'> 
<h2 class="text-center">Update Your Account</h2>
	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Customer Name:</th>
     <td><input type="text"  name="c_name" value="<?php echo $name; ?>"></td>	
    </tr>
  </thead>
  <thead class="thead-light">
   <tr>
      <th scope="col" class="text-right">Customer Email:</th>
     <td><input type="text"  name="c_email" value="<?php echo $Email; ?>"></td>	
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Customer Password:</th>
     <td><input type="Password"  name="c_pass" value="<?php echo $pass; ?>"></td>	
    </tr>
  </thead>
<thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Customer Country:</th>
     <td><select name="c_country" disabled>
     	<option value="<?php echo $country; ?>"><?php echo $country; ?></option>
     	<option>India</option>
     	<option>Pakistan</option>
     	<option>UAE</option>
     	<option>USA</option>
     </select></td>	
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Customer Contact:</th>
     <td><input type="text"  name="c_contact" value="<?php echo $contact; ?>"></td>	
    </tr>
  </thead>

  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Customer City:</th>
     <td><input type="text"  name="c_city" value="<?php echo $city; ?>"></td>	
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Customer Address:</th>
     <td><input type="text"  name="c_address" value="<?php echo $address; ?>"></td>	
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col" class="text-right">Customer Image:</th>
     <td><input type="file"  name="c_image" value="<?php echo $image; ?>"></td>	
    </tr>
  </thead>
  
  
    <tr >
     <td align="center" colspan="5"><button type="submit" name="update" class="btn btn-dark btn-lg btn-block text-center">Update</button></td>
    </tr>
  
</table>
</form>

<?php
	if (isset($_POST['update'])) {
			
			$update_id = $id;
			$c_name = $_POST['c_name'];
			$c_email = $_POST['c_email'];
			$c_pass = $_POST['c_pass'];
			$c_city = $_POST['c_city'];
			$c_contact = $_POST['c_contact'];
			$c_address = $_POST['c_address'];
			$c_image = $_FILES['c_image']['name'];
			$c_image_tmp = $_FILES['c_image']['tmp_name'];

			move_uploaded_file($c_image_tmp, "customer_photos/$c_image");
			

			$update_c = "UPDATE customers SET customer_name = '$c_name',customer_email = '$c_email',customer_password = '$c_pass',customer_city = '$c_city',customer_contact = '$c_contact',customer_address = '$c_address',customer_image = '$c_image' where customer_id = '$update_id' ";

			$run_c = mysqli_query($con , $update_c);

			if ($run_c) {
				
				echo "<script>alert('Your account has been updated!')</script>";
				echo "<script>window.open('my_account.php','_self')</script>";

			}


	}
?>