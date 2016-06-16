<?php
//database settings
$connect = mysqli_connect("localhost", "root", "", "rmsdb");

$sql = mysqli_query($connect, "delete from process_order_delivery");

$sql2 = "select * from ordered_items_supplier";
$result = $connect->query($sql2);
if($result->num_rows > 0){

	while ($row = $result->fetch_assoc()) {
		$pi_number = $row['pi_number'];


		$sql = "select * from purchased_items_supplier where pi_number = '$pi_number'";
		$result2 = $connect->query($sql);
		if($result2->num_rows > 0){

			while ($row2 = $result2->fetch_assoc()) {
				$pi_number = $row2['pi_number'];
				$sql = "update ordered_items_supplier set status = 'Pending' where pi_number = '$pi_number'";
				$query = $connect->query($sql);

				
			}


		}else{
				$sql = "update ordered_items_supplier set status = 'Delivered' where pi_number = '$pi_number'";
				$query = $connect->query($sql);
			}
			continue;
	}

	

}

$result = mysqli_query($connect, "select * from ordered_items_supplier");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>