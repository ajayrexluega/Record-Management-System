<?php
$conn = new mysqli('localhost','root','','rmsdb');

if($conn->connect_error){
	die("Connection Failed:" . $conn->connect_error);
}




if(isset($_POST['customer_id'])){
	$customer_id = $_POST['customer_id'];
	$sql = "SELECT * FROM avails WHERE customer_id = '$customer_id' AND status='active'";
$result = $conn->query($sql);
if($result->num_rows > 0 ){
	echo "<div id='table-scroll2'>
      <div id='table-wrapper2'>
      <table id='table122'>
                <thead id='top2'>
			<tr>
			<th>Avail Session</th>
			<th>Expiration Date</th>
			<th>Status</th>
			
			</tr>
			</thead><tbody>";
			while ($row = $result->fetch_assoc()) {
				$avail_session = $row['avail_session'];
				$exp_date = $row['exp_date'];
				
				$status = $row['status'];
				

				echo "<tr>
						
						<td>" . $avail_session . "</td>
						<td>" . $exp_date . "</td>
						<td>" . $status . "</td>
						
						</tr>";
			}
			echo "</tbody></table>
					</div>
					</div>";





					



}else{
	//echo "<script>window.location.replace('#/');window.location.replace('#/salesReport');</script>";
}


//EXPIRED AVAILS TABLE

					$sql2 = "SELECT * FROM avails WHERE customer_id = '$customer_id' AND status='expired'";
$result2 = $conn->query($sql2);
if($result2->num_rows > 0 ){
	echo "<h3>History Avails</h3><div id='table-scroll2'>
      <div id='table-wrapper2'>
      <table id='table122'>
                <thead id='top2'>
			<tr>
			<th>Avail Session</th>
			<th>Expiration Date</th>
			<th>Status</th>
			
			</tr>
			</thead><tbody>";
			while ($row2 = $result2->fetch_assoc()) {
				$avail_session2 = $row2['avail_session'];
				$exp_date2 = $row2['exp_date'];
				
				$status2 = $row2['status'];
				

				echo "<tr>
						
						<td>" . $avail_session2 . "</td>
						<td>" . $exp_date2 . "</td>
						<td>" . $status2 . "</td>
						
						</tr>";
			}
			echo "</tbody></table>
					</div>
					</div>";


}


$customer = "SELECT * FROM customer_avail WHERE customer_id = '$customer_id'";
$resultcustomer = $conn->query($customer);

if($resultcustomer->num_rows > 0){

	$row= $resultcustomer->fetch_assoc();
	$cid = $row['customer_id'];
	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$mname = $row['middlename'];
	$gender = $row['gender'];
	$dob = $row['dob'];
	$contact = $row['contact'];

	echo "

		<div style=' position:absolute;top:100;right:20;'>
		<input id='id2' type='text' name='cid' value='$cid' hidden>
			Firstname <input id='fname2' style='border:1px solid;padding:2px 0 2px 10px; margin-left:26px; margin-right: 50px' type='text' name='firstname' value='$fname' autocomplete='off'><br/><br/>
			Lastname <input id='lname2' style='border:1px solid;padding:2px 0 2px 10px; margin-left:28px; margin-right: 50px' type='text' name='lastname' value='$lname' autocomplete='off'><br/><br/>
			Middlename <input id='mname2' style='border:1px solid;padding:2px 0 2px 10px; margin-left:10px; margin-right: 50px' type='text' name='middlename' value='$mname' autocomplete='off'><br/><br/>
			Birthdate <input id='dob2' style='border:1px solid;padding:2px 0 2px 10px; margin-left:30px; margin-right: 50px' value='$dob' type='date' name='dob'><br/><br/>
			";
			//<hidden input id='dob2' style='border:1px solid;padding:2px 0 2px 10px; margin-left:30px' type='text' value='$dob' disabled> 
			echo "Gender <select style='margin-left:42px; margin-right: 50px' name='gender' id='gender2'>";
			echo "<option value='Male'";
			if($gender == 'Male'){
				echo "selected";

			}

			echo">Male</option>";
			echo "<option value='Female'";
			if($gender == 'Female'){
				echo "selected";
			}
			echo ">Female</option>";
			echo "</select>";


			echo "<br/><br/>
			Contact # <input id='contact2' style='border:1px solid;padding:2px 0 2px 10px; margin-left:27px; margin-right: 50px' type='text' name='contact' value='$contact' autocomplete='off'><br/><br/>


			<button class='submit' id='caupdate' onclick='update()'>Update</button>
		</div>

"; 

}









}else{
	echo "WALA!";
}


$conn->close();