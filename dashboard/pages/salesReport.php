<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/salesReport.css">
</head> 
<body>

    <br>
    <h1>Sales Vault</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter"> <span id="report" onclick="showDialog()">Generate Report</span>

<div ng-controller="salesVaultController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        
                        <th>Payment Type</th>
                        <th>Transaction Date</th>
                        <th>Total Amount</th>
                        <th>Processed By</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="showDialog2()" id="clickrow" ng-click="showInEdit(sales)" ng-repeat="sales in data | filter:searchFilter" >
                        
                        <td>{{sales.payment_type}}</td>
                        <td>{{sales.trans_date}}</td>
                        <td>{{sales.amount}}</td>
                        <td>{{sales.verify}}</td>
                        
                        
                    </tr>
                </tbody>
            </table>
</div>
</div>

             <div id="white-background">
</div>
<div id="dlgbox">
    <div id="dlg-header"><h3>Generate Report</h3></div>
    <div id="dlg-body">
    <div id="move"><p id="get_nmember"></p></div>
    <form id="walkinReport" method="post" action="../php/salesReport.php" target="_blank">

      <b>Date</b></br>
           From <input class="dateinput" type="date" name="from"><br/><br/>
           To<input class="dateinput2" type="date" name="to">
           <input type="text" name="processedby" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>" hidden required>
           
            

      <br/><br/><br/><br/><input id="submit" class="submit" type="submit" name="submit" value="Generate">
    </form>
    </div>
    <div id="dlg-footer">

        <button onclick="dlgExit()">Exit</button>
    </div>
</div>

<div id="white-background2" onmouseover="show()">
</div>
<div id="dlgbox2" onmouseover="show()">
    <div id="dlg-header2"><h3 onmouseover="show()">Products</h3><p id="totspan"><span >Total Amount </span> <input id="totalsales" type="text" ng-model="selectedProductSales.amount" readonly></p></div>
    <div id="dlg-body2">
      <input id="or" type="text" ng-model="selectedProductSales.or_number" hidden>
      <div id="qwerty" onmouseover="show()">
      </div>
    
    
    </div>
    <div id="dlg-footer2" onmouseover="show()">

        <button onclick="dlgExit()">Exit</button>
    </div>
</div>
</div>
<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.min.js"></script>
<script src="../js/app.js"></script>


<script type="text/javascript">
 $(document).ready(function(){

                

    
    
    
});﻿
function show(){
  var or = $('#or').val();

                  $.ajax({
                           data: {or_number: or},
                           type: "POST",
                           url: '../php/salesReportProductShow.php',
                           success: function(data){
                                    $('#qwerty').html(data);
                            }

                      });

}


 function dlgExit(){
        dlgHide();
        location.href = "#/l";
        location.href = "#/salesReport";
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

     function showDialog2(){

        var whitebg = document.getElementById("white-background2");
        var dlg = document.getElementById("dlgbox2");
        whitebg.style.display = "block";
        dlg.style.display = "block";

        var winWidth = window.innerWidth;

        dlg.style.left = (winWidth/2) - 850/2 + "px";
        dlg.style.top = "60px";

        

        
    }
</script>