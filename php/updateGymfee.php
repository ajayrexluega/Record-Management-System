<?php
error_reporting(0);
	

	$id = $_POST['id'];
	$gym_type = $_POST['gym_type'];
    $gym_fee = $_POST['gym_fee'];
    $days = $_POST['days'];
    $gym_feeNM = $_POST['gym_feeNM'];

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

if (is_numeric($gym_fee)) {

$sql = "UPDATE gym_fees SET gym_type='$gym_type', gym_fee='$gym_fee', days='$days', gym_feeNM='$gym_feeNM' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<h2 align='left'><b>Updated!</b></h2>";

   } else {
     echo "<span style='color: red'>It is Already Exist.</span>";
}
}else
echo "<span style='color: red'>String type is not allowed in Fee field.</span>", PHP_EOL;
$connect->close();


?>