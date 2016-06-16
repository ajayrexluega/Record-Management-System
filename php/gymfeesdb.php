<?php
error_reporting(0);
	

	
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

$sql = "INSERT INTO gym_fees (id, gym_type, gym_fee,days,gym_feeNM)
VALUES ('','$gym_type', '$gym_fee','$days','$gym_feeNM')";

if ($conn->query($sql) === TRUE) {

    
    echo "Successfully Registered!";

   } else {
     echo "<span style='color: red'>It is Already Exist.</span>";
}
}else
echo "<span style='color: red'>String type is not allowed in Fee field.</span>", PHP_EOL;
$connect->close();


?>