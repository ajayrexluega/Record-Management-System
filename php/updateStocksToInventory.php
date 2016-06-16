<?php
error_reporting(0);
	

	$id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$available_stocks = $_POST['available_stocks'];
	$stock_in = $_POST['stock_in'];
    $description = $_POST['description'];
    $available_stocks_new = $_POST['available_stocks_new'];

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
$sql = "UPDATE inventory SET product_name='$product_name', stock_in='$stock_in', available_stocks='$available_stocks_new', description='$description' WHERE product_id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<h2 align='left'><b>Success!</b></h2>
    		<h4>Product: $product_name <br/>
    		Quantity on hand: $available_stocks <br/>
    		Quantity Added: $stock_in <br/>
    		Total Stocks: $available_stocks_new </h4>";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();


?>