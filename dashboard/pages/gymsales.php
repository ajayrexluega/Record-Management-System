<?php
// Start the session
session_start();
?>

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

}
body{
    background-color: #ebebeb;
}
#table-wrapper {
  /*float: right;*/
  
}
#table-scroll {
  height: 400px;
  width: 500px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width: 450px;
    
}
#table-wrapper table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper table thead th .text {
    
  top:-20px;
  
  height:25px;
  width: 190px;
  
}
#tr {
margin-left: 0;
margin-right: 0;

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

#dlgbox{
  float: right;
  margin-top: -410px;
  border: 1px solid black;
  border-radius: 5px;
  padding: 10px;

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
.submit:hover{
  background-color: #337ab7;
}
#move{
  padding-left: 130px;
}


.fname, .lname{
    border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 15px;
  width: 200px;
  height: 35px;
  margin-top: 5px;
  font-size: 12pt;
  margin-left: 40px;
  margin-right: 20px;

}
.fname{
  
}
input:focus{
  border: 1px solid #428bca;
    box-shadow: 1px 1px 1px #428bca;
    outline: 0 none;
  transition: .5s;
}

#topay,#paidamount,#change,
#id,#verify{
width: 200px;
height: 30px;
border-radius: 5px;
border: 1px solid #cccccc;
margin-left: 40px;
margin-bottom: 10px;
padding-left: 10px;
}

#topay{
  margin-left: 35px;
}
#paidamount{
  margin-left: 25px;
}
#change{
  margin-left: 10px;
}
#verify{
  margin-left: 35px;
}
select{
  height: 30px;
  border-radius: 5px;
  margin-left: 40px;
}

#success{
  margin-left: 400px;
  color: green;
}
#id{
  width: 50px;
}

    </style>
</head>
<body ng-controller="gymsalesController">

    <br>

      <div id='table-wrapper'>
        <h3>Gym Sales Vault</h3>
     <input class="filter" type="text" ng-model="gymsales" hidden placeholder="Filter">
        <div id='table-scroll'>
    <table id='table12'>
                <thead id='top'>
                    <tr id='tr'>
                        
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Processed By</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="sales in data | filter:gymsales">
                        
                        <td><a  class="click" >{{sales.trans_date}}</td>
                        <td><a  class="click" >{{sales.amount}}</td>
                        <td><a  class="click" >{{sales.verify}}</td>
                        
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
   

    
        


<div id="dlgbox">
    <div id="dlg-header"><h3>Gym Payment</h3><br/>
      <span id="getdata"></span>
      
    </div>
    <div ng-controller="gymfeelistController">
    <div id="dlg-body">
    
    <form id="gymsales" method="post" action="../php/addgymsales.php">
      <input type="text" name="trans_date" id="paymentdate" hidden readonly><input type="text" name="payment_type" value="Gym Payment" hidden required><br/>
      <!--Type<select name="detail" required>
            <option value="Membership Fee">Membership Fee</option>
            <option value="Monthly Fee">Monthly Fee</option>
            <option value="Single Session Fee">Sigle Session Fee</option>
         </select><br/><br/>-->

         
 
    <label for="repeatSelect"> Type select: </label>
    <select id="repeatSelect" ng-model="data.repeatSelect">
      <option id="type" ng-repeat="gym_fees in data" value="{{gym_fees.gym_fee}}">{{gym_fees.gym_type}}</option>
    </select>
  <br/><br/>

         
         Amount Due<input type="text" name="amount" id="topay" placeholder="To Pay" value="{{data.repeatSelect}}" autocomplete="off" readonly required><br/>
         Cash on Hand<input type="text" name="paidamount" id="paidamount" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" placeholder="Paid Amount" ng-model="cash" autocomplete="off" required><br/>
         <p hidden>Change/Balance<input type="text" name="change" id="change" placeholder="Balance" value="{{ data.repeatSelect - cash | positive}}" readonly required><br/></p>
         Processed By<input type="text" name="verify" id="verify" placeholder="Verified By" value='<?php echo $_SESSION['username']; ?>' readonly required><br/>
         
        
        
      <input id="submit" class="submit" type="submit" name="submit" value="Finish">
    </form>
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

  var ge = $('#change').val();
  console.log(ge);


  $('#paymentdate').val(my_date_format);
  
  
    
    $('#gymsales').submit(function(e){
          var topay = parseInt($('#topay').val(),10);
          var cash = parseInt($("#paidamount").val(),10);
            if(topay <= cash){

               $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('#getdata').html(data);
                            }


                  });
               window.location.replace("#/");
               window.location.replace("#/gymsales");

            }else{
              $('#getdata').html("<b>Sorry,not enough cash.</b>");
            }
                 

                e.preventDefault();
         });
});﻿


 function dlgExit(){
        dlgHide();
        location.href = "#/";
        location.href = "#/membersales";
    }

    function dlgOK(){
        
        document.getElementsByTagName("H3")[0].innerHTML = "Membership Payment";
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

        dlg.style.left = (winWidth/2) - 850/2 + "px";
        dlg.style.top = "0px";
    }
</script>