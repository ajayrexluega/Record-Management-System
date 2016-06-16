<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/loglist.css">
</head>
<body>

    <br>
    <h1>Log List</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">

<div ng-controller="loglistController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        
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
    <div id="dlg-header"><h3>Information</h3></div>
    <div id="dlg-body">
    <div id="move"><p id="get_nmember"></p></div>
    <form id="non-member" method="post" action="../php/walkinLogupdate.php">

      <input class="id" type='id' name='id' id="myid" type="text" ng-model="selectedMember.id" hidden><br/>
      Firstname <input class="fname" type='text' name='firstname' id="myfname" type="text" ng-model="selectedMember.firstname" autocomplete="off"/><br/>
      Lastname <input class="lname" type='text' name='lastname' id="mylname" type="text" ng-model="selectedMember.lastname" autocomplete="off"/><br/>
      Gender <input class="gender" type='text' name='gender' id="mygender" type="text" ng-model="selectedMember.gender" autocomplete="off"/><br/>
      Type <input id="mytype" type="text" name="type" ng-model="selectedMember.type" /><br/><br/></br>
      <input id="submit" class="submit" type="submit" name="submit" value="Update">
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
    
    $('#non-member').submit(function(){
          

                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('#get_nmember').html(data);
                            }

                  });

                event.preventDefault();
         });
});﻿


 function dlgExit(){
        dlgHide();
        location.href = "#/l";
        location.href = "#/loglist";
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