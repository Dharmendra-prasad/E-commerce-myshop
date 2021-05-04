<?php  

include("includes/db.php");

//session_start();

?>

<form action="" method="post">
<h4 class="text-center">Change your password</h4>
	
	<table class="table">
    
      <tr>
        <th class="text-right">Enter your current password</th>
       <td><input type="Password" name="old_pass" required></td>
      </tr>
   
      <tr>
        <th class="text-right">Enter new password</th>
       <td><input type="Password" name="new_pass" required></td>
      </tr>
   
   
      <tr>
        <th class="text-right">Confirm your password</th>
       <td><input type="Password" name="new_pass_again" required></td>
      </tr>
    
    <tr>
    	
    		<td align="center" colspan="5"><button type="submit" name="change_pass" class="btn btn-dark btn-lg btn-block text-center">Change Password</button></td>
    	
    </tr>

  </table>

</form>

<?php  

$c = $_SESSION['customer_email'];

	if (isset($_POST['change_pass'])) {
		
		$old_pass = $_POST['old_pass'];

		$new_pass = $_POST['new_pass'];

		$new_pass_again = $_POST['new_pass_again'];

		$get_real_pass = "SELECT * from customers where customer_password = '$old_pass'";

		$run_real_pass = mysqli_query($con,$get_real_pass);

		$check_pass = mysqli_num_rows($run_real_pass);

		if ($check_pass == 0) {
			
			echo "<script>alert('Your old Password is inccorect') </script>";
			echo "<script>window.open('my_account.php?change_pass','_self') </script>";
			exit();


		}
		if ($new_pass!=$new_pass_again) {
			
			echo "<script>alert('Your new Password did not match') </script>";
			echo "<script>window.open('my_account.php?change_pass','_self') </script>";
			exit();

		}
		else{

			$update_pass = "UPDATE customers set customer_password = '$new_pass' where customer_email = '$c'";

			$run_pass = mysqli_query($con,$update_pass);

			echo "<script>alert('Your password has been changed!') </script>"; 
			echo "<script>window.open('my_account.php','_self') </script>";

		}
	}

?>