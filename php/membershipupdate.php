<?php
error_reporting(0);
	
    $id = $_POST['id'];
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



if(empty($subexp) && !empty($expdate)){
    $sql = "UPDATE membership SET firstname='$fname', lastname='$lname', middlename='$mname',address='$address', age='$age', email='$email', contact='$contact',
        facebook='$facebook', weight='$weight', height='$height', subscription='$subscription', program='$program',
        reg_date='$regdate', exp_date='$expdate', status='$status' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
    echo "Successfully Updated the Information!";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}elseif (empty($expdate) && !empty($subexp)) {
    $sql = "UPDATE membership SET firstname='$fname', lastname='$lname', middlename='$mname', address='$address', age='$age', email='$email', contact='$contact',
        facebook='$facebook', weight='$weight', height='$height', subscription='$subscription', program='$program', expdate_sub='$subexp',
        reg_date='$regdate', status='$status' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
    echo "Successfully Updated the Information!";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}elseif (empty($subexp) && empty($expdate)) {
        $sql = "UPDATE membership SET firstname='$fname', lastname='$lname', middlename='$mname', address='$address', age='$age', email='$email', contact='$contact',
        facebook='$facebook', weight='$weight', height='$height', subscription='$subscription', program='$program',
        reg_date='$regdate', status='$status' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
    echo "Successfully Updated the Information!";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
}elseif (!empty($subexp) && !empty($expdate)) {
    $sql = "UPDATE membership SET firstname='$fname', lastname='$lname', middlename='$mname', address='$address', age='$age', email='$email', contact='$contact',
        facebook='$facebook', weight='$weight', height='$height', subscription='$subscription', program='$program', expdate_sub='$subexp',
        reg_date='$regdate', exp_date='$expdate', status='$status' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Successfully Updated the Information!";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
}



$connect->close();


?>