<?php 



	$fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    
    $type="Gym Payment";
    
    $amount = $_POST['amount'];
	$paidamount = $_POST['paidamount'];
	$change = $paidamount - $amount;
	$verify = $_POST['verify'];

    

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


$sql2 = "INSERT INTO walkin_member (id,firstname, lastname, gender, time, datestamp)
                    VALUES ('','$fname', '$lname', '$gender', '$time', '$date')";

                    if ($conn->query($sql2) === TRUE) {

                    	
							    echo "<h2 style='color:green'>Success!</h2> 
							    		";

							  

                        

                       } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }

$conn->close();