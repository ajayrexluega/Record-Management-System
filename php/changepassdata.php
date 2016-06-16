<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmsdb";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

$id = $_POST['id'];
$userpass = $conn->real_escape_string(md5($_POST['password']));
$newpassword = $conn->real_escape_string(md5($_POST['newpassword']));

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql2 = "SELECT * FROM user_accounts WHERE password='$userpass' && id ='$id'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        if($row['password'] == $userpass){

        	$sql = "UPDATE user_accounts SET password='$newpassword' WHERE id='$id'";

				if ($conn->query($sql) === TRUE) {
				    echo "Password has been changed!";
				} else {
				    echo "Error updating password: " . $conn->error;
				}

        }else {
    echo "Wrong Password!";
}
    }


} else {
    echo "Wrong Password!";
}

$conn->close();
?>