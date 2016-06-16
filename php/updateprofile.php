<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmsdb";

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$secret_answer = $_POST['secretAnswer'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE user_accounts SET firstname='$firstname', lastname='$lastname', address='$address', contact='$contact',email='$email', secret_answer='$secret_answer' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
	session_start();
	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;
	$_SESSION['address'] = $address;
	$_SESSION['contact'] = $contact;
	$_SESSION['email'] = $email;
	$_SESSION['secret_answer'] = $secret_answer;

    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>