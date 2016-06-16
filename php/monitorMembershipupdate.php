<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmsdb";

	$today = date("Y-m-d H:i:s");
	$newtoday = date('Y-m-d', strtotime($today . ' +7 hours'));

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//'2016-12-16'
//$today = $_POST['today'];

$sql = "SELECT * FROM membership";
$result = $conn->query($sql);

if ($result->num_rows >0) {


	while ($row = $result->fetch_assoc()) {
		

		

		$id = $row['id'];

		if ($newtoday > $row['exp_date']) {
			$sql2 = "UPDATE membership SET status='expired' WHERE id='$id'";
			if ($conn->query($sql2) === TRUE ) {

			}

		}else {
			$sql2 = "UPDATE membership SET status='active' WHERE id='$id'";
			if ($conn->query($sql2) === TRUE ) {

			}
		}

			if (empty($row['exp_date'])) {

			$sql3 = "UPDATE membership SET exp_date='Not Registered', status='Not Registered' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}


		}
			if ($row['exp_date'] == 'Not Registered') {

				$sql3 = "UPDATE membership SET status='Not Registered' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}

			}

			

		

		

	}
	
}

$conn->close();