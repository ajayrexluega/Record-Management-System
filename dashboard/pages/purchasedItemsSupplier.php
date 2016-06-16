<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/purchasedItemsSupplier.css">
</head> 
<body>

    <br>
    <h3>Purchased Orders From Supplier List</h3>
    <input class="filter" type="text" ng-model="searchFilter" value="qweqwe"placeholder="Filter">

<div ng-controller="purchasedItemsSupplierController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>PO No.</th>
                        <th>Date order</th>
                        <!--<th>Amount</th>-->
                        <th>Processed By</th>
                        <th>Status</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-repeat="ordered_items_supplier in data | filter:searchFilter" ng-class="{'pending' : ordered_items_supplier.status == 'Pending'}">
                        <td onclick="showDialog()" ng-click="showInEdit(ordered_items_supplier)">{{ordered_items_supplier.pi_number}}</td>
                        <td onclick="showDialog()" ng-click="showInEdit(ordered_items_supplier)">{{ordered_items_supplier.order_date}}</td>
                        <!--<td onclick="showDialog()" ng-click="showInEdit(ordered_items_supplier)">{{ordered_items_supplier.amount}}</td>-->
                        <td onclick="showDialog()" ng-click="showInEdit(ordered_items_supplier)">{{ordered_items_supplier.processed_by}}</td>
                        <td onclick="showDialog()" ng-click="showInEdit(ordered_items_supplier)">{{ordered_items_supplier.status}}</td>
                        
                        
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
            
            <div class="pending foo"></div> - Pending

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
      
      
      
       
         
        
      <input id="submit" class="submit" type="submit" name="submit"  value="Process Delivery Items">
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
                           success: function(){
                                    
                                    location.href = "#/proceedDeliverypage";
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
        location.href = "#/purchasedItemsSupplier";
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