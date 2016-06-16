<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$pi_number = $_POST['pi_number'];
$product_id = $_POST['product_id'];
$item_name = $_POST['item_name'];
$supplier = $_POST['supplier'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$delivered_date = $_POST['delivered_date'];
$approved_by = $_POST['approved_by'];
$quantity_received = $_POST['quantity_received'];


$sql = "SELECT * FROM delivered_items WHERE product_id = '$product_id' AND pi_number='$pi_number'";
$result = $conn->query($sql);
if($result->num_rows > 0){

	$row = $result->fetch_assoc();
	$quantity_received2 = $row['quantity_received'];
	$available_quantity2 = $row['available_quantity'];
	$new_quantity_received = $quantity_received2 + $quantity_received;
	$new_available_quantity = $available_quantity2 + $quantity_received;

	if($quantity_received == $quantity){

		$sql2 = "UPDATE delivered_items SET quantity_received='$new_quantity_received' , available_quantity='$new_available_quantity' WHERE product_id = '$product_id' AND pi_number='$pi_number'";
		if ($conn->query($sql2) === TRUE) {

	$sql3 = "DELETE FROM process_order_delivery WHERE product_id = '$product_id'";

	if($conn->query($sql3) === TRUE){

		$sql4 = "DELETE FROM purchased_items_supplier WHERE pi_number = '$pi_number' AND product_id ='$product_id'";

		if($conn->query($sql4) === TRUE){

		echo "<b>Added!<b/><br/>
    		$item_name<br/>
    		Quantity: $quantity_received<br/>
    		";
    	}


	}

    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



	}else{

		$sql2 = "UPDATE delivered_items SET quantity_received='$new_quantity_received' , available_quantity='$new_available_quantity' WHERE product_id = '$product_id' AND pi_number='$pi_number'";
		if ($conn->query($sql2) === TRUE) {

		$newquantity = $quantity - $quantity_received;

		$sql = "UPDATE process_order_delivery SET quantity='$newquantity' WHERE product_id='$product_id'";

		if($conn->query($sql) === TRUE){

			$sql = "UPDATE purchased_items_supplier SET quantity='$newquantity' WHERE pi_number = '$pi_number' AND product_id ='$product_id'";

			if($conn->query($sql) === TRUE){

			echo "<b>Added!<b/><br/>
	    		$item_name<br/>
	    		Quantity: $quantity_received<br/>
	    		";
	    	}


		}

	    
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}




	

	



}else{

	if($quantity_received == $quantity){

	$sql = "INSERT INTO delivered_items (id, pi_number, product_id, product_name, supplier, description, quantity, delivered_date,approved_by,quantity_received,available_quantity)
VALUES ('', '$pi_number','$product_id','$item_name', '$supplier','$description','$quantity','$delivered_date','$approved_by','$quantity_received','$quantity_received')";

if ($conn->query($sql) === TRUE) {

	$sql = "DELETE FROM process_order_delivery WHERE product_id = '$product_id'";

	if($conn->query($sql) === TRUE){

		$sql = "DELETE FROM purchased_items_supplier WHERE pi_number = '$pi_number' AND product_id ='$product_id'";

		if($conn->query($sql) === TRUE){

		echo "<b>Added!<b/><br/>
    		$item_name<br/>
    		Quantity: $quantity_received<br/>
    		";
    	}


	}

    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}else{

		$sql = "INSERT INTO delivered_items (id, pi_number, product_id, product_name, supplier, description, quantity, delivered_date,approved_by,quantity_received,available_quantity)
	VALUES ('', '$pi_number','$product_id','$item_name', '$supplier','$description','$quantity','$delivered_date','$approved_by','$quantity_received','$quantity_received')";

	if ($conn->query($sql) === TRUE) {

		$newquantity = $quantity - $quantity_received;

		$sql = "UPDATE process_order_delivery SET quantity='$newquantity' WHERE product_id='$product_id'";

		if($conn->query($sql) === TRUE){

			$sql = "UPDATE purchased_items_supplier SET quantity='$newquantity' WHERE pi_number = '$pi_number' AND product_id ='$product_id'";

			if($conn->query($sql) === TRUE){

			echo "<b>Added!<b/><br/>
	    		$item_name<br/>
	    		Quantity: $quantity_received<br/>
	    		";
	    	}


		}

	    
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}

}








$conn->close();
?>