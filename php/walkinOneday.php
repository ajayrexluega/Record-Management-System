<?php 



	$fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
     $today = date("Y-m-d g:i a");
 $newtoday = date('Y-m-d g:i a', strtotime($today . ' +7 hours'));

 $newtoday2 = strtotime($newtoday);

 $date = date('Y-m-d', $newtoday2);
 $time = date('g:i a', $newtoday2);
    
    $type="Gym Payment";
    
    $amount = $_POST['amount'];
	$paidamount = $_POST['paidamount'];
	$change = $paidamount - $amount;
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

if($paidamount >= $amount){

    $sql2 = "INSERT INTO walkin_member (id,firstname, lastname, gender, time, datestamp)
                    VALUES ('','$fname', '$lname', '$gender', '$time', '$date')";

                    if ($conn->query($sql2) === TRUE) {

                        $sql = "INSERT INTO sales (id,payment_type, trans_date, amount, verify)
                            VALUES ('','$type', '$date', '$amount', '$verify')";

                            if ($conn->query($sql) === TRUE) {
                                echo "<h2 style='color:green'>Success!</h2> 
                                        <h5>Recent Payment:<br/>
                                        Total amount: $amount <br/>
                                        Amount Paid: $paidamount <br/>
                                        Change: $change</h5>";
                                echo "<script>var z = document.getElementById('walkin');
                            z.style.display = 'none';</script>";

                               } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                        

                       } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }


}else{
    echo "<b>Not enough cash.</b>";

} 




$conn->close();