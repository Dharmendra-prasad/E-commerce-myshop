<?php  

	include("includes/db.php");
	include("function/functions.php");



	//getting customer id


	if (isset($_GET['c_id'])) {
		
		$customer_id = $_GET['c_id'];

		$c_email = "SELECT * customers where customer_id = '$customer_id'";



		$run_email = mysqli_query($con,$c_email);

		$row_email = mysqli_fetch_array($run_email);

		$customer_emial = $row_email['customer_email'];

		$customer_name = $row_email['customer_name'];

	}

	//getting product price & number of items


	$ip_add = getRealIpAddr();

     // global $db;

  		$query="SELECT * FROM cart c INNER JOIN products p ON c.p_id=p.product_id WHERE c.ip_add='$ip_add'"; 	 
          
          $run_pro_price = mysqli_query($con,$query);

          $total = 0;

          $status = 'pending';

          $invoice_no = mt_rand();

          $count_pro = mysqli_num_rows($run_pro_price);

          //$count_pro = 1;

          $product_total_qty = 0;

          $i=0;

          while($row = mysqli_fetch_array($run_pro_price)) {


      //$product_name = $row['product_title'];
      $product_title = $row['product_title'];
      $product_image = $row['product_img1'];
      $pro_id = $row['p_id'];
      $product_id = $row['p_id'];



      $product_qty = $row['qty'];
     // $product_many_qty = $product_qty;
     // $product_many_qty = $product_qty+$product_many_qty;
      //$product_total_qty = $product_total_qty+$product_qty;


      $only_price = $row['product_price'];
      $product_actual_price = $only_price;
      $only_price = $product_qty*$only_price;
      
      $total +=$only_price;


		$insert_order = "INSERT INTO customer_orders (customer_id,due_amount,product_amount,invoice_no,total_products,order_date,order_status) values ('$customer_id','$total','$only_price','$invoice_no','$count_pro',NOW(),'$status') ";


		$run_order = mysqli_query($con,$insert_order);




      $insert_to_pending_orders = "INSERT INTO pending_orders (customer_id,invoice_no,product_id,qty,order_status) values ('$customer_id','$invoice_no','$pro_id','$product_qty','$status') ";

			$run_pending_order = mysqli_query($con,$insert_to_pending_orders);

			$i++;

    }
 
    
	//    echo $product_qty;

	//GETTING QUANTITY FORM THE CART

		$get_cart = "SELECT * FROM cart";

		$run_cart = mysqli_query($con,$get_cart);

		$get_qty = mysqli_fetch_array($run_cart);

		$qty = $get_qty['qty'];

		if($product_qty==0){

			//$qty = 1;

			$product_qty = 1;

			$total = $product_actual_price;
		}

		else{

			//$qty = $qty;

			$product_qty = $product_qty;

			//$sub_total = $product_actual_price*$qty;

			$total;
		}

		



		
		
			
			echo "<script>alert('Order successfully submitted, Thanks!') </script>";
			echo "<script>window.open('customer/my_account.php','_self')</script>";

			

			

		

			$empty_cart = "DELETE FROM cart where ip_add = '$ip_add'";

			$run_empty = mysqli_query($con,$empty_cart );

			// mailing to customer=============================

			$from = 'mysite@acedmy.com';

			$subject = 'order detail';

			$message = "

			<html>
			<p>Hello <span style='color:blue'>$customer_name;</span> you have ordered some products on our website mysite.com, please find your order details below and pay the dues as soon as possible,  so we can proceed your order. Thank You</p>
			<h2 class='text-center'>Your order from mysite.com</h2>
				<table class='table'>
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Invoice No.</th>
						
					<tr>
				</thead>

				<tbody>
					<tr>
						<td>$i;</td>
						<td>$product_title;</td>
						<td>$product_qty;</td>
						<td>$total;</td>
						<td>$invoice_no;</td>
						
					</tr>
				</tbody>
				</table>
				<h3>please go to account and pay the dues</h3>
				<h2><a href='www.mysite.com'>Click here</a> to log in  to your account</h2>
				<p>Thank You for order on - www.mysite.com</p>


			</html>

			";


			mail($customer_email, $subject, $message,$from);

		
		

?>