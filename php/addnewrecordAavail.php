<?php

$servername = "localhost";
    $username = "root";
    $password = "";
    $db = "rmsdb";

    $today = date("Y-m-d H:i:s");
	$newtoday = date('Y-m-d', strtotime($today . ' +7 hours'));

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['middlename'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $type="Gym Payment";
    $gymfeename = $_POST['gymfeename'];
    $days = $_POST['days'];
    $amount = $_POST['amount'];
    $cash = $_POST['cash'];
    $verify = $_POST['verify'];

    $change = $cash - $amount;



$key = 'cid-001';
$j = 1;

$found = true;
while($found == true){
	

    $sql = "SELECT * FROM customer_avail WHERE customer_id='$key'";
	$result = $conn->query($sql);

if ($result->num_rows == 0) {
	$found = false;

		$sql = "INSERT INTO customer_avail (id, customer_id, firstname,lastname,middlename,gender,dob,contact)
VALUES ('','$key','$fname', '$lname','$mname' , '$gender', '$dob','$contact')";

if ($conn->query($sql) === TRUE) {

	$expdate = date('Y-m-d', strtotime($newtoday . '+'. $days . ' days'));

    $sql2 = "INSERT INTO avails (id,customer_id,avail_session,exp_date,status) VALUES('','$key','$gymfeename','$expdate','active')";
    
    if($conn->query($sql2) === TRUE){

    	//$sql3 = "INSERT INTO walkin_member (id,firstname, lastname, gender, time, datestamp)
                  //  VALUES ('','$fname', '$lname', '$gender', '$time', '$date')";

                   // if ($conn->query($sql3) === TRUE) {

                    	$sql4 = "INSERT INTO sales (id,payment_type, trans_date, amount, verify)
							VALUES ('','$type', '$date', '$amount', '$verify')";

							if ($conn->query($sql4) === TRUE) {
							    echo "<h2 style='color:green'>Success!</h2> 
							    		<h5>Recent Payment:<br/>
							    		Total amount: $amount <br/>
							    		Amount Paid: $cash <br/>
							    		Change: $change</h5>";

							   } else {
							    echo "Error: " . $sql4 . "<br>" . $conn->error;
							}

                        

                      // } else {
                    //    echo "Error: " . $sql3 . "<br>" . $conn->error;
                   // }

    }else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
     

   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
}


	}
 else {
        $key = 'cid-00'.$j;//RandomString(30);
        $j++;
       
    }
}


$conn->close();