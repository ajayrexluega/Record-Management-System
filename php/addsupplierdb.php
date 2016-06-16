<?php
error_reporting(0);
	

	
	$supplier_name = $_POST['supplier_name'];
    $address = $_POST['supplier_address'];
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


$sql = "INSERT INTO supplier (id, supplier_name, supplier_address,contact_person, contact,email)
VALUES ('','$supplier_name', '$address','$contact_person', '$contact', '$email')";

if ($conn->query($sql) === TRUE) {

    
    echo "<span style='color: green'>Successfully Registered!</span>";

   } else {
    echo "<span style='color: red'>Supplier Already Exist.</span>";
}

$connect->close();


?>