<?php
error_reporting(0);
	
	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$stock_in = $_POST['stock_in'];
    $available_stocks = $_POST['available_stocks'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    
	

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
	$connect->close();
}

$sql = "INSERT INTO inventory (inventory_id,product_id, product_name, stock_in,available_stocks,description,price)
VALUES ('','$product_id','$product_name', '$stock_in', '$stock_in', '$description','$price')";

if ($conn->query($sql) === TRUE) {

    
    echo "Successfully Added!";

   } else {
    echo "Item Already Exist!";
}

$connect->close();


?>