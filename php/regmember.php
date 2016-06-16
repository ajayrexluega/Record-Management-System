<?php
error_reporting(0);
	

	
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
    $mname = $_POST['middlename'];
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


$key = 'mid-001';
$j = 1;

$found = true;
while($found == true){
    

    $sql = "SELECT * FROM membership WHERE membership_id='$key'";
    $result = $conn->query($sql);

if ($result->num_rows == 0) {
    $found = false;

if ($subscription == '? undefined:undefined ?') {
    $subscription = 'None';
}

$sql = "SELECT * FROM membership WHERE firstname = '$fname' AND lastname = '$lname' AND middlename = '$mname'";
$result = $conn->query($sql);
if($result->num_rows > 0){


    echo "$fname $lname $mname is already exist.";
}else{
    $height = $conn->real_escape_string($height);

    $membership = "SELECT * FROM gym_fees WHERE gym_type='membership'";
$membershipresult = $conn->query($membership);

if($membershipresult->num_rows > 0){
    $row = $membershipresult->fetch_assoc();
    $days = $row['days'];
    $today = date("Y-m-d H:i:s");
    $newtoday = date('Y-m-d', strtotime($today . ' +7 hours'));
    $mem_exp = date('Y-m-d', strtotime($newtoday . '+'. $days . ' days'));


$sql = "INSERT INTO membership (id,membership_id, firstname, lastname,middlename, address, age, gender, email, contact, facebook, weight, height, subscription,
 program, expdate_sub, reg_date, exp_date, status)
VALUES ('','$key','$fname', '$lname','$mname', '$address', '$age', '$gender', '$email', '$contact', '$facebook', '$weight', '$height','$subscription',
    '$program', '$subexp', '$regdate','$mem_exp','active')";

if ($conn->query($sql) === TRUE) {
    $sqlgym = "INSERT INTO sales (id,payment_type, trans_date, amount, verify)
VALUES ('','$payment_type', '$regdate', '$price', '$verify')";
    $exec = $conn->query($sqlgym);

    
    echo "Successfully Registered!";


   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

}
}
 else {
        $key = 'mid-00'.$j;//RandomString(30);
        $j++;
       
    }
}


$connect->close();


?>