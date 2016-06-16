<?php
// Start the session
session_start();
?>

<html>
<head>
      <!--<link rel="stylesheet" type="text/css" href="../css/proceedDeliverypage.css">-->
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
  /*float: right;*/
  
}
#table-scroll {
  height: 400px;
  width: 700px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width: 700px;
    
}
#table-wrapper table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper table thead th .text {
    
  top:-20px;
  
  height:25px;
  width: 100px;
  
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
#id,#verify,#quantity,#product,#supplier,#product2,#totalAmount{
width: 200px;
height: 30px;
border-radius: 5px;
border: 1px solid #cccccc;
margin-left: 40px;
margin-bottom: 10px;
padding-left: 10px;
}

#totala{
  margin-left: -70px;
}
#product{
  margin-left: 35px;
}
#supplier{
  margin-left: 52px;
}
#product2{
  margin-left: 52px;
}
#quantity{
  margin-left: 70px;
}

#topay{
  margin-left: 33px;
}
#paidamount{
  margin-left: 55px;
}
#change{
  margin-left: 20px;
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

#proceed{
  color:#fff;
  background-color:#5bc0de;
  border-color:#46b8da;
  padding: 5px;
  border-radius: 5px;
  margin-bottom: 5px;
  margin-left: 5px;
  float: left;

}
#proceed:hover{color:#fff;
  background-color:#31b0d5;
  border-color:#269abc;
}




#white-background2{
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

        #dlgbox2{
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 600px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }

        #dlg-header2{
            background-color: #6d84b4;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0 10px;
        }

        #dlg-body2{
            background-color: white;
            color: black;
            font-size: 14px;
            padding: 10px;
            margin: 0 10px 0 10px;
        }

        #dlg-footer2{
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0 10px 10px 10px;
        }

        #dlg-footer2 button{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }
        .submit2{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }
        #delYesNo{
            display: none;
          }
          #delYes,#delNo{
            margin-left: 15px;
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
.submit2:hover{
  background-color: #c9302c;
  border-color:#ac2925
}

</style>
<body ng-controller="proceedDeliverypageController">

    <br>

      <div id='table-wrapper'>
        <h3>Select row</h3>
     <input class="filter" type="text" ng-model="searchFilter"  placeholder="Filter">
        <div id='table-scroll'>
    <table id='table12'>
                <thead id='top'>
                    <tr id='tr'>
                        <th>PO no.</th>
                        <th>Item</th>
                        <th>Supplier</th>
                        <th>Description</th>
                        <th>Quantity</th>
                       <!-- <th>Total Amount</th> -->
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-click="showInEdit(process_order_delivery)" ng-repeat="process_order_delivery in data | filter:searchFilter">
                        <td><a class="click" ng-click="showInEdit(process_order_delivery)" >{{process_order_delivery.pi_number}}</td>
                        <td><a class="click" ng-click="showInEdit(process_order_delivery)" >{{process_order_delivery.product_name}}</td>
                        <td><a class="click" ng-click="showInEdit(process_order_delivery)" >{{process_order_delivery.supplier}}</td>
                        <td><a class="click" ng-click="showInEdit(process_order_delivery)" >{{process_order_delivery.description}}</td>
                        <td><a class="click" ng-click="showInEdit(process_order_delivery)" >{{process_order_delivery.quantity}}</td>
                      <!--  <td><a class="click" ng-click="showInEdit(process_order_delivery)" >{{process_order_delivery.amount}}</td> -->
                        

                        
                    </tr>

                </tbody>
            </table>
          </div>
        </div>
   

    
        

<!-- payment -->
<div id="dlgbox">
    <div id="dlg-header"><h3>Add to Delivered items</h3><br/>
      <span id="getdata"></span>
      
    </div>
    
    <div id="dlg-body">
    
    <form id="deliver" method="post" action="../php/delivered_items.php">
      <input type="text" name="delivered_date" id="paymentdate2" hidden readonly>
      <!--<input type="text" name="payment_type" vertical-alignue="Gym Payment"  required><br/>-->
     

         
         <input type="text" name="product_id" ng-model="selectedProcessItem.product_id" hidden required>
         <input type="text" id="paymentdate" name="pi_number" ng-model="selectedProcessItem.pi_number" hidden  required><br/>
         Item Name<input type="text" name="item_name" id="product" placeholder="Item Name" ng-model="selectedProcessItem.product_name" readonly required><br/>
         Supplier <input type="text" name="supplier" id="supplier" placeholder="Supplier" ng-model="selectedProcessItem.supplier" readonly required><br/>
         Description<input type="text" name="description" id="topay" placeholder="Description" ng-model="selectedProcessItem.description" readonly autocomplete="off" required><br/>
         Quantity<input type="text" class="quantity_receive" name="quantity_received" id="paidamount" placeholder="Quantity"  autocomplete="off" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" required><br/>
         Approved By <input type="text" id="change" name="approved_by" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>" required readonly><br/>
         <input type="text" class="quantity" name="quantity" ng-model="selectedProcessItem.quantity" readonly hidden>
         
         
        
      <a id="proceed" href="#/purchasedItemsSupplier">Back</a>
      <input id="submit" class="submit" type="submit" name="submit" value="Add">

    </form>
    </div>
    </div>


    <!-- For Update 
    <div id="white-background2">
</div>
<div id="dlgbox2">
    <div id="dlg-header2"><h3 id="delSuccess">Information</h3>
      <p id="delYesNo">Are you sure you want to delete?<button id="delYes" onclick="btnYes()">Yes</button><button id="delNo" onclick="btnNo()">No</button></p>
    </div>
    
    <div id="dlg-body2">
    <h2></h2>
    <form id="cancelqueue" method="post" action="../php/cancelqueue.php">
      <input type="text" name="id" id="id" ng-model="selectedQueue.id"  readonly hidden><br/>

         Product<input type="text" name="product_name" id="product" ng-model="selectedQueue.product_name" readonly required><br/>
         Description<input type="text" name="product_name" id="product2" ng-model="selectedQueue.description" readonly required><br/>
         Quantity<input type="text" name="sold_quantity" id="quantity" ng-model="selectedQueue.sold_quantity" readonly><br/>
         Total Amount<input type="text" name="total_amount" id="totalAmount" ng-model="selectedQueue.total_amount" readonly><br/>
         <input type="text" ng-model="selectedQueue.price" hidden><br/>
         <input type="text" id="available_stocks" name="available_stocks" ng-model="selectedQueue.available_stocks" hidden><br/>
         <input type="text" ng-model="selectedQueue.available_left" hidden>
         <input type="text" id="product_id" name="product_id" ng-model="selectedQueue.product_id" hidden>
         
         
        
      <input id="submit" class="submit" type="submit" name="submit" hidden value="Update">
      <a id="delete" class="submit2" onclick="btnDelete()">Delete</a>
    </form>
    </div>
    <div id="dlg-footer2">
        <br/><br/>
        <button onclick="dlgExit()">Exit</button>
    </div>
</div>  
-->


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


  $('#paymentdate2').val(my_date_format); 
  
  
    $('#deliver').submit(function(e){

      var qtyrc = parseInt($(".quantity").val(),10);
      var qty = parseInt($(".quantity_receive").val(),10);
      if(qtyrc >= qty){
          
                    

                       $.ajax({
                                   data: $(this).serialize(),
                                   type: $(this).attr('method'),
                                   url: $(this).attr('action'),
                                   success: function(data){
                                    window.location.replace("#/");
                                    window.location.replace("#/proceedDeliverypage");
                                    
                                            $('#getdata').html(data);
                                    }


                          });
                       

             }else{

                  $('#getdata').html("You only have a maximum of " + qtyrc + " to received.");

             }       
                 

                e.preventDefault();
         });
});﻿


 function dlgExit(){

        
        dlgHide();
        location.href = "#/";
        location.href = "#/proceed";
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
      
      var success = document.getElementById("cancelqueue");
      var yesNo = document.getElementById("delYesNo");
      var id = $('#id').val();
      var available = $('#available_stocks').val();
      var pid = $('#product_id').val();



                  $.ajax({
                           data: {id: id , available_stocks: available ,product_id: pid},
                           type: "POST",
                           url: '../php/cancelqueue.php',
                           success: function(data){
                                    $('#delSuccess').html(data);
                            }

                  });
                  yesNo.style.display = "none";
                  success.style.display = "none";
                  $("#cancelqueue")[0].reset();

    }

    function btnNo(){
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "none";


    }

    function dlgHide(){
        var whitebg = document.getElementById("white-background2");
        var dlg = document.getElementById("dlgbox2");
        whitebg.style.display = "none";
        dlg.style.display = "none";
    }

    function showDialog(){
        var whitebg = document.getElementById("white-background2");
        var dlg = document.getElementById("dlgbox2");
        whitebg.style.display = "block";
        dlg.style.display = "block";

        var winWidth = window.innerWidth;

        dlg.style.left = (winWidth/2) - 560/2 + "px";
        dlg.style.top = "30px";

        
    }
</script>