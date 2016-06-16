<?php
error_reporting(0);
    
$today = date("Y-m-d H:i:s");
$newtoday = date('Y-m-d', strtotime($today . ' +7 hours'));
    
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['middlename'];
    $gender = $_POST['gender'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $walkintype = $_POST['walkintype'];
    
    $processby = $_POST['processby'];

    

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

$pay = "SELECT * FROM gym_fees WHERE id='$walkintype'";
    $result = $conn->query($pay);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();
        $gym_type = $row['gym_type'];
        $gym_fee = $row['gym_fee'];
        $days = $row['days'];
        $gym_feeNM = $row['gym_feeNM'];


        if($days == 1){

        $verifymember = "SELECT * FROM membership WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND middlename='$mname'";
        $result2 = $conn->query($verifymember);

        if($result2->num_rows > 0){

            // THE CUSTOMER IS A MEMBER
            // AND VERIFY THE MEMBERSHIP EXPIRATION

            $verifyexpdate = "SELECT * FROM membership WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND middlename='$mname' AND status='active'";
            $result3 = $conn->query($verifyexpdate);
            if($result3->num_rows > 0){

                // THE MEMBERSHIP IS ACTIVE

                echo "<script>showDialog3()</script>";
                echo "<b>$fname $lname's membership is active.</b><br/><br/>";
    echo "

         Amount Due<input style='margin-left:25px; margin-bottom: 15px;' type='text' name='amount' id='topay' placeholder='To Pay' value='$gym_fee' ng-model='amount' autocomplete='off' readonly required><br/>
         Cash on Hand<input style='margin-left:17px; margin-bottom: 15px;' type='text' name='paidamount' id='paidamount' onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' placeholder='Cash on Hand' ng-model='cash' autocomplete='off' required><br/>
         
         Processed By<input style='margin-left:21px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>
         <input type='text' name='firstname' value='$fname' hidden>
         <input type='text' name='lastname' value='$lname' hidden>
         <input type='text' name='gender' value='$gender' hidden>
         <input type='text' name='time' id='time4' hidden>
         <input type='text' name='date' id='date4' hidden>
         

      <input class='submit' type='submit' value='Submit'>

      ";


            }else{

                // THE MEMBERSHIP IS EXPIRED

                echo "<script>showDialog3()</script>";
                echo "<b>$fname $lname's membership is expired and will pay for not member fee.</b><br/><br/>";
                echo "

         Amount Due<input style='margin-left:25px; margin-bottom: 15px;' type='text' name='amount' id='topay' placeholder='To Pay' value='$gym_feeNM' ng-model='amount' autocomplete='off' readonly required><br/>
         Cash on Hand<input style='margin-left:17px; margin-bottom: 15px;' type='text' name='paidamount' id='paidamount' onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' placeholder='Cash on Hand' ng-model='cash' autocomplete='off' required><br/>
         
         Processed By<input style='margin-left:21px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>
         <input type='text' name='firstname' value='$fname' hidden>
         <input type='text' name='lastname' value='$lname' hidden>
         <input type='text' name='gender' value='$gender' hidden>
         <input type='text' name='time' id='time3' hidden>
         <input type='text' name='date' id='date3' hidden>
         

      <input class='submit' type='submit' name='submit'>

      ";

            }

            

        }else{

                // THE CUSTOMER IS NOT A MEMBER


                echo "<script>showDialog3()</script>";
                echo "<b>$fname $lname is not a member.</b><br/><br/>";
                echo "

         Amount Due<input style='margin-left:25px; margin-bottom: 15px;' type='text' name='amount' id='topay' placeholder='To Pay' value='$gym_feeNM' ng-model='amount' autocomplete='off' readonly required><br/>
         Cash on Hand<input style='margin-left:17px; margin-bottom: 15px;' type='text' name='paidamount' id='paidamount' onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' placeholder='Cash on Hand' ng-model='cash' autocomplete='off' required><br/>
         
         Processed By<input style='margin-left:21px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>
         <input type='text' name='firstname' value='$fname' hidden>
         <input type='text' name='lastname' value='$lname' hidden>
         <input type='text' name='gender' value='$gender' hidden>
         <input type='text' name='time' id='time3' hidden>
         <input type='text' name='date' id='date3' hidden>
         

      <input class='submit' type='submit' name='submit'>

      ";

        }


            
            
        
    
    
    



    
}else{

    // GREATER THAN A DAY

    echo "<script>showDialog2()</script>";
    

        $verifymember = "SELECT * FROM membership WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND middlename='$mname'";
        $result4 = $conn->query($verifymember);

        if($result4->num_rows > 0){

            // THE CUSTOMER IS A MEMBER
            // AND VERIFY THE MEMBERSHIP EXPIRATION

            $verifyexpdate = "SELECT * FROM membership WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND middlename='$mname' AND status='active'";
            $result6 = $conn->query($verifyexpdate);
            if($result6->num_rows > 0){

                // THE MEMBERSHIP IS ACTIVE

                echo "<script>showDialog2()</script>";
                echo "<b>membership status is active.</b><br/>";

                //VERIFY IF THE CUSTOMER HAS A RECORD
             $verifyrecord = "SELECT * FROM customer_avail WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND middlename='$mname'";
             $resultverifyrecord = $conn->query($verifyrecord);

             if($resultverifyrecord->num_rows > 0){

                // THE CUSTOMER HAS A RECORD IN DATABASE
                // VERIFY THE AVAIL PROGRAM

                $row = $resultverifyrecord->fetch_assoc();
                $cid = $row['customer_id'];

                $verifyavail = "SELECT * FROM avails WHERE customer_id='$cid' AND avail_session='$gym_type' AND status='active' ";
                $resultverifyavail = $conn->query($verifyavail);
                if($resultverifyavail->num_rows > 0){

                    echo "$fname $lname's $gym_type is active.";

                    echo "
                         <input id='fname123' type='text' name='firstname' value='$fname' hidden>
                         <input id='lname123' type='text' name='lastname' value='$lname' hidden>
                         <input id='gender123' type='text' name='gender' value='$gender' hidden>
                         <input type='text' name='time' id='time3' hidden>
                         <input type='text' name='date' id='date3' hidden>
                         <input type='text' id='123' value='proceedwalkin' hidden>
                          <input class='submit' type='submit' name='submit' value='Proceed Walkin'>
                    ";


                }else{
                    echo "$fname $lname's $gym_type is not active";

                    echo "
                    <br/><br/>
    <span id='pment'>---Payment---</span><br/><br/>
    <input style='margin-left: 108px; text-align:center;' type='text' name='gymfeename' value='$gym_type' readonly><br/><br/>
    
    <input type='text' name='days' value='$days' hidden>
    Amount Due <input id='amount' type='text' name='amount' value='$gym_fee' readonly required/><br/><br/>
    Cash on Hand <input id='cash' type='text' name='cash' autocomplete='off' required /><br/><br/>
    Processed By<input style='margin-left:18px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>

         <input id='fname123' type='text' name='firstname' value='$fname' hidden>
                         <input id='lname123' type='text' name='lastname' value='$lname' hidden>
                         <input id='gender123' type='text' name='gender' value='$gender' hidden>

                         
                         <input type='text' id='321' value='proceedpayment' hidden>
         

      <input class='submit' type='submit' name='submit'>";
                }




             }else{

                //RECORD THE CUSTOMER'S INFORMATION

                echo "$fname $lname is not in the records, Please Register.<br/><br/>";

                echo "


                 Firstname <input id='fname' type='text' name='firstname' value='$fname' placeholder='Firstname' autocomplete='off' readonly required/>
                Date of Birth <input id='age' type='date' name='dob' required/><br/><br/>
      Lastname <input id='lname' type='text' name='lastname' value='$lname' placeholder='Lastname' autocomplete='off' readonly required/>
      
        
      Contact #<input id='contact' type='text' name='contact' placeholder='Mobile number' autocomplete='off' onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' required/><br/><br/>
      Middlename <input id='mname' type='text' name='middlename' placeholder='Middlename' value='$mname' autocomplete='off' readonly required/>

      <label for='gender'>Gender</label>
    <select id='gender2' name='gender' required>
      <option value=''></option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
    </select><br/><br/>
    
    <span id='pment'>---Payment---</span><br/><br/>
    <input style='margin-left: 108px; text-align:center;' type='text' name='gymfeename' value='$gym_type' readonly><br/><br/>
    
    <input type='text' name='days' value='$days' hidden>
    Amount Due <input id='amount' type='text' name='amount' value='$gym_fee' readonly required/><br/><br/>
    Cash on Hand <input id='cash' type='text' name='cash' autocomplete='off' required onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));'/><br/><br/>
    Processed By<input style='margin-left:18px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>

         <input type='text' name='time' id='time3' hidden>
         <input type='text' name='date' id='date3' hidden>
         

      <input class='submit' type='submit' name='submit'>

         

                    ";



             }   

    


            }else{

                // THE MEMBERSHIP IS EXPIRED

                echo "<script>showDialog2()</script>";
                echo "<b>$fname $lname's membership is expired and will pay for not member fee.</b><br/><br/>";
                //VERIFY IF THE CUSTOMER HAS A RECORD
             $verifyrecord = "SELECT * FROM customer_avail WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND middlename='$mname'";
             $resultverifyrecord = $conn->query($verifyrecord);

             if($resultverifyrecord->num_rows > 0){

                // THE CUSTOMER HAS A RECORD IN DATABASE
                // VERIFY THE AVAIL PROGRAM

                $row = $resultverifyrecord->fetch_assoc();
                $cid = $row['customer_id'];

                $verifyavail = "SELECT * FROM avails WHERE customer_id='$cid' AND avail_session='$gym_type' AND status='active' ";
                $resultverifyavail = $conn->query($verifyavail);
                if($resultverifyavail->num_rows > 0){

                    echo "$fname $lname's $gym_type is active.";

                    echo "
                         <input id='fname123' type='text' name='firstname' value='$fname' hidden>
                         <input id='lname123' type='text' name='lastname' value='$lname' hidden>
                         <input id='gender123' type='text' name='gender' value='$gender' hidden>
                         <input type='text' name='time' id='time3' hidden>
                         <input type='text' name='date' id='date3' hidden>
                         <input type='text' id='123' value='proceedwalkin' hidden>
                          <input class='submit' type='submit' name='submit' value='Proceed Walkin'>
                    ";


                }else{
                    echo "$fname $lname's $gym_type is not active";

                    echo "
                    <br/><br/>
    <span id='pment'>---Payment---</span><br/><br/>
    <input style='margin-left: 108px; text-align:center;' type='text' name='gymfeename' value='$gym_type' readonly><br/><br/>
    
    <input type='text' name='days' value='$days' hidden>
    Amount Due <input id='amount' type='text' name='amount' value='$gym_feeNM' readonly required/><br/><br/>
    Cash on Hand <input id='cash' type='text' name='cash' autocomplete='off' onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' required  /><br/><br/>
    Processed By<input style='margin-left:18px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>

         <input id='fname123' type='text' name='firstname' value='$fname' hidden>
                         <input id='lname123' type='text' name='lastname' value='$lname' hidden>
                         <input id='gender123' type='text' name='gender' value='$gender' hidden>

                         
                         <input type='text' id='321' value='proceedpayment' hidden>
         

      <input class='submit' type='submit' name='submit'>";
                }




             }else{

                //RECORD THE CUSTOMER'S INFORMATION

                echo "$fname $lname is not in the records, Please Register.<br/><br/>";

                echo "


                 Firstname <input id='fname' type='text' name='firstname' value='$fname' placeholder='Firstname' autocomplete='off' readonly required/>
                Date of Birth <input id='age' type='date' name='dob' required/><br/><br/>
      Lastname <input id='lname' type='text' name='lastname' value='$lname' placeholder='Lastname' autocomplete='off' readonly required/>
      
        
      Contact #<input id='contact' type='text' name='contact' placeholder='Mobile number' autocomplete='off' required/><br/><br/>
      Middlename <input id='mname' type='text' name='middlename' placeholder='Middlename' value='$mname' autocomplete='off' readonly required/>

      <label for='gender'>Gender</label>
    <select id='gender2' name='gender' required>
      <option value=''></option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
    </select><br/><br/>
    
    <span id='pment'>---Payment---</span><br/><br/>
    <input style='margin-left: 108px; text-align:center;' type='text' name='gymfeename' value='$gym_type' readonly><br/><br/>
    
    <input type='text' name='days' value='$days' hidden>
    Amount Due <input id='amount' type='text' name='amount' value='$gym_fee' readonly required/><br/><br/>
    Cash on Hand <input id='cash' type='text' name='cash' autocomplete='off' onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' required /><br/><br/>
    Processed By<input style='margin-left:18px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>

         <input type='text' name='time' id='time3' hidden>
         <input type='text' name='date' id='date3' hidden>
         

      <input class='submit' type='submit' name='submit'>

         

                    ";



             }   

            }

            

        }else{

                // THE CUSTOMER IS NOT A MEMBER


                echo "<script>showDialog2()</script>";
                echo "<b>$fname $lname is not a member.</b><br/><br/>";
                //VERIFY IF THE CUSTOMER HAS A RECORD
             $verifyrecord = "SELECT * FROM customer_avail WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND middlename='$mname'";
             $resultverifyrecord = $conn->query($verifyrecord);

             if($resultverifyrecord->num_rows > 0){

                // THE CUSTOMER HAS A RECORD IN DATABASE
                // VERIFY THE AVAIL PROGRAM

                $row = $resultverifyrecord->fetch_assoc();
                $cid = $row['customer_id'];

                $verifyavail = "SELECT * FROM avails WHERE customer_id='$cid' AND avail_session='$gym_type' AND status='active'";
                $resultverifyavail = $conn->query($verifyavail);
                if($resultverifyavail->num_rows > 0){

                    echo "$fname $lname's $gym_type is active.";

                    echo "
                         <input id='fname123' type='text' name='firstname' value='$fname' >
                         <input id='lname123' type='text' name='lastname' value='$lname' >
                         <input id='gender123' type='text' name='gender' value='$gender' >
                         <input type='text' name='time' id='time3' >
                         <input type='text' name='date' id='date3' >
                         <input type='text' id='123' value='proceedwalkin' >
                          <input class='submit' type='submit' name='submit' value='Proceed Walkin'>
                    ";


                }else{
                    echo "$fname $lname's $gym_type is not active";

                    echo "
                    
                    <br/><br/>
    <span id='pment'>---Payment---</span><br/><br/>
    <input style='margin-left: 108px; text-align:center;' type='text' name='gymfeename' value='$gym_type' readonly><br/><br/>
    
    <input type='text' name='days' value='$days' hidden>
    Amount Due <input id='amount' type='text' name='amount' value='$gym_feeNM' readonly required/><br/><br/>
    Cash on Hand <input id='cash' type='text' name='cash' autocomplete='off' onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' required /><br/><br/>
    Processed By<input style='margin-left:18px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>

         <input id='fname123' type='text' name='firstname' value='$fname' hidden>
                         <input id='lname123' type='text' name='lastname' value='$lname' hidden>
                         <input id='gender123' type='text' name='gender' value='$gender' hidden>

                         
                         <input type='text' id='321' value='proceedpayment' hidden>
         

      <input class='submit' type='submit' name='submit'>";
                }




             }else{

                //RECORD THE CUSTOMER'S INFORMATION

                echo "$fname $lname is not in the records, Please Register.<br/><br/>";

                echo "


                Firstname <input id='fname' type='text' name='firstname' value='$fname' placeholder='Firstname' autocomplete='off' readonly required/>
                Date of Birth <input id='age' type='date' name='dob' required/><br/><br/>
      Lastname <input id='lname' type='text' name='lastname' value='$lname' placeholder='Lastname' autocomplete='off' readonly required/>
      
        
      Contact #<input id='contact' type='text' name='contact' placeholder='Mobile number' autocomplete='off'  onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' required/><br/><br/>
      Middlename <input id='mname' type='text' name='middlename' placeholder='Middlename' value='$mname' autocomplete='off' required/>

      <label for='gender'>Gender</label>
    <select id='gender2' name='gender' required>
      <option value=''></option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
    </select><br/><br/>
    
    <span id='pment'>---Payment---</span><br/><br/>
    <input style='margin-left: 108px; text-align:center;' type='text' name='gymfeename' value='$gym_type' readonly><br/><br/>
    
    <input type='text' name='days' value='$days' hidden>
    Amount Due <input id='amount' type='text' name='amount' value='$gym_fee' readonly required/><br/><br/>
    Cash on Hand <input id='cash' type='text' name='cash' autocomplete='off' required onkeypress='return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));' /><br/><br/>
    Processed By<input style='margin-left:18px; margin-bottom: 15px;' type='text' name='verify' id='verify' placeholder='Verified By' value='$processby' readonly required><br/>

         <input type='text' name='time' id='time3' hidden>
         <input type='text' name='date' id='date3' hidden>
         

      <input class='submit' type='submit' name='submit'>

         

                    ";



             } 

        }
    
    

    }
        
}else{
    echo "<script>showDialog3()</script>";
    echo "<h2><b>Please Select Type.</b></h2><br/>";
    
}


            
                    

                   



$conn->close();
    



?>