<?php
error_reporting(0);
	

	$id = $_POST['id'];
	$type = $_POST['type'];
    $status = $_POST['status'];
    $userpass = $_POST['password'];

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



$sql = "UPDATE user_accounts SET type='$type', status='$status', password='$userpass' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<h2 align='left'><b>Updated!</b></h2>";

   } else {
     echo "Something's wrong.";
}

$connect->close();


?>