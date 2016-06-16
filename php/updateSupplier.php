<?php
error_reporting(0);
	

	$id = $_POST['id'];
	$supplier_name = $_POST['supplier_name'];
	$supplier_address = $_POST['supplier_address'];
	$contact = $_POST['contact'];
    $email = $_POST['email'];
    $contact_person = $_POST['contact_person'];

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


$sql = "UPDATE supplier SET supplier_name='$supplier_name', supplier_address='$supplier_address', contact_person='$contact_person', contact='$contact', email='$email' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<h2 align='left'><b>Updated!</b></h2>";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();


?>