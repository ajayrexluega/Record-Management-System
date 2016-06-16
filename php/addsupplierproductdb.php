<?php
error_reporting(0);
	

	$product_name = $_POST['product_name'];
	$supplier = $_POST['supplier'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    
	

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

if(empty($supplier)){
	echo "<span style='color: red'>Please, click row in table to add supplier's name. </span>";
	die();
}

if (is_numeric($price)) {

	if ($supplier == '? undefined:undefined ?'){
		echo "Please, Select Supplier.";

	}else{
		$key = 'prod-001';

		$j = 1;

$found = true;
while($found == true){
	

    $sql = "SELECT * FROM product WHERE product_id='$key'";
	$result = $conn->query($sql);

if ($result->num_rows == 0) {
	$found = false;

		$sql = "INSERT INTO product (product_id, product_name, supplier,price,description)
VALUES ('$key','$product_name', '$supplier', $price, '$description')";

if ($conn->query($sql) === TRUE) {

    
     echo "<span style='color: green'>Successfully Added!</span>";

   } else {
     echo "<span style='color: red'>Product Already Exist.</span>";
}


	}
 else {
        $key = 'prod-00'.$j;//RandomString(30);
        $j++;
       
    }

 

    
}

}
}
else{
	echo "<span style='color: red'>String type is not allowed in Price field.</span>", PHP_EOL;

}
$connect->close();


?>