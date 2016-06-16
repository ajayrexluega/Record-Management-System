<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/inventoryReport.css">
</head>
<body>

    <br>
    <h1>Items List</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter"> <span id="report" onclick="showDialog()">Generate Report</span>

<div ng-controller="inventorylistController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Stock In</th>
                        <th>Available Stocks</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="inventory in data | filter:searchFilter">
                         <td>{{inventory.product_id}}</td>
                        <td>{{inventory.product_name}}</td>
                        <td>{{inventory.stock_in}}</td>
                        <td>{{inventory.available_stocks}}</td>
                        <td>{{inventory.description}}</td>
                        
                    </tr>
                </tbody>
            </table>


             <div id="white-background">
</div>
<div id="dlgbox">
    <div id="dlg-header"><h3>Generate Report</h3></div>
    <div id="dlg-body">
    <div id="move"><p id="get_nmember"></p></div>
    <form id="walkinReport" method="post" action="../php/inventoryReport.php" target="_blank">

      Date
           <input class="dateinput" type="text" name="date" readonly required><br/><br/>
           
           Processed by<input type="text" class="dateinput2" name="processedby" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>" readonly required>
           
            

      <br/><br/><br/><br/><input id="submit" class="submit" type="submit" name="submit" value="Generate">
    </form>
    </div>
    <div id="dlg-footer">

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


  

  $('.dateinput').val(my_date_format);
    
    
});﻿


 function dlgExit(){
        dlgHide();
        location.href = "#/l";
        location.href = "#/inventoryReport";
    }

    function dlgOK(){
        dlgHide();
        document.getElementsByTagName("H1")[0].innerHTML = "You clicked OK.";
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

        dlg.style.left = (winWidth/2) - 480/2 + "px";
        dlg.style.top = "150px";
    }
</script>