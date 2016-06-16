
<style type="text/css">


body{
    background-color: #eee;

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
	margin-left: 40px;
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
	width: 400px;
	
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
	margin-left: 150px;
	

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
#caddress,#contact,#email,.fname,#gym_type,#gym_fee{
width: 200px;
height: 30px;
border-radius: 5px;
border: 1px solid #cccccc;
margin-left: 40px;
margin-bottom: 10px;
padding-left: 10px;
}
#caddress{
  font-size: 12pt;
  height: 60px;
}
#success{
	margin-left: 40px;
	color: green;
}

#regform{
	width: 200px;
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
  float: right;
  
}
#table-scroll {
  height: 400px;
  width: 600px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width: 600px;
    
}
#table-wrapper table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper table thead th .text {
    
  top:-20px;
  
  height:25px;
  width: 190px;
  
}
#tr {
margin-left: 0;
margin-right: 0;

}
#top{
text-align: left;
}

.filter{
  height: 25px;
  border-radius: 3px;
  border:1px;
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

        .contact, .email{
    border: 1px solid #cccccc;
	border-radius: 5px;
	padding-left: 15px;
	width: 200px;
	height: 35px;
	margin-top: 15px;
	font-size: 12pt;
	margin-left: 100px;
	margin-right: 20px;

}
.email{
	margin-left: 115px;
}

#gym_type{
  margin-left: 50px;
}
#gym_fee{
  height: 60px;
  margin-left: 180px;
  margin-top: -20px;
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
}
#delYes,#delNo{
  margin-left: 15px;
}
</style>


<body ng-controller="subscriptionController">
<div id="wtf" >


			<div id="fields" >
			<form id="regform" method="post" action="../php/subscriptiondb.php">
				<fieldset style="border-width:2px;" >
			<legend><h2>Add Subscription</h2></legend>
			<h3 id="success"></h3><br/>
				
			 <input class="fname" type='text' name='subscription_name' id='firstname' placeholder="Subscription's Name" autocomplete="off" required/><br/><br/>

          <textarea name="description" id="caddress" placeholder="Description" autocomplete="off" required></textarea>
				 
				 

			<br><input class="submit" type="submit" name="submit">
		</fieldset>
			</form>
			</div>			
			
</div>


 <div id='table-wrapper'>
        <h3>Subscription's List</h3>
     <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">
        <div id='table-scroll'>
    <table id='table12'>
                <thead id='top'>
                    <tr id='tr'>
                        <th>ID</th>
                        <th>Subscription Name</th>
                        <th>Description</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" onclick="showDialog()" ng-click="showInEdit(subscription)" ng-repeat="subscription in data | filter:searchFilter">
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(subscription)">{{subscription.id}}</a></td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(subscription)">{{subscription.subscription_name}}</td>
                        <td><a onclick="showDialog()" class="click" ng-click="showInEdit(subscription)">{{subscription.description}}</td>
                        
                        
                    </tr>
                </tbody>
            </table>
          </div>
        </div>


<div id="white-background">
</div>

        <div id="dlgbox">
    <div id="dlg-header"><h3 id="delSuccess">Subscription Update</h3>
    <p id="delYesNo">Are you sure you want to delete?<button id="delYes" onclick="btnYes()">Yes</button><button id="delNo" onclick="btnNo()">No</button></p>
    
  </div>
    <div id="dlg-body">
    <div id="move"><p id="updatesuccess"></p></div>
    <form id="updatesupplier" method="post" action="../php/updateSubscription.php">

      <input class="id" type='text' name='id' id="myid" type="text" ng-model="selectedSubscription.id" hidden><br/>
      Subscription Name <input  type='text' name='subscription_name' id="gym_type" type="text" ng-model="selectedSubscription.subscription_name" autocomplete="off" required/><br/>
      Description<br/> 
      <textarea name='description' id="gym_fee" ng-model="selectedSubscription.description" required></textarea>
      <!--<input  type='text' name='description' id="gym_fee" type="text" ng-model="selectedSubscription.description" autocomplete="off" required/>--><br/>
      
     
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
                                    $('#success').html(data);
                            }

                  });
                  
                   

                  $("#regform")[0].reset();
                  window.location.replace("#/");
                   window.location.replace("#/addsubscription");
            
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
                 
            
                event.preventDefault();
         });
         

});﻿

 function btnDelete(){

       
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "block";

          
       
    }

    function btnYes(){
      var yesNo = document.getElementById("delYesNo");
      var bla = $('#myid').val();
      var disable = document.getElementById("updatesupplier");

                  $.ajax({
                           data: {id: bla},
                           type: "POST",
                           url: '../php/deleteSubscription.php',
                           success: function(data){
                                    $('#delSuccess').html(data);
                            }

                  });
                  yesNo.style.display = "none";
                  disable.style.display = "none";
                  $("#updatesupplier")[0].reset();

    }

    function btnNo(){
         var yesNo = document.getElementById("delYesNo");
          yesNo.style.display = "none";


    }



function dlgExit(){
        dlgHide();
        location.href = "#/l";
        location.href = "#/addsubscription";
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

</body>