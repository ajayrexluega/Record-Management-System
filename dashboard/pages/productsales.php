<?php
// Start the session
session_start();
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/productsales.css">
</head>
<body>

    <br>
    <div ng-controller="productsalesController">
      <div id='table-wrapper' >
        <h3>Select Items</h3>
     <input class="filter" type="text" ng-model="searchFilter"  placeholder="Filter">
        <div id='table-scroll'>
    <table id='table12'>
                <thead id='top'>
                    <tr id='tr'>
                        
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Available Stocks</th>
                        <th>Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-click="showInEdit(inventory)" ng-repeat="inventory in data | filter:searchFilter" ng-class="{'hapitna' : inventory.available_stocks <= 10}">
                        
                        <td><a  class="click" ng-click="showInEdit(inventory)" >{{inventory.product_name}}</td>
                        <td><a  class="click" ng-click="showInEdit(inventory)" >{{inventory.price}}</td>
                        <td><a  class="click" ng-click="showInEdit(inventory)" >{{inventory.available_stocks}}</td>
                        <td><a  class="click" ng-click="showInEdit(inventory)" >{{inventory.description}}</td>
                        
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
   

    
        


<div id="dlgbox">
    <div id="dlg-header"><h3>Add to Cart</h3>
      <span id="getdata"></span>
      
    </div>
    
    <div id="dlg-body">
    
    <form id="productsales" method="post" action="../php/paymentQueue.php">
      <!--<input type="text" name="trans_date" id="paymentdate"  readonly><input type="text" name="payment_type" vertical-alignue="Gym Payment"  required><br/>-->
     

         <input name="product_id" type="text" ng-model="selectedItem.product_id" hidden>  
         Product<input type="text" name="product_name" id="prod" placeholder="Product" ng-model="selectedItem.product_name" autocomplete="off" readonly required><br/>
         Description<input type="text" name="description" id="topay2" placeholder="Description" ng-model="selectedItem.description" autocomplete="off" readonly required><br/>
          <p hidden>Price<input type="text" name="price" id="paidamount" placeholder="Price" ng-model="selectedItem.price" autocomplete="off" readonly required><br/></p>
         Quantity<input type="text" name="sold_quantity" id="quantity" placeholder="Quantity" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" ng-model="quantity" autocomplete="off" required><br/>
         <p hidden>Total Amount<input type="text" name="total_amount" id="change" placeholder="Balance" value="{{ selectedItem.price * quantity }}" readonly required><br/></p>
         <input type="text" name="available_stocks" id="available" placeholder="Quantity" ng-model="selectedItem.available_stocks" autocomplete="off" hidden required><br/>
         <input type="text" name="available_left" id="quantity" placeholder="Quantity" value="{{ +selectedItem.available_stocks - +quantity }}" autocomplete="off" hidden required><br/>
         
        
      <a id="proceed" href="#/proceed" hidden>Proceed</a>
      <input id="submit" class="submit" type="submit" name="submit" value="Add">

    </form>
    </div>
  
    </div>
  </div>

<!-- ADD TO CART  -->
<div ng-controller="paymentQueueController">
    <div id='table-wrapper2' >
        <h3>Cart</h3>
     <input class="filter" type="text" ng-model="searchFilter"  placeholder="Filter">
        <div id='table-scroll2'>
    <table id='table122'>
                <thead id='top'>
                    <tr id='tr'>
                        
                        <th>Item</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" onclick="showDialog()" ng-click="showInEdit(payment_queue)" ng-repeat="payment_queue in data | filter:searchFilter">
                        
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(payment_queue)" >{{payment_queue.product_name}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(payment_queue)" >{{payment_queue.description}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(payment_queue)" >{{payment_queue.sold_quantity}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(payment_queue)" >{{payment_queue.total_amount}}</td>
                        

                        
                    </tr>

                </tbody>
            </table>
          </div>
        </div>
   

    
        

<!-- payment -->
<div id="dlgbox3">
    <div id="dlg-header"><h3>Total Payment</h3>
      <span id="getdata2"></span>
      
    </div>
    
    <div id="dlg-body">
    
    <form id="productsales2" method="post" action="../php/addproductsales.php">
      <!--<input type="text" name="trans_date" id="paymentdate"  readonly><input type="text" name="payment_type" vertical-alignue="Gym Payment"  required><br/>-->
     

         
         <input type="text" name="payment_type" value="Product Payment" hidden required>
         <input type="text" id="paymentdate" name="trans_date" value="" hidden required>
         Total Amount<input type="text" name="total_amount" class="change" id="change" placeholder="Balance" value="{{ totalPrice() }}" readonly required><br/>
         Cash<input type="number" step="0.01" name="cash" class="topay" id="topay" placeholder="Cash" ng-model="cash"  autocomplete="off" required><br/>
         <p hidden>Change/Balance<input type="text" name="change" id="paidamount" placeholder="Price" value="{{ +totalPrice() - +cash | positive }}" readonly autocomplete="off" required><br/></p>
         Processed By <input type="text" id="change" name="verify" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>" required readonly><br/>
         
         
        
      <a id="proceed" href="#/productsales" hidden>Back</a>
      <input id="submit" class="submit3" type="submit" name="submit" value="Finish">

    </form>
    </div>
    </div>


    <!-- For Update -->
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

</div>  

<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.min.js"></script>
<script src="../js/app.js"></script>

<script type="text/javascript">


 $(document).ready(function(){


 /* var my_date_format = function(){
    
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = ((''+day).length<2 ? '0' : '') + day  + '/' +
        ((''+month).length<2 ? '0' : '') + month + '/' +
        d.getFullYear();

        return (output);
 
};


  $('#paymentdate').val(my_date_format); */
  
  
  
    
    $('#productsales').submit(function(){
          var quan = parseFloat($('#quantity').val(),10);
          var avail = parseFloat($("#available").val(),10);
            if(quan <= avail){

               $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                            window.location.replace("#/");
                            window.location.replace("#/productsales");
                                    $('#getdata').html(data);
                            }


                  });
               

            }else{
              $('#getdata').html("<b>Sorry,not enough available stocks.</b>");
            }
                 

                event.preventDefault();
         });

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


  $('#paymentdate').val(my_date_format); 
  
  
    $('#productsales2').submit(function(e){

          var zeroitem = document.getElementById("change").value;
          var total = parseFloat($('.change').val(),10);
          var cash = parseFloat($(".topay").val(),10);
          if(zeroitem == '0'){

              $('#getdata2').html("<b>Please, add items to be purchased.</b><br/><br/>")
          }else{
                    if(total <= cash){

                       $.ajax({
                                   data: $(this).serialize(),
                                   type: $(this).attr('method'),
                                   url: $(this).attr('action'),
                                   success: function(data){
                                    window.location.replace("#/");
                                    window.location.replace("#/productsales");
                                            $('#getdata2').html(data);
                                    }


                          });
                       

                    }else{
                      $('#getdata2').html("<b>Sorry,not enough cash.</b>");
                    }
          }
                 

                e.preventDefault();
         });
});﻿

function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

function dlgExit(){

        
        dlgHide();
        location.href = "#/";
        location.href = "#/productsales";
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