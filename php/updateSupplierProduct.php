<?php
error_reporting(0);
	

	$id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$supplier = $_POST['supplier'];
	$price = $_POST['price'];
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


$sql = "UPDATE product SET product_name='$product_name', supplier='$supplier', price='$price', description='$description' WHERE product_id='$id'";

if ($conn->query($sql) === TRUE) {

	$sql2 = "UPDATE inventory SET product_name='$product_name', price='$price', description='$description' WHERE product_id='prod-001$id'";
	if ($conn->query($sql2) === TRUE){
		echo "<h2 align='left'><b>Updated!</b></h2>";
	}

    

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();


?>