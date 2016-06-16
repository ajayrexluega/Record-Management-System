<html>
<head>
    
    <style>
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

/*  ACTIVE AVAILS TABLE */

#table-wrapper2 {
  position:relative;
}
#table-scroll2 {
  height:200px;
  width: 450px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper2 table {
  width:450px;
    
}
#table-wrapper2 table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper2 table thead th .text {
  position: absolute;   
  top:-20px;
  z-index:2;
  height:25px;
  width: 290px;
  
}
#tr2 {
margin-left: auto;
margin-right: auto;

}
#top2{
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
            width: 1000px;
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
            margin-top: 85px
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
  background-color:  #337ab7;
  border-radius: 5px;
  cursor:pointer;
  color: #fff;
  border-color:#2e6da4;
  margin-top: -10px;
  
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
  color:#fff;background-color:#286090;border-color:#204d74
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
#bloodtype,#bp,#medical,#previousgym,#topay,#paidamount,#balance,#regdate,#expdate,#id{
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
  
  border: 1px solid;
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
    </style>
</head>
<body>

    <br>
    <h2>Customer Records</h2>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter"><span id="scan" onclick="scan()" >Update</span>
    <input id="today" name="today" value="" required hidden>
<div ng-controller="subscriptionMonitoringController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>ID No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Middlename</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Contact</th>                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" onclick="showDialog();show()" ng-click="showInEdit(customer_avail)" ng-repeat="customer_avail in data | filter:searchFilter">
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(customer_avail)">{{customer_avail.customer_id}}</a></td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(customer_avail)">{{customer_avail.firstname}}</td>                        
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(customer_avail)">{{customer_avail.lastname}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(customer_avail)">{{customer_avail.middlename}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(customer_avail)">{{customer_avail.gender}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(customer_avail)">{{customer_avail.dob}}</td>                        
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(customer_avail)">{{customer_avail.contact}}</td>                       
                        
                    </tr>
                </tbody>
            </table>


             <div id="white-background" onmouseover="show()">
</div>
<div id="dlgbox" >
    <div id="dlg-header"><h3 >{{selectedCustomer.firstname}} {{selectedCustomer.lastname}}'s Avail/s</h3>
      <h5></h5>
      <button hidden class='submit'>Update Info</button></div>
    <div id="dlg-body">
      <input id="or" type="text" ng-model="selectedCustomer.customer_id" hidden>
      <div id="qwerty" >



        
      </div>

      
    </div>
    <div id="dlg-footer" >

        <button onclick="dlgExit()">Exit</button>
    </div>
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

function update(){

  var cid = $('#id2').val();
      var fname = $('#fname2').val();
      var lname = $('#lname2').val();
      var mname = $('#mname2').val();
      var dob = $('#dob2').val();
      var gender = $('#gender2').val();
      var contact = $('#contact2').val();
          

                  $.ajax({
                           data: {cid: cid, firstname:fname,lastname:lname,middlename:mname,dob:dob,contact:contact,gender:gender},
                           type: "POST",
                           url: "../php/customerAvailsUpdate.php",
                           success: function(data){
                                    $('h5').html(data).delay(3000).slideUp();
                            }

                  });

                event.preventDefault();


}

 
function scan(){

  var today = document.getElementById("today").value;

  $.ajax({
                           data: {today: today} ,
                           type: "POST",
                           url: '../php/monitorSubscriptionupdate.php',
                           success: function(data){
                            $('h3').html(data);
                             location.href = "#/";
                            location.href = "#/subscriptionMonitoring";
                                    
                            }

                  });
                           




 }

 function show(){
  var cid = $('#or').val();

                  $.ajax({
                           data: {customer_id: cid},
                           type: "POST",
                           url: '../php/customerAvails.php',
                           success: function(data){
                                    $('#qwerty').html(data);
                            }

                      });

}

 function dlgExit(){

        
        dlgHide();
        location.href = "#/";
        location.href = "#/subscriptionMonitoring";
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

        dlg.style.left = (winWidth/2) - 900/2 + "px";
        dlg.style.top = "30px";

        
    }
</script>