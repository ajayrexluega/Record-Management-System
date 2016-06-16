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
}else
$sql = "UPDATE inventory SET available_stocks='$available_left' WHERE product_id='$id'";

if ($conn->query($sql) === TRUE) {


	$sql = "SELECT * FROM payment_queue WHERE product_id = '$id'";
	$result = $conn->query($sql);

	if($result->num_rows > 0){

		while ($row = $result->fetch_assoc()) {
			$quantity = $row['sold_quantity'];
			$available_left = $row['available_left'];
			$newavailable_left = $available_left - $sold_quantity;
			$total_amount2 = $row['total_amount'];
			$newtotal_amount = $total_amount + $total_amount2;

			$sumquantity = $quantity + $sold_quantity;

			$newquantity = "UPDATE payment_queue SET sold_quantity = '$sumquantity' , available_left = '$newavailable_left',total_amount='$newtotal_amount'  WHERE product_id = '$id'";
			$exec = $conn->query($newquantity);

			echo "<b>$product_name</b> new quantity $sumquantity<br/><br/>";
		}

		

	}else{

    
    $sql2 = "INSERT INTO payment_queue (id,product_id, product_name, price, available_stocks,sold_quantity, available_left,total_amount,description)
				VALUES ('', '$id', '$product_name','$price','$available_stocks','$sold_quantity','$available_left','$total_amount','$description')";
	if ($conn->query($sql2) === TRUE) {
	    echo "<br/> <b> $product_name </b>added to cart.<br/><br/>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	}


   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();


?>