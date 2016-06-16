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

$pon = $_POST['pi_number'];
$amount = $_POST['amount'];
$order_date = $_POST['order_date'];

$sql = "SELECT * FROM purchased_items_supplier WHERE pi_number = '$pon'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
    	$pon = $row['pi_number'];
		$amount = $row['total_amount'];
		$description = $row['description'];
		$product_name = $row['product_name'];
		$product_id = $row['product_id'];
		$quantity = $row['quantity'];
        $supplier = $row['supplier'];
        
        $sql = "INSERT INTO process_order_delivery (id, pi_number, description,amount,product_name,product_id,quantity,supplier)
VALUES ('', '$pon', '$description','$amount','$product_name','$product_id','$quantity','$supplier')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}
    }
} else {
    echo "0 results";
}
$conn->close();
?>