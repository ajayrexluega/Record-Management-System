<?php
error_reporting(0);
	
    $id = $_POST['id'];
	$fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $profession = $_POST['profession'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];
    $school = $_POST['school'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $weigth = $_POST['weigth'];
    $heigth = $_POST['heigth'];
    $subscription = $_POST['subscription'];
    $program = $_POST['program'];
    $subexp = $_POST['expdate_sub'];
    $previousgym = $_POST['previousgym'];
    $regdate = $_POST['regdate'];
    $expdate = $_POST['expdate'];
    $status = $_POST['status'];

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


$sql = "UPDATE membership SET firstname='$fname', lastname='$lname', topay='$topay', paid='$paidamount',balance='$balance', status='$status' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Finish!";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();


?>