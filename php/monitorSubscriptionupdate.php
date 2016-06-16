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

$sql = "SELECT * FROM avails";
$result = $conn->query($sql);

if ($result->num_rows >0) {


	while ($row = $result->fetch_assoc()) {
		

		

		$id = $row['id'];

		if ($newtoday > $row['exp_date']) {
			$sql2 = "UPDATE avails SET status='expired' WHERE id='$id'";
			if ($conn->query($sql2) === TRUE ) {

			}

		}else {
			$sql2 = "UPDATE avails SET status='active' WHERE id='$id'";
			if ($conn->query($sql2) === TRUE ) {

			}
		}


		/*	if ($row['subscription'] == 'None') {

				$sql3 = "UPDATE avails SET expdate_sub='Not Subscribed', status='Not Subscribed' WHERE id='$id'";
				if ($conn->query($sql3) === TRUE ) {

				}


			}


			if (empty($row['expdate_sub'])) {

			$sql3 = "UPDATE avails SET expdate_sub='Not Subscribed', status='Not Subscribed' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}


		}
			if ($row['expdate_sub'] == 'Not Subscribed') {

				$sql3 = "UPDATE avails SET status='Not Subscribed' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}

			}

			if ($row['expdate_sub'] == 'Not Subscribed') {

				$sql3 = "UPDATE avails SET status='None' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}

			}
			*/

		

		

	}
	
}

$conn->close();