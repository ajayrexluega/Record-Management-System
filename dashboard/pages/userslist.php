<html>
<head>
    <!--<link rel="stylesheet" type="text/css" href="../css/userslist.css">-->
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
            width: 1100px;
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
#bloodtype,#bp,#medical,#previousgym,#topay,#paidamount,#balance,#regdate,#expdate,#id,#secretAnswer
,#expdate_sub{
width: 200px;
height: 30px;
border-radius: 5px;
border: 1px solid #cccccc;
margin-left: 40px;
margin-bottom: 10px;
padding-left: 10px;
}
#secretAnswer{
  width: 500px;
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
  width: 80px;
}
#delYesNo{
  display: none;
}
#delYes,#delNo{
  margin-left: 15px;
}
#walasa{
  display: none;
}
    

</style>
<body ng-controller="userslistController">

    <br>
    <h1>Users List</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">

<div>
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>ID No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" onclick="showDialog()" ng-click="showInEdit(user_accounts)" ng-repeat="user_accounts in data | filter:searchFilter">
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(user_accounts)">{{user_accounts.user_id}}</a></td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(user_accounts)">{{user_accounts.firstname}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(user_accounts)">{{user_accounts.lastname}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(user_accounts)">{{user_accounts.username}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(user_accounts)">{{user_accounts.type}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(user_accounts)">{{user_accounts.status}}</td>
                        
                    </tr>
                </tbody>
            </table>


             <div id="white-background">
</div>
<div id="dlgbox">
    <div id="dlg-header"><h3>User's Information</h3>
      <p id="delYesNo">Are you sure you want to Reset Password?<button id="delYes" onclick="btnYes()">Yes</button><button id="delNo" onclick="btnNo()">No</button></p>
      
      
    </div>
    <div id="dlg-body">
    
    <form id="membership" method="post" action="../php/updateuserdata.php">
      <label>User ID</label><input type="text" name="id" id="id" ng-model="selectedUser.id" readonly><br/>

      <label>Firstname</label><input class="fname" type='text' name='firstname' id='firstname' ng-model="selectedUser.firstname" placeholder="First Name" readonly required/>

      <label>Lastname</label><input class="lname" type='text' name='lastname' id='lastname' ng-model="selectedUser.lastname"  placeholder="Last Name" readonly required />
      

      <span class="datespan">Gender</span>
         <select name="type" ng-model="selectedUser.gender" readonly required>
            <option  value="Male">Male</option>
            <option  value="Female">Female</option>
            
            
         </select><br /><br />

         <label>Address</label><input type="text" name="address" id="caddress" ng-model="selectedUser.address"  placeholder="Current Address" readonly required><br/>
         <label>Contact#</label><input type="text" name="contact" id="contact" ng-model="selectedUser.contact"  placeholder="Contact # (Mobile/Landline)" readonly required>
         <label>Email Address</label><input type="text" name="email" id="email" ng-model="selectedUser.email"  placeholder="Email Address" readonly required><br /><br />
         
         
         <span class="datespan">Type</span>
         <select name="type" ng-model="selectedUser.type"  required>
            <option  value="Staff">Staff</option>
            <option  value="Admin">Admin</option>
            
            
         </select>
         <span class="datespan">Status</span>
         <select name="status" ng-model="selectedUser.status"  required>
            <option  value="Deactivated">Deactivated</option>
            <option  value="Activated">Activated</option>
            
            
         </select><br/></br>
         <span class="datespan"></h3><b>Login information</b></h3></span><br/><br/>
         <label>Username</label><input type="text" name="username" id="heigth" ng-model="selectedUser.username"  placeholder="Username" readonly required><br/>
         <label>Password</label><input type="password" name="password" id="expdate_sub" ng-model="selectedUser.password"  placeholder="Password" readonly required>
         <a style="text-decoration: underline; cursor: pointer;" onclick="btnReset()">Reset Password</a>
         <br/>
        
         <div id="walasa">
         <span class="datespan"></h3><b>For Password Recovery</b></h3></span><br/><br/>
         <span class="datespan">Select Secret Question</span>
         <select name="secretQuestion" ng-model="selectedUser.secret_question"  required>
            <option value="What was your first pet’s name?">What was your first pet’s name?</option>
            <option value="What is your favorite food?">What is your favorite food?</option>
            <option value="What is your mother’s maiden name?">What is your mother’s maiden name?</option>
            <option value="What’s your first teacher’s name?">What’s your first teacher’s name?</option>
            <option value="What is your city of birth?">What is your city of birth?</option>
            <option value="What’s your phone number?">What’s your phone number?</option>
            <option value="What’s your frequent flyer number?">What’s your frequent flyer number?</option>
            <option value="What is your library card number?">What is your library card number?</option>
            <option value="What city were you born in?">What city were you born in?</option>  
         </select></br></br>
         <input type="text" name="secretAnswer" ng-model="selectedUser.secret_answer"  id="secretAnswer" placeholder="Your Secret Answer" readonly required></br>
        </div>

        <input id="submit" class="submit" type="submit" name="submit" value="Update">
       <a hidden id="delete" class="submit2" onclick="btnDelete()">Delete</a>
      
      
    </form>
    </div>
    <div id="dlg-footer">
        <br/><br/>
      
        <button onclick="dlgExit()">Exit</button>
        
    </div>
</div>
</body>
<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.min.js"></script>
<script src="../js/app.js"></script>


<script type="text/javascript">
 $(document).ready(function(){
  


    $('#membership').submit(function(){
          

                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('h3').html(data);
                            }

                  });

                event.preventDefault();
         });


});﻿




 function dlgExit(){

        
        dlgHide();
        location.href = "#/";
        location.href = "#/userslist";
    }

    function btnReset(){

       
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
      var id = $('#id').val();

                  $.ajax({
                           data: {id: id},
                           type: "POST",
                           url: "../php/resetpass.php",
                           success: function(data){
                                    $('h3').html(data);
                            }

                  });
                  yesNo.style.display = "none";
                  delsuccess.style.display = "none";
                  

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

        dlg.style.left = (winWidth/2) - 960/2 + "px";
        dlg.style.top = "30px";

        
    }
</script>