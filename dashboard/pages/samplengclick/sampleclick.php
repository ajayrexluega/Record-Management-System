<html>
<head>
    <title>Confirm Dialog Box</title>
    <style>
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
}
body{
    background-color: #ebebeb;
}
#table-wrapper {
  position:relative;
}
#table-scroll {
  height:350px;
  width: 1050px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:1000px;
    
}
#table-wrapper table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper table thead th .text {
  position: absolute;   
  top:-20px;
  z-index:2;
  height:25px;
  width: 290px;
  
}
#tr {
margin-left: auto;
margin-right: auto;

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




        #white-background{
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

        #dlgbox{
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 480px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }

        #dlg-header{
            background-color: #6d84b4;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0 10px;
        }

        #dlg-body{
            background-color: white;
            color: black;
            font-size: 14px;
            padding: 10px;
            margin: 0 10px 0 10px;
        }

        #dlg-footer{
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0 10px 10px 10px;
        }

        #dlg-footer button{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }
        .submit{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }
    </style>
</head>
<body>

    <br>
    <h1>Log List</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">

<div ng-controller="sampleclickController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>ID No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="walkin_member in data | filter:searchFilter">
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(walkin_member)">{{walkin_member.id}}</a></td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(walkin_member)">{{walkin_member.firstname}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(walkin_member)">{{walkin_member.lastname}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(walkin_member)">{{walkin_member.gender}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(walkin_member)">{{walkin_member.time}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(walkin_member)">{{walkin_member.datestamp}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(walkin_member)">{{walkin_member.type}}</td>
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
        location.href = "#/loglist";
        location.href = "#/loglistsamp";
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