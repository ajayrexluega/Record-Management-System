<?php 


	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "rmsdb";

	$id = $_POST['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$account_password = md5("12345");

$sql = "UPDATE user_accounts SET password='$account_password' WHERE id='$id'";

if($conn->query($sql) === TRUE){

	echo "Password Successfully Reset";

}else{
	echo "Error: " . $conn->connect_error;
}

$conn->close();