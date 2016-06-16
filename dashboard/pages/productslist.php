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
    cursor: pointer;
}
#clickrow:hover{
    background-color: #C4CACC;
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
            width: 400px;
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


        .fname, .lname{
    border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 15px;
  width: 200px;
  height: 35px;
  margin-top: 5px;
  font-size: 12pt;
  margin-left: 50px;
  margin-right: 20px;

}
.fname{
  margin-left: 150px;
}
.age{
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 10px;
  width: 60px;
  height: 35px;
  margin-top: 5px;
  font-size: 12pt;
  margin-left: 50px;
  margin-right: 20px;

}
fieldset{
  border-color: #ccc;
  border-radius: 10px;
  box-shadow: none;
  outline: 0 none;
  

}
#fields{
  float: left;
  
}
.submit{
  width: 90px;
  height: 35px;
  background-color:  #428bca;
  border-radius: 5px;
  cursor:pointer;
  color: #fff;
  border: none;
  margin-bottom: 10px;
  margin-right: 30px;
  float: right;

}
.submit:hover{
  background-color: #337ab7;
}
#move{
  padding-left: 130px;
}
input:focus{
  border: 1px solid #428bca;
    box-shadow: 1px 1px 1px #428bca;
    outline: 0 none;
  transition: .5s;
}
#caddress,#profession,#company,#contact,#school,#course,#email,#facebook,#weigth,#heigth,
#bloodtype,#bp,#medical,#previousgym,#topay,#paidamount,#balance,#regdate,#expdate,#id{
width: 200px;
height: 30px;
border-radius: 5px;
border: 1px solid #cccccc;
margin-left: 40px;
margin-bottom: 10px;
padding-left: 10px;
}
#caddress{
  width: 445px;
}
#profession,#company{
  width: 445px;
}
#contact{
  width: 250px;
}
#school,#course{
  width: 250px;
}
#email, #facebook{
  width: 250px;
}
#medical{
  width: 700px;
}
#previousgym{
  width: 500px;
}
select{
  height: 30px;
  border-radius: 5px;
}
#regdate,#expdate{
  height: 30px;
}
.datespan{
  margin-left: 40px;
}
#success{
  margin-left: 400px;
  color: green;
}
#id{
  width: 50px;
}


.submit2{
  width: 50px;
  height: 20px;
  background-color:  #d9534f;
  border-radius: 5px;
  cursor:pointer;
  color: #fff;
  border: none;
 padding: 10px;
 margin-top: 40px;
  float: left;

}
.submit2:hover{
  background-color: #c9302c;
  border-color:#ac2925
}
#delYesNo{
  display: none;
  font-size: 15px;
}
#delYes,#delNo{
  margin-left: 15px;
}
    </style>
</head>
<body>

    <br>
    <h1>Products List</h1>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">

<div ng-controller="productslistController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <th>Product ID</th>
                        <th>Product</th>
                        <th>Supplier</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" onclick="showDialog()" ng-click="showInEdit(product)" ng-repeat="product in data | filter:searchFilter">
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(product)">{{product.product_id}}</a></td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(product)">{{product.product_name}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(product)">{{product.supplier}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(product)">{{product.price}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(product)">{{product.description}}</td>
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
    <form id="products" method="post" action="../php/updateSupplierProduct.php">
      <input type="text" name="product_id" id="id" ng-model="selectedProduct.product_id" readonly><br/>

         <input type="text" name="product_name" id="contact" ng-model="selectedProduct.product_name" required><br/>
         <input type="text" name="supplier" id="contact" ng-model="selectedProduct.supplier"><br/>
         <input type="text" name="price" id="email" ng-model="selectedProduct.price" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"><br/>
         <input type="text" name="description" id="contact" ng-model="selectedProduct.description"><br />
         
         
        
      <input id="submit" class="submit" type="submit" name="submit" value="Update">
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
    
    $('#products').submit(function(){
          

                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('h2').html(data);
                            }

                  });

                event.preventDefault();
         });
});﻿


  function btnDelete(){

       
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "block";

          
       
    }

    function btnYes(){
      var yesNo = document.getElementById("delYesNo");
      var bla = $('#id').val();

                  $.ajax({
                           data: {id: bla},
                           type: "POST",
                           url: '../php/deleteproduct.php',
                           success: function(data){
                                    $('#delSuccess').html(data);
                            }

                  });
                  yesNo.style.display = "none";
                  $("#products")[0].reset();

    }

    function btnNo(){
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "none";


    }


 function dlgExit(){
        dlgHide();
        location.href = "#/";
        location.href = "#/productslist";
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

        dlg.style.left = (winWidth/2) - 360/2 + "px";
        dlg.style.top = "30px";
    }
</script>