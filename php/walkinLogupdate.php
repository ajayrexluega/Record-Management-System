<?php
error_reporting(0);
	

	$id = $_POST['id'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$gender = $_POST['gender'];
    $type = $_POST['type'];

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


$sql = "UPDATE walkin_member SET firstname='$fname', lastname='$lname' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<p align='left'><b>Updated!</b>" . 
    "</br>
    <span style='padding-right: 10px;'>
    ID:</span>" . $id .
    "<br/><span style='padding-right: 10px;'>
    First Name:</span>" . $fname . 
    "</br><span style='padding-right: 10px;'>
    Last Name:</span>" . $lname .
     "</br><span style='padding-right: 10px;'>
     Gender:</span>" . $gender .
     "</br><span style='padding-right: 10px;'>
     Type:</span>" . $type .
     
      "</p>";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();


?>