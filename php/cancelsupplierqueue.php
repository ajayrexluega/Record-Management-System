<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmsdb";

$id = $_POST['id'];
$product_id = $_POST['product_id'];
$available_stocks = $_POST['available_stocks'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// sql to delete a record

$sql = "DELETE FROM supplier_pqueue WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Cancelled!";
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>