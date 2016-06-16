<?php
error_reporting(0);
	

	$id = $_POST['id'];
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



$sql = "UPDATE subscription SET subscription_name='$subscription_name', description='$description' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<h2 align='left'><b>Updated!</b></h2>";

   } else {
     echo "<span style='color: red'>It is Already Exist.</span>";
}

$connect->close();


?>