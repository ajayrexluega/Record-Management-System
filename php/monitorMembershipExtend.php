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
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $subscription = $_POST['subscription'];
    $program = $_POST['program'];
    $subexp = $_POST['expdate_sub'];
    $regdate = $_POST['regdate'];
    $expdate = $_POST['expdate'];
    $status = $_POST['status'];
	
	$cash = $_POST['cash'];
    $payment_type = "Gym Payment";
    $verify = $_POST['verify'];
	$price = $_POST['price'];
	$todaydate = $_POST['todaydate'];

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

$height = $conn->real_escape_string($height);

$membership = "SELECT * FROM gym_fees WHERE gym_type='membership'";
$membershipresult = $conn->query($membership);

if($membershipresult->num_rows > 0){
    $row = $membershipresult->fetch_assoc();
    $days = $row['days'];
    $today = date("Y-m-d H:i:s");
    $newtoday = date('Y-m-d', strtotime($today . ' +7 hours'));
    $mem_exp = date('Y-m-d', strtotime($newtoday . '+'. $days . ' days'));

$sqlgym = "INSERT INTO sales (id,payment_type, trans_date, amount, verify)
VALUES ('','$payment_type', '$todaydate', '$price', '$verify')";
if($conn->query($sqlgym)=== TRUE){
	
	$sql = "UPDATE membership SET exp_date = '$mem_exp' , status='active' WHERE id = '$id'";
	if($conn->query($sql) === TRUE){
		
		echo "Membership Expiration Updated!<br/><br/>";
        echo "Expiration Date: $mem_exp";
	}
	
}
}


$connect->close();


?>