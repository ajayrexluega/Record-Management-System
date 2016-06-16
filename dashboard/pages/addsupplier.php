<head>
    <link rel="stylesheet" type="text/css" href="../css/addsupplier.css">
</head>
<body ng-controller="supplierController">
<div id="wtf" >


			<div id="fields" >
			<form id="regform" method="post" action="../php/addsupplierdb.php">
				<fieldset style="border-width:2px;" >
			<legend><h2>Add Supplier</h2></legend>
			<h3 id="success"></h3><br/>
				
			 <input class="fname" type='text' name='supplier_name' id='firstname' placeholder="Supplier's Name" required/><br/><br/>


				 
         <input type="text" name="contact_person" id="contact" placeholder="Contact Person's Name" required><br/>
				 <input type="text" name="contact" id="contact" placeholder="Contact # (Mobile/Landline)" required><br/>
         <input type="text" name="supplier_address" id="caddress" placeholder="Address" required><br/> 
				 <input type="text" name="email" id="email" placeholder="Email Address" required><br/>

			<br><input class="submit" type="submit" name="submit">
		</fieldset>
			</form>
			</div>			
			
</div>


 <div id='table-wrapper'>
        <h3>Suppliers List</h3>
     <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">
        <div id='table-scroll'>
    <table id='table12'>
                <thead id='top'>
                    <tr id='tr'>
                        <th>Supplier Name</th>
                        <th>Contact Person</th>
                        <th>Contact no.</th>
                        <th>Address</th>
                        <th>Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" onclick="showDialog()" ng-click="showInEdit(suppliers)" ng-repeat="suppliers in data | filter:searchFilter">
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(suppliers)">{{suppliers.supplier_name}}</a></td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(suppliers)">{{suppliers.contact_person}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(suppliers)">{{suppliers.contact}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(suppliers)">{{suppliers.supplier_address}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(suppliers)">{{suppliers.email}}</td>
                        
                    </tr>
                </tbody>
            </table>
          </div>
        </div>


<div id="white-background">
</div>

        <div id="dlgbox">
    <div id="dlg-header"><h3 id="delSuccess">Information</h3>
      <p id="delYesNo">Are you sure you want to delete?<button id="delYes" onclick="btnYes()">Yes</button><button id="delNo" onclick="btnNo()">No</button></p>
    </div>
    <div id="dlg-body">
    <div id="move"><p id="updatesuccess"></p></div>
    <form id="updatesupplier" method="post" action="../php/updateSupplier.php">

      <input class="id" type='id' name='id' id="myid" type="text" ng-model="selectedSupplier.id" hidden required><br/>
      Supplier's Name <input class="fname" type='text' name='supplier_name' id="myfname" type="text" ng-model="selectedSupplier.supplier_name" autocomplete="off" required/><br/>
      Contact Person<input type='text' name='contact_person' id="cperson" type="text" ng-model="selectedSupplier.contact_person" autocomplete="off" required/><br/>
      Contact #<input class="contact" type='text' name='contact' id="mygender" type="text" ng-model="selectedSupplier.contact" autocomplete="off" required/><br/>
      Address <input class="lname" type='text' name='supplier_address' id="mylname" type="text" ng-model="selectedSupplier.supplier_address" autocomplete="off" required/><br/>
      Email <input class="email" type='text' name='email' id="mygender" type="text" ng-model="selectedSupplier.email" autocomplete="off" required/><br/>
      <br/><br/></br>
      <input id="submit" class="submit" type="submit" name="submit" value="Update">
      <a id="delete" class="submit2" onclick="btnDelete()">Delete</a>
    </form>
    </div>
    <div id="dlg-footer">

        <button onclick="dlgExit()">Exit</button>
    </div>
</div>


<script type="text/javascript">

		$(document).ready(function(){
		 

			var my_date_format = function(){
    
				var d = new Date();

				var month = d.getMonth()+1;
				var day = d.getDate();
				var output = ((''+day).length<2 ? '0' : '') + day  + '/' +
				((''+month).length<2 ? '0' : '') + month + '/' +
				d.getFullYear();

				return (output);
 
};
	
	
         $('#regform').submit(function(){


                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                             window.location.replace("#/");
                             window.location.replace("#/addsupplier");
                                    $('#success').html(data);
                            }

                  });
                   

                  $("#regform")[0].reset();
                 
            
                event.preventDefault();
         });

         $('#updatesupplier').submit(function(){


                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('#updatesuccess').html(data);
                            }

                  });
                  

                  $("#regform")[0].reset();
            
                event.preventDefault();
         });
         

});﻿


 function btnDelete(){

       
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "block";

          
       
    }

    function btnYes(){
      var yesNo = document.getElementById("delYesNo");
      var formhide = document.getElementById("updatesupplier");
      var bla = $('#myid').val();

                  $.ajax({
                           data: {id: bla},
                           type: "POST",
                           url: '../php/deletesupplier.php',
                           success: function(data){
                                    $('#delSuccess').html(data);
                            }

                  });
                  yesNo.style.display = "none";
                  $("#updatesupplier")[0].reset();
                  formhide.style.display = "none";

    }

    function btnNo(){
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "none";


    }

function dlgExit(){
        dlgHide();
        location.href = "#/l";
        location.href = "#/addsupplier";
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
        dlg.style.top = "70px";
    }

	</script>

</body>