<?php
error_reporting(0);
	
$payment_type = $_POST['payment_type'];
	
	$trans_date = $_POST['trans_date'];
	$total_amount = $_POST['total_amount'];
	$cash = $_POST['cash'];
	$change = $_POST['change'];
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

$queueitems = "SELECT * FROM supplier_pqueue";
$resultqueueitems = $conn->query($queueitems);
if($resultqueueitems->num_rows > 0){

$key = 'po-001';

$j = 1;

$found = true;
while($found == true){
	

    $sql = "SELECT * FROM ordered_items_supplier WHERE pi_number='$key'";
	$result = $conn->query($sql);

if ($result->num_rows == 0) {
    	$found = false;
        $sql5 = "INSERT INTO ordered_items_supplier (id,order_date, amount, processed_by,pi_number)
VALUES ('','$trans_date', '$total_amount', '$verify','$key')";

if ($conn->query($sql5) === TRUE) {

		$sql3 = "SELECT product_id, product_name, sold_quantity, total_amount,description,supplier FROM supplier_pqueue";
		$result2 = $conn->query($sql3);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
    	$pid = $row['product_id'];
    	$pname = $row['product_name'];
    	$quantity = $row['sold_quantity'];
    	$total_amount = $row['total_amount'];
        $description = $row['description'];
        $supplier = $row['supplier'];

        $sql4 = "INSERT INTO purchased_items_supplier (pi_number,product_id, product_name, quantity, total_amount,description,supplier)
VALUES ('$key','$pid', '$pname', '$quantity', '$total_amount','$description','$supplier')";

		if ($conn->query($sql4) === TRUE) {

            

			
		}


    }
}


echo "
            <b><u>Recent Order</u><b/>
            <h2 style='color:green'>Success!</h2> 
            Purchase Order Number: $key <br/><br/>";
	$sql2 = "DELETE FROM supplier_pqueue";
	if ($conn->query($sql2) === TRUE) {

    


             /*echo "<h2 style='color:green'>Success!</h2> 
            <h5>Recent Payment:<br/>
            Total amount: $total_amount <br/>
            Amount Paid: $cash <br/>
            Change: $change</h5>";*/
    		
    		

   }
}
    } else {
        $key = 'po-00'.$j;//RandomString(30);
        $j++;
       
    }
     

}
   
}else{
    echo "<b>Add Items to Process Orders.</b><br/><br/>";
}
 

$connect->close();

?>