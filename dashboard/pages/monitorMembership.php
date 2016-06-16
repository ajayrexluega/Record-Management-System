<?php
// Start the session
session_start();
?>
<html>
<head>
      <!--<link rel="stylesheet" type="text/css" href="../css/monitorMembership.css">-->
</head>
<style type="text/css">


*{
     margin: 0;
    padding: 0;
    border: 0;
    vertical-align: baseline;
}
table{
    border-collapse: collapse;
    border-spacing: 0;

}
td{
    padding-top: 10px;
    cursor: pointer;
}
#clickrow:hover{
    background-color: #C4CACC;
}

body{
    background-color: #ebebeb;
}
#table-wrapper {
  position:relative;
}
#table-scroll {
  height:350px;
  width: 1050px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:1000px;
    
}
#table-wrapper table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper table thead th .text {
  position: absolute;   
  top:-20px;
  z-index:2;
  height:25px;
  width: 290px;
  
}
#tr {
margin-left: auto;
margin-right: auto;

}
#top{
text-align: left;
}

.filter{
  height: 25px;
  border-radius: 3px;
}
.filter:focus{
  border: 1px solid #428bca;
    box-shadow: 1px 1px 1px #428bca;
    outline: 0 none;
  transition: 1s;
}




        #white-background{
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fefefe;
            opacity: 0.7;
            z-index: 9999;
        }

        #dlgbox{
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 1300px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }

        #dlg-header{
            background-color: #6d84b4;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0 10px;
        }

        #dlg-body{
            background-color: white;
            color: black;
            font-size: 14px;
            padding: 10px;
            margin: 0 10px 0 10px;
        }

        #dlg-footer{
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0 10px 10px 10px;
        }

        #dlg-footer button{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }
        .submit{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }


        .fname, .lname{
    border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 15px;
  width: 200px;
  height: 35px;
  margin-top: 5px;
  font-size: 12pt;
  margin-left: 50px;
  margin-right: 20px;

}
.fname{
  margin-left: 40px;
}
.age{
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 10px;
  width: 60px;
  height: 35px;
  margin-top: 5px;
  font-size: 12pt;
  margin-left: 50px;
  margin-right: 20px;

}
fieldset{
  border-color: #ccc;
  border-radius: 10px;
  box-shadow: none;
  outline: 0 none;
  

}
#fields{
  float: left;
  
}
.submit{
  width: 90px;
  height: 35px;
  background-color:  #428bca;
  border-radius: 5px;
  cursor:pointer;
  color: #fff;
  border: none;
  margin-bottom: 10px;
  margin-right: 30px;
  float: right;

}
.submit2{
  width: 50px;
  height: 20px;
  background-color:  #d9534f;
  border-radius: 5px;
  cursor:pointer;
  color: #fff;
  border: none;
 padding: 10px;
 margin-top: 40px;
  float: left;

}
.submit:hover{
  background-color: #337ab7;
}
.submit2:hover{
  background-color: #c9302c;
  border-color:#ac2925
}
#move{
  padding-left: 130px;
}
input:focus{
  border: 1px solid #428bca;
    box-shadow: 1px 1px 1px #428bca;
    outline: 0 none;
  transition: .5s;
}
#caddress,#profession,#company,#contact,#school,#course,#email,#facebook,#weigth,#heigth,
#bloodtype,#bp,#medical,#previousgym,#topay,#paidamount,#balance,#regdate,#expdate,#id,#mfee,#mfeec{
width: 200px;
height: 30px;
border-radius: 5px;
border: 1px solid #cccccc;
margin-left: 40px;
margin-bottom: 10px;
padding-left: 10px;
}
#caddress{
  width: 445px;
}
#profession,#company{
  width: 445px;
}
#contact{
  width: 250px;
}
#school,#course{
  width: 250px;
}
#email, #facebook{
  width: 250px;
}
#medical{
  width: 700px;
}
#previousgym{
  width: 500px;
}
select{
  height: 30px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
#regdate,#expdate{
  height: 30px;
}
.datespan{
  margin-left: 40px;
}
#success{
  margin-left: 400px;
  color: green;
}
#id{
  width: 50px;
}
#delYesNo{
  display: none;
}
#delYes,#delNo{
  margin-left: 15px;
}

#scan{
          cursor: pointer;
          border: 1px solid;
          padding: 3px 10px 3px 10px;
          margin-left: 50px;
          color:#fff;
          background-color:#5cb85c;
          border-radius: 3px;
          border-color:#4cae4c;
        }
        #scan:hover{color:#fff;background-color:#449d44;border-color:#398439}
        .dateinput{
          width: 150px;
          height: 25px;
          border: 1px solid #ccc;
          border-radius: 3px;
          margin-left: 5px;
        }

.expired{
  
  background-color: rgba(214, 54, 84, 0.7);
}

#mfee{
  width: 80px;
}
#mfeec{
  width: 80px;
  margin-left: 122px;
}

</style>
<body>

    <br>
    <h1>Membership</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter"><span id="scan" onclick="scan()">Update</span>
    <input id="today" name="today" value="" required hidden>
<div ng-controller="membershipMonitoringController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>ID No.</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Registration Date</th>
                        <th>Membership Expiration</th>                        
                        <th>Membership Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" onclick="showDialog()" ng-click="showInEdit(membership)" ng-repeat="membership in data | filter:searchFilter" ng-class="{'expired' : membership.status == 'expired'}">
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(membership)">{{membership.membership_id}}</a></td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(membership)">{{membership.firstname}} {{membership.lastname}}</td>                        
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(membership)">{{membership.gender}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(membership)">{{membership.reg_date}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(membership)">{{membership.exp_date}}</td>                       
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(membership)">{{membership.status}}</td>
                    </tr>
                </tbody>
            </table>


             <div id="white-background">
</div>
<div id="dlgbox">
    <div id="dlg-header"><h3>Information</h3>
      <p id="delYesNo">Are you sure you want to delete?<button id="delYes" onclick="btnYes()">Yes</button><button id="delNo" onclick="btnNo()">No</button></p>
      
      
    </div>
    <div id="dlg-body">
      <h4></h4>
    
    <form id="membership" method="post" action="../php/monitorMembershipExtend.php">
      <input type="text" name="id" id="id" ng-model="selectedMember.id" readonly hidden>

      <label>Firstname</label><input class="fname" type='text' name='firstname' id='firstname' placeholder="First Name" ng-model="selectedMember.firstname" readonly required/>

      <label>Lastname</label><input class="lname" type='text' name='lastname' id='lastname' placeholder="Last Name" ng-model="selectedMember.lastname" readonly required />
      <label>Middlename</label><input class="lname" type='text' name='middlename' id='lastname' placeholder="Middle Name" autocomplete="off" ng-model="selectedMember.middlename" readonly required />
      <label>Age</label><input class="age" type='text' name='age' id='age' placeholder="Age" autocomplete="off" ng-model="selectedMember.age" readonly required/>

      <select name="gender" ng-model="selectedMember.gender" disabled>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
             </select><br /><br />

         <label>Address</label><input type="text" name="address" id="caddress" placeholder="Current Address" ng-model="selectedMember.address" autocomplete="off" readonly required><br/>
         <label>Contact#</label><input type="text" name="contact" id="contact" placeholder="Contact # (Mobile/Landline)" autocomplete="off" ng-model="selectedMember.contact" readonly>
         <label>Email Address</label><input type="text" name="email" id="email" placeholder="Email Address" autocomplete="off" ng-model="selectedMember.email" readonly>
         <label>Facebook</label><input type="text" name="facebook" id="facebook" placeholder="Facebook" autocomplete="off" ng-model="selectedMember.facebook" readonly><br />
         <label>Weight</label><input type="text" name="weight" id="weigth" placeholder="Weight" autocomplete="off" ng-model="selectedMember.weight" readonly>
         <label>Height</label><input type="text" name="height" id="heigth" placeholder="Height" autocomplete="off" ng-model="selectedMember.height" readonly><br/>
      
          <p hidden>
         <span class="datespan">Subscription</span>
         <select name="subscription" ng-controller="subscriptionlistController" ng-model="selectedMember.subscription" disabled>
            <option  value="None">None</option>
            <option ng-repeat="subscription in data" value="{{subscription.subscription_name}}">{{subscription.subscription_name}}</option>
            
            
         </select>
       
         <input type="text" name="expdate_sub" id="heigth" placeholder="Expiration date" ng-model="selectedMember.expdate_sub" disabled><span class="datespan">Subscription Status<input type="text" ng-model="selectedMember.status_sub" name="expdate_sub" id="heigth" placeholder="Expiration date" disabled><br/>
         </p>
          
         <p hidden>
         <span class="datespan">Membership Expiration date</span><input type="text" name="expdate" id="expdate" placeholder="Expiration date" ng-model="selectedMember.exp_date" disabled><input type="date" name="expdate" id="expdate" placeholder="Expiration date" >
         <span class="datespan">Membership Status <select name="status" ng-model="selectedMember.status" disabled>
                <option value="Not Registered">Not Registered</option>
                <option value="active">Active</option>
                <option value="expired">Expired</option>
             </select></p><br/><br/>

         <span class="datespan">Record Registration Date</span><input type="text" name="regdate" id="regdate" ng-model="selectedMember.reg_date" readonly><br/>
		 
		 <div ng-controller="addmemberController">
		 <span class="datespan">Membership Fee</span>
				
				<input type="text" name="todaydate" id="todaydate" hidden>
          		 
          		 <input type="text" name="verify" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>" hidden>
          		 <input type="text" class="gymfee" id="mfee" name="price" ng-repeat="gym_fees in data " value="{{gym_fees.gym_fee}}" readonly><br/>
          		 <span class="datespan">Cash<input class="cash" type="number" step="0" id="mfeec" name="cash" placeholder="Cash" autocomplete="off" required><br/></span>
		 </div>
		 
      <input id="submit" class="submit" type="submit" name="submit" value="Update">
       <a id="delete" class="submit2" onclick="btnDelete()" hidden>Delete</a>
      
      
    </form>
    </div>
    <div id="dlg-footer">
        <br/><br/>
      
        <button onclick="dlgExit()">Exit</button>
        
    </div>
</div>

<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.min.js"></script>
<script src="../js/app.js"></script>


<script type="text/javascript">
 $(document).ready(function(){

  var my_date_format = function(){
    
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        //var output = ((''+day).length<2 ? '0' : '') + day  + '-' +
        //((''+month).length<2 ? '0' : '') + month + '-' +
        //d.getFullYear();
        var output = d.getFullYear()  + '-' +
        ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day
        ;

        return (output);
 
};
$('#today').val(my_date_format);
$('#todaydate').val(my_date_format);

  


    $('#membership').submit(function(){
          var success = document.getElementById("membership");
          
		  var x = parseInt($('.gymfee').val(),10);
         		var y = parseInt($('.cash').val(),10);
         		if(y >= x){

                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('h4').html(data);
                                    success.style.display = "none";
                            }

                  });
				  
				  }else{
         			$('h4').html("Not enough cash.").delay(3000).slideUp();
         		}

                event.preventDefault();
         });

    


});﻿

 
function scan(){

  var today = document.getElementById("today").value;

  $.ajax({
                           data: {today: today} ,
                           type: "POST",
                           url: '../php/monitorMembershipupdate.php',
                           success: function(data){
                            $('h3').html(data);
                             location.href = "#/";
                            location.href = "#/membershipMonitoring";
                                    
                            }

                  });
                           




 }

 function dlgExit(){

        
        dlgHide();
        location.href = "#/";
        location.href = "#/membershipMonitoring";
    }

    function btnDelete(){

       
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "block";

          /* var bla = $('#id').val();

                  $.ajax({
                           data: {id: bla},
                           type: "POST",
                           url: '../php/deletemember.php',
                           success: function(data){
                                    $('h3').html(data);
                            }

                  });*/ 
       
    }

    function btnYes(){
      var yesNo = document.getElementById("delYesNo");
      var delsuccess = document.getElementById("membership");
      var bla = $('#id').val();

                  $.ajax({
                           data: {id: bla},
                           type: "POST",
                           url: '../php/deletemember.php',
                           success: function(data){
                                    $('h3').html(data);
                            }

                  });
                  yesNo.style.display = "none";
                  delsuccess.style.display = "none";
                  $("#membership")[0].reset();

    }

    function btnNo(){
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "none";


    }

    function dlgHide(){
        var whitebg = document.getElementById("white-background");
        var dlg = document.getElementById("dlgbox");
        whitebg.style.display = "none";
        dlg.style.display = "none";
    }

    function showDialog(){
        var whitebg = document.getElementById("white-background");
        var dlg = document.getElementById("dlgbox");
        whitebg.style.display = "block";
        dlg.style.display = "block";

        var winWidth = window.innerWidth;

        dlg.style.left = (winWidth/2) - 1300/2 + "px";
        dlg.style.top = "30px";

        
    }
</script>