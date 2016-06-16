<?php
error_reporting(0);
	

	$id = $_POST['id'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$time = $_POST['time'];
	$date = $_POST['date'];


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


$sql1 = "SELECT * FROM walkin_member WHERE firstname='$fname' && lastname='$lname' && gender='$gender' && datestamp='$date'";
$result = $conn->query($sql1);
if($result->num_rows > 0){

    $sql = "UPDATE walkin_member SET time_out='$time' WHERE firstname='$fname' && lastname='$lname' && gender='$gender' && datestamp='$date'";

                        if ($conn->query($sql) === TRUE) {
                       // echo "<span style='border:1px solid; padding: 5px; margin-left: -50px; margin-bottom: -10px;
                       // background-color: green; border-radius: 5px;'><b>Success!</b></span>";

                       } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }


}else{
    echo "<b>You don't have log for today.";
}

                    
                   

$conn->close();
    


/*

$sql = "INSERT INTO walkin_member (id,firstname, lastname, gender, time, datestamp, type)
VALUES ('','$fname', '$lname', '$gender', '$time', '$date', '$type')";

if ($conn->query($sql) === TRUE) {
    echo "<p align='left'><b>Recent Log</b>" . 
    "</br>
    <span style='color:green; padding-right: 10px;'>
    First Name:</span>" . $fname . 
    "</br><span style='color:green; padding-right: 10px;'>
    Last Name:</span>" . $lname .
     "</br><span style='color:green; padding-right: 10px;'>
     Gender:</span>" . $gender . 
     "</br><span style='color:green; padding-right: 10px;'>
     Time:</span>" . $time . 
     "</br><span style='color:green; padding-right: 10px;'>
     Date:</span>" . $date .
      "</p>";

   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();

*/
?>