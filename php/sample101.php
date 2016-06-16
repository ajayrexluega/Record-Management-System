<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$today = '2016-02-20';

$sql = "SELECT id, firstname, lastname, gender, subscription, expdate_sub, status_sub FROM membership";
$result = $conn->query($sql);

if ($result->num_rows >0) {


	while ($row = $result->fetch_assoc()) {
		

		

		$id = $row['id'];

		if ($today > $row['expdate_sub']) {
			$sql2 = "UPDATE membership SET status_sub='expired' WHERE id='$id'";
			if ($conn->query($sql2) === TRUE ) {

			}

		}else {
			$sql2 = "UPDATE membership SET status_sub='active' WHERE id='$id'";
			if ($conn->query($sql2) === TRUE ) {

			}
		}

			if (empty($row['expdate_sub'])) {

			$sql3 = "UPDATE membership SET expdate_sub='Not Subscribed', status_sub='Not Subscribed' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}


		}
			if ($row['expdate_sub'] == 'Not Subscribed') {

				$sql3 = "UPDATE membership SET status_sub='Not Subscribed' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}

			}

			if ($row['expdate_sub'] == 'Not Subscribed') {

				$sql3 = "UPDATE membership SET subscription='None' WHERE id='$id'";
			if ($conn->query($sql3) === TRUE ) {

			}

			}

		

		

	}
	echo "Done!";
}