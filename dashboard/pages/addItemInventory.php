<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/addItemInventory.css">
</head> 
<body>

    
    <h3>Select Item</h3>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">

<div ng-controller="deliveredItemsController2">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <!-- <th>Product ID</th>-->
                        <th>Item Name</th>
                        <th>Supplier</th>
                        <th>Available Quantity</th>
                        <th>Description</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-click="showInEdit(delivered_items)" ng-repeat="delivered_items in data | filter:searchFilter">
                       <!-- <td><a class="click" ng-click="showInEdit(product)">{{product.product_id}}</a></td> -->
                        <td><a class="click" ng-click="showInEdit(delivered_items)">{{delivered_items.product_name}}</td>
                        <td><a class="click" ng-click="showInEdit(delivered_items)">{{delivered_items.supplier}}</td>
                        <td><a class="click" ng-click="showInEdit(delivered_items)">{{delivered_items.available_quantity}}</td>
                        <td><a class="click" ng-click="showInEdit(delivered_items)">{{delivered_items.description}}</td>
                       
                    </tr>
                </tbody>
            </table>
            
          </div>
        </div>



<div id="dlgbox">
    <div id="dlg-header" ><h3>Add Stocks</h3>
      
    </div>
    
    <div id="dlg-body">
    <h3 id="get_data"></h3>
    <form id="products" method="post" action="../php/addItemInventory.php">
      <input type="text" name="product_id" id="id" ng-model="selectedDeliveredItem.product_id" hidden required>
      <input type="text" name="pi_number" id="id" ng-model="selectedDeliveredItem.pi_number" hidden required><br/>
          <h5><center>Click row in table to fill the fields.</center></h5>
         Product<input type="text" name="product_name" id="contact" ng-model="selectedDeliveredItem.product_name"  required readonly><br/>
         Supplier<input type="text" name="supplier" id="contact" ng-model="selectedDeliveredItem.supplier" readonly required><br/>
         Description<input type="text" name="description" id="description" ng-model="selectedDeliveredItem.description" autocomplete="off" required><br />
         Selling Price<input type="number" step="0.01" name="price" id="price" onkeypress="return isNumberKey(event)" autocomplete="off"><br/>
         Quantity<input type="text" class="addQuantity" name="quantity" id="quantity" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" autocomplete="off" required><br/>
         <input type="text" class="available_quantity" name="available_quantity" ng-model="selectedDeliveredItem.available_quantity" required hidden>
         
         
      <input id="submit" class="submit" type="submit" name="submit" value="Add">
    </form>
    </div>
    <div id="dlg-footer">
        <br/><br/>
        
    </div>
</div>
</div>

<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.min.js"></script>
<script src="../js/app.js"></script>

<script type="text/javascript">
      


 $(document).ready(function(){

    
    $('#products').submit(function(e){
		
		var qty = parseInt($('.addQuantity').val(),10);
		var qtyc = parseInt($('.available_quantity').val(),10);
		
		if(qtyc >= qty){
			
			$.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
							  window.location.replace("#/");
                              window.location.replace("#/addItemInventory");
                                    $('#get_data').html(data);
                            }

                  });
			
			
		}else{
			
			$('#get_data').html("Not enough available quantity.");
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


</script>