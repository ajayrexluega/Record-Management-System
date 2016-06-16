<?php
error_reporting(0);
	

	
	$payment_type = $_POST['payment_type'];
	$detail = $_POST['detail'];
	$trans_date = $_POST['trans_date'];
	$amount = $_POST['amount'];
	$paidamount = $_POST['paidamount'];
	$change = $_POST['change'];
	$verify = $_POST['verify'];
    

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


$sql = "INSERT INTO sales (id,payment_type, trans_date, amount, verify)
VALUES ('','$payment_type', '$trans_date', '$amount', '$verify')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color:green'>Success!</h2> 
    		<h5>Recent Payment:<br/>
    		Total amount: $amount <br/>
    		Amount Paid: $paidamount <br/>
    		Change: $change</h5>";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();

?>