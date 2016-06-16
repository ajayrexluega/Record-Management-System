<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="../css/outofstocklist.css">
</head>
<body>

    <br>
    <h1>Out of Stocks List</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">

<div ng-controller="outofStockController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        
                        <th>Available Stocks</th>
                        <th>Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-click="showInEdit(inventory)" onclick="showDialog()" ng-repeat="inventory in data | filter:searchFilter">
                        <td>{{inventory.product_id}}</td>
                        <td>{{inventory.product_name}}</td>
                        
                        <td>{{inventory.available_stocks}}</td>
                        <td>{{inventory.description}}</td>
                        
                    </tr>
                </tbody>
            </table>


   <div id="white-background">
</div>
<div id="dlgbox">
    <div id="dlg-header"><h3 id="delSuccess">Information</h3>
      <p id="delYesNo">Are you sure you want to delete?<button id="delYes" onclick="btnYes()">Yes</button><button id="delNo" onclick="btnNo()">No</button></p>
    </div>
    
    <div id="dlg-body">
    <h2></h2>
    <form id="inventory" method="post" action="../php/updateInventoryList.php">
      <input type="text" name="product_id" id="id" ng-model="selectedOItem.product_id" hidden readonly><br/>

         Product Name<input type="text" name="product_name" id="contact" ng-model="selectedOItem.product_name" readonly required><br/>
         Available Stocks<input type="text" name="available_stocks" id="astock" ng-model="selectedOItem.available_stocks" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"><br/>
         <input type="text" name="stock_in" id="stockin" ng-model="selectedOItem.stock_in" hidden readonly>
         Description<input type="text" name="description" id="description" ng-model="selectedOItem.description" readonly><br />
         
         
        
      <input id="submit" class="submit" type="submit" name="submit" hidden value="Update">
      <a id="delete" class="submit2" onclick="btnDelete()">Delete</a>
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
});﻿


 function dlgExit(){

        
        dlgHide();
        location.href = "#/";
        location.href = "#/outofStock";
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

        dlg.style.left = (winWidth/2) - 560/2 + "px";
        dlg.style.top = "30px";

        
    }
</script>