<?php  
include("includes/db.php");
if (isset($_GET['delete_c'])) {
	$delete_id = $_GET['delete_c'];

	$delete_c = "DELETE FROM customers where customer_id = '$delete_id'";

	$run_delete = mysqli_query($con,$delete_c);

	if ($run_delete) {
		
		echo "<script>alert('Customer deleted successfully')</script>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";
	}
}

?>