<?php
error_reporting(0);
	

	$id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$available_stocks = $_POST['available_stocks'];
	$price = $_POST['price'];
    $available_stocks = $_POST['available_stocks'];
    $sold_quantity = $_POST['sold_quantity'];
    $available_left = $_POST['available_left'];
    $total_amount = $_POST['total_amount'];
    $description = $_POST['description'];
    $supplier = $_POST['supplier'];

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

if(empty($id))
{
	echo "<h3>Please Fill All Fields!</h3><br/>";
	$connect->close();
}else{

	$sql = "SELECT * FROM supplier_pqueue WHERE product_id = '$id'";
	$result = $conn->query($sql);

	if($result->num_rows > 0){

		while ($row = $result->fetch_assoc()) {
			$quantity = $row['sold_quantity'];

			$sumquantity = $quantity + $sold_quantity;

			$newquantity = "UPDATE supplier_pqueue SET sold_quantity = '$sumquantity' WHERE product_id = '$id'";
			$exec = $conn->query($newquantity);

			echo "<b>$product_name</b> new quantity $sumquantity<br/><br/>";
		}

		

	}else{

		$sql2 = "INSERT INTO supplier_pqueue (id,product_id, product_name, price, available_stocks,sold_quantity, available_left,total_amount,description,supplier)
				VALUES ('', '$id', '$product_name','$price','$available_stocks','$sold_quantity','$available_left','$total_amount','$description','$supplier')";
	if ($conn->query($sql2) === TRUE) {
	    echo " <b> $product_name </b>added to payment<br/><br/>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	}

	


}
 
 
    

 
$connect->close();


?>