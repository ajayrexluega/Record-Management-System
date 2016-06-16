<html>
<head>
   <link rel="stylesheet" type="text/css" href="../css/deliveredItems.css">
</head>

<body>

    <br>
    <h2>Delivered Items List</h2>
    <input class="filter" type="text" ng-model="searchFilter" value="qweqwe"placeholder="Filter">

<div ng-controller="deliveredItemsController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>PO No.</th>
                        <th>Product_name</th>
                        <th>Supplier</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Delivered Date</th>
                        <th>Qty Received</th>
                        <th>Approved By</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-class="{'pending': delivered_items.quantity_received != delivered_items.quantity}" ng-repeat="delivered_items in data | filter:searchFilter">
                      <!--<td onclick="showDialog()" ng-click="showInEdit(delivered_items)">{{delivered_items.pi_number}}</td>-->
                        <td>{{delivered_items.pi_number}}</td>
                        <td>{{delivered_items.product_name}}</td>
                        <td>{{delivered_items.supplier}}</td>
                        <td>{{delivered_items.description}}</td>
                        <td>{{delivered_items.quantity}}</td>
                        <td>{{delivered_items.delivered_date}}</td>
                        <td>{{delivered_items.quantity_received}}</td>
                        <td>{{delivered_items.approved_by}}</td>
                        
                        
                    </tr>
                </tbody>
            </table>


   <div id="white-background">
</div>
<div id="dlgbox" ng-controller="purchasedItemslistController">
    <div id="dlg-header"><h3 id="delSuccess">Information</h3>
      <p id="delYesNo">Are you sure you want to delete?<button id="delYes" onclick="btnYes()">Yes</button><button id="delNo" onclick="btnNo()">No</button></p>
    </div>
    
    <div id="dlg-body">
    <h1></h1>

    <form id="inventory" method="post" action="../php/proceedDelivery.php">
      PO number<input type="text" name="pi_number" id="id" ng-model="selectedOrderedItemsSupplier.pi_number" readonly><br/>
      Order Date<input type="text" name="order_date" id="stockin" ng-model="selectedOrderedItemsSupplier.order_date" readonly><br/>
      Amount<input type="text" name="amount" id="contact" ng-model="selectedOrderedItemsSupplier.amount" readonly><br/>
      
      
      
       
         
        
      <input id="submit" class="submit" type="submit" name="submit"  value="Process Delivery">
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
  


    $('#inventory').submit(function(){
          

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

    $('#clickrow').click(function(){

      var pin = $('#id').val();
                  $.ajax({
                           data: {pi_number: pin} ,
                           type: "POST",
                           url: '../php/poItem.php',
                           success: function(){

                            
                                  
                            }

                  });

                event.preventDefault();



    });


});﻿


 function dlgExit(){

        
        dlgHide();
        location.href = "#/";
        location.href = "#/addsupplier";
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
      var hideform = document.getElementById('inventory');
      var bla = $('#id').val();

                  $.ajax({
                           data: {product_id: bla},
                           type: "POST",
                           url: '../php/deleteItemInventoryList.php',
                           success: function(data){
                                    $('h3').html(data);
                            }

                  });
                  yesNo.style.display = "none";
                  hideform.style.display = 'none';
                  $("#inventory")[0].reset();

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

        dlg.style.left = (winWidth/2) - 460/2 + "px";
        dlg.style.top = "30px";

          
            
         

        
    }
</script>