<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/walkinReport.css">
</head>
<body>

    <br>
    <h1>Log List</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter"> <span id="report" onclick="showDialog()">Generate Report</span>

<div ng-controller="loglistWalkinReportController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>ID No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Time-in</th>
                        <th>Time-out</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="walkin_member in data | filter:searchFilter">
                        <td><a>{{walkin_member.id}}</a></td>
                        <td><a>{{walkin_member.firstname}}</td>
                        <td><a>{{walkin_member.lastname}}</td>
                        <td><a>{{walkin_member.gender}}</td>
                        <td><a>{{walkin_member.time}}</td>
                        <td><a>{{walkin_member.time_out}}</td>
                        <td><a>{{walkin_member.datestamp}}</td>
                        
                    </tr>
                </tbody>
            </table>


             <div id="white-background">
</div>
<div id="dlgbox">
    <div id="dlg-header"><h3>Generate Report</h3></div>
    <div id="dlg-body">
    <div id="move"><p id="get_nmember"></p></div>
    <form id="walkinReport" method="post" action="../php/walkinReport.php" target="_blank">

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

<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.min.js"></script>
<script src="../js/app.js"></script>


<script type="text/javascript">
 $(document).ready(function(){
    
    
});﻿


 function dlgExit(){
        dlgHide();
        location.href = "#/l";
        location.href = "#/walkinReport";
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