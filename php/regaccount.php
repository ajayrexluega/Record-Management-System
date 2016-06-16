<?php
$servername = "localhost";
$usernamewamp = "root";
$passwordwamp = "";
$dbname = "rmsdb";




// Create connection
$conn = new mysqli($servername, $usernamewamp, $passwordwamp, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname =  $conn->real_escape_string($_POST['lastname']);
$gender =  $conn->real_escape_string($_POST['gender']);
$address =  $conn->real_escape_string($_POST['address']);
$contact =  $conn->real_escape_string($_POST['contact']);
$email =  $conn->real_escape_string($_POST['email']);
$type =  $conn->real_escape_string($_POST['type']);
$status =  $conn->real_escape_string($_POST['status']);
$username =  $conn->real_escape_string($_POST['username']);
$password =  $conn->real_escape_string(md5($_POST['password']));
$secretQuestion =  $conn->real_escape_string($_POST['secretQuestion']);
$secretAnswer =  $conn->real_escape_string($_POST['secretAnswer']);


$key = 'uid-001';
$j = 1;

$found = true;
while($found == true){
    

    $sql = "SELECT * FROM user_accounts WHERE user_id='$key'";
    $result = $conn->query($sql);

if ($result->num_rows == 0) {
    $found = false;
$sql = "INSERT INTO user_accounts (id,user_id,firstname, lastname, gender, address, contact, email, type, status, username,password)
VALUES ('','$key','$firstname','$lastname','$gender','$address','$contact','$email','$type','$status','$username','$password')";

if ($conn->query($sql) === TRUE) {
    echo "New Account created Successfully!";
} else {
    echo "Username Already Exist!";
}

}
 else {
        $key = 'uid-00'.$j;//RandomString(30);
        $j++;
       
    }
}

$conn->close();
?>