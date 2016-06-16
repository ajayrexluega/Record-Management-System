<?php 

$conn = new mysqli('localhost','root','','rmsdb');

if($conn->connect_error){
	die("Connection Failed:" . $conn->connect_error);
}


$cid = $_POST['cid'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$mname = $_POST['middlename'];
$dob = $_POST['dob'];
$contact =$_POST['contact'];
$gender = $_POST['gender'];

if($dob == ''){

	$update = "UPDATE customer_avail SET firstname='$fname', lastname='$lname', middlename='$mname', contact='$contact',gender='$gender' WHERE customer_id='$cid'";

if($conn->query($update) === TRUE){

    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



}else{

	$update = "UPDATE customer_avail SET firstname='$fname', lastname='$lname', middlename='$mname', dob='$dob', contact='$contact',gender='$gender' WHERE customer_id='$cid'";

if($conn->query($update) === TRUE){

    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



}


$conn->close();