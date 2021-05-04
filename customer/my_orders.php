<?php  

include("includes/db.php");



		$c = $_SESSION['customer_email'];

	    $get_c = "SELECT * FROM customers where customer_email='$c' ";

	    $run_c = mysqli_query($con,$get_c);

	    $row_c = mysqli_fetch_array($run_c);
      
      	$customer_id = $row_c['customer_id'];


?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Order No</th>
      <th scope="col">Product Amount</th>
      <!--<th scope="col">Due Amount</th>-->
      <th scope="col">Invoice No</th>
      <th scope="col">Total Products</th>
      <th scope="col">Order Date</th>
      <th scope="col">Paid/Unpaid</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php

  //==================================accessing data from customer orders to show their pending orders

  $get_orders = "SELECT * FROM customer_orders where customer_id='$customer_id'";

  $run_orders = mysqli_query($con,$get_orders);

  $i=0;

  $total_price=0;



  while ($row_orders = mysqli_fetch_array($run_orders)){

  	$order_id = $row_orders['order_id'];
  	$product_amount = $row_orders['product_amount'];
  	$due_amount = $row_orders['due_amount'];
  	$invoice_no = $row_orders['invoice_no'];
  	$total_products = $row_orders['total_products'];
  	$order_date = $row_orders['order_date'];
  	$order_status = $row_orders['order_status'];

  	$total_price +=$product_amount;

  	$i++;

  	  	if ($order_status=="pending") {
  		
  		$order_status = "Unpaid";

  	}

  	else{

  		$order_status = "Paid";
}

  	echo "

  				<tr>
			      <th scope='row' class='text-center'>$i</th>
			      <td class='text-center'>$product_amount</td>
			     <!-- <td class='text-center'>$total_price</td>-->
			      <td class='text-center'>$invoice_no</td>
			      <td class='text-center'>$total_products</td>
			      <td class='text-center'>$order_date</td>
			      <td class='text-center'>$order_status</td>
			      <td class='text-center'><a href='confirm.php?order_id=$order_id' style='text-decoration:none;' target='_blank'>Confirm If Paid</td>
			    </tr>

  	";


  }
  
  echo "<tr><td class='text-center' colspan='2'><b>Total amount: </b> <strong> Rs ".$total_price."</strong></td></tr>";	
?>
    
  </tbody>
</table>