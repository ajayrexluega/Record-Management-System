<?php 

	$servername = "localhost";
    $username = "root";
    $password = "";
    $db = "rmsdb";


    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $type="Gym Payment";
    $gymfeename = $_POST['gymfeename'];
    $days = $_POST['days'];
    $amount = $_POST['amount'];
    $cash = $_POST['cash'];
    $verify = $_POST['verify'];

    $change = $cash - $amount;


// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($cash >= $amount){

	$today = date("Y-m-d H:i:s");
$newtoday = date('Y-m-d', strtotime($today . ' +7 hours'));


$getcid = "SELECT * FROM customer_avail WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender'";
$resultgetcid = $conn->query($getcid);

if($resultgetcid->num_rows > 0){
	$expdate = date('Y-m-d', strtotime($newtoday . '+'. $days . ' days'));

	$row=$resultgetcid->fetch_assoc();
	$cid = $row['customer_id'];

	$addavail = "INSERT INTO avails (id,customer_id,avail_session,exp_date,status) VALUES ('','$cid','$gymfeename','$expdate','active')";
	if($conn->query($addavail) === TRUE){

		$sql4 = "INSERT INTO sales (id,payment_type, trans_date, amount, verify)
							VALUES ('','$type', '$newtoday', '$amount', '$verify')";

							if ($conn->query($sql4) === TRUE) {
							    echo "<h2 style='color:green'>Success!</h2> 
							    		<h5>Recent Payment:<br/>
							    		Total amount: $amount <br/>
							    		Amount Paid: $cash <br/>
							    		Change: $change</h5>";

							    		echo "<script>var z = document.getElementById('avail_reg');
                            z.style.display = 'none';</script>";

							   } else {
							    echo "Error: " . $sql4 . "<br>" . $conn->error;
							}



	}




}


}else{

	echo "<b>Not enough cash.</b>";


} 


$conn->close();