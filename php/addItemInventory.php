<?php
error_reporting(0);
	
	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$supplier = $_POST['supplier'];
    $available_stocks = $_POST['available_stocks'];
    $description = $_POST['description'];
    $price = number_format($_POST['price'],2);
    $quantity = $_POST['quantity'];
    $available_quantity = $_POST['available_quantity'];
	$pi_number = $_POST['pi_number'];
    
    
	

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "rmsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(empty($product_id)){

	echo "Please, Fill All Fields.";
	$conn->close();
}

$sql = "SELECT * FROM inventory WHERE product_id ='$product_id'";
$result = $conn->query($sql);
if($result->num_rows > 0 ){

	 while($row = $result->fetch_assoc()) {
		$old_stocks = $row['available_stocks'];
		$new_aStocks = $old_stocks + $quantity;


	$sql2 = "UPDATE inventory SET available_stocks = '$new_aStocks', stock_in = '$quantity' WHERE product_id = '$product_id'";
	if($conn->query($sql2) === TRUE){
		echo "$product_name" . "'s total stocks: " . $new_aStocks;
	}else{
		echo "Error: " . $conn->error;
	}
	 }
	
	
	
	
	$sql3 = "SELECT * FROM delivered_items WHERE product_id = '$product_id' AND pi_number = '$pi_number'";
	$result2 = $conn->query($sql3);
	if($result2->num_rows > 0){
		
		while($row2 = $result2->fetch_assoc()){
			
			$available_quantityD = $row2['available_quantity'];
			$new_aQuantity = $available_quantityD - $quantity;
			
			$sql4 = "UPDATE delivered_items SET available_quantity = '$new_aQuantity' WHERE product_id='$product_id' AND pi_number='$pi_number'";
			$execupdate = $conn->query($sql4);
			
			
		}
		
	}
	
	 


}else{

	if(empty($price)){

		echo "Selling Price field is required.";
	}else{

		$sql = "INSERT INTO inventory (inventory_id,product_id, product_name, stock_in,available_stocks,description,price)
VALUES ('','$product_id','$product_name', '$quantity', '$quantity', '$description','$price')";

if ($conn->query($sql) === TRUE) {
	
	
	$sql3 = "SELECT * FROM delivered_items WHERE product_id = '$product_id' AND pi_number = '$pi_number'";
	$result2 = $conn->query($sql3);
	if($result2->num_rows > 0){
		
		while($row2 = $result2->fetch_assoc()){
			
			$available_quantityD = $row2['available_quantity'];
			$new_aQuantity = $available_quantityD - $quantity;
			
			$sql4 = "UPDATE delivered_items SET available_quantity = '$new_aQuantity' WHERE product_id='$product_id' AND pi_number='$pi_number'";
			$execupdate = $conn->query($sql4);
			
			
		}
		
	}
	

    
    echo "Successfully Added!";

   }


	}

	


}



$connect->close();


?>