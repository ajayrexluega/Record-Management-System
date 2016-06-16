<?php
$conn = new mysqli('localhost','root','','rmsdb');

if($conn->connect_error){
	die("Connection Failed:" . $conn->connect_error);
}




if(isset($_POST['or_number'])){
	$or_number = $_POST['or_number'];
	$sql = "SELECT * FROM purchased_item WHERE or_number = '$or_number'";
$result = $conn->query($sql);
if($result->num_rows > 0 ){
	echo "<div id='table-scroll'>
      <div id='table-wrapper'>
      <table id='table12'>
                <thead id='top'>
			<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Description</th>
			<th>Quantity</th>
			<th>Sub Total</th>
			</tr>
			</thead><tbody>";
			while ($row = $result->fetch_assoc()) {
				$pid = $row['product_id'];
				$product_name = $row['product_name'];
				$description = $row['description'];
				$quantity = $row['quantity'];
				$total_amount = $row['total_amount'];

				echo "<tr>
						<td>" . $pid . "</td>
						<td>" . $product_name . "</td>
						<td>" . $description . "</td>
						<td>" . $quantity . "</td>
						<td>" . $total_amount . "</td>
						</tr>";
			}
			echo "</tbody></table>
					</div>
					</div>";

}else{
	echo "<script>window.location.replace('#/');window.location.replace('#/salesReport');</script>";
}

}else{
	echo "WALA!";
}


$conn->close();