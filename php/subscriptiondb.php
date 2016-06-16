<?php
error_reporting(0);
	

	
	$subscription_name = $_POST['subscription_name'];
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


$subscription_name = $conn->real_escape_string($subscription_name);
$description = $conn->real_escape_string($description);

$sql = "INSERT INTO subscription (id, subscription_name, description)
VALUES ('','$subscription_name', '$description')";

if ($conn->query($sql) === TRUE) {

    
    echo "Successfully Registered!";

   } else {
     echo "<span style='color: red'>It is Already Exist.</span>";
}

$connect->close();


?>