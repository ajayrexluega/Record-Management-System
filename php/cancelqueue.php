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


$sqlu = "UPDATE inventory SET available_stocks='$available_stocks' WHERE product_id='$product_id'";
if ($conn->query($sqlu) === TRUE) {


// sql to delete a record

$sql = "DELETE FROM payment_queue WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Deleted!";
} else {
    echo "Error deleting record: " . $conn->error;
}
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>