<!-- Latest compiled and minified CSS -->
<?php
// Start the session
session_start();
?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="../css/addmember.css"
</head>


<body>
<div id="wtf" ng-controller="addmemberController">


			<div id="fields" >
			<form id="regform" method="post" action="../php/regmember.php">
				<fieldset style="width:1050; border-width:1px;" >
			<legend><h4>Membership Registration Form</h4></legend>
			<h3 id="success"></h3>
			
				
			 <input class="fname" type='text' name='firstname' id='firstname' placeholder="First Name" autocomplete="off" required/>

			<input class="lname" type='text' name='lastname' id='lastname' placeholder="Last Name" autocomplete="off" required />
			<input class="lname" type='text' name='middlename' id='lastname' placeholder="Middle Name" autocomplete="off" required />
			<input class="age" type='number' min="10" max="100" name='age' id='age' placeholder="Age" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" autocomplete="off" required/>

			<select name="gender" required>
				<option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
             </select><br/><br/>

				 <input type="text" name="address" id="caddress" placeholder="Current Address" autocomplete="off" required><br/>
				 <input type="text" name="contact" id="contact" placeholder="Contact # (Mobile/Landline)" autocomplete="off" required>
				 <input type="text" name="email" id="email" placeholder="Email Address" autocomplete="off" required>
				 <input type="text" name="facebook" id="facebook" placeholder="Facebook" autocomplete="off"><br />
				 <input type="text" name="weight" id="weigth" placeholder="Weight" autocomplete="off" required>
				 <input type="text" name="height" id="heigth" placeholder="Height" autocomplete="off" required><br/>
				 <p hidden><span class="datespan">Subscription</span>
				 <select name="subscription" ng-model="data.repeatSelect" required>
				 	  <option  value="None">None</option>
				 	  <option ng-repeat="subscription in data" value="{{subscription.subscription_name}}">{{subscription.subscription_name}}</option>
					  
				 </select>
				 <input type="text" name="program" id="heigth" placeholder="Program" hidden>
				 <input type="date" name="expdate_sub" id="expdate_sub" placeholder="Expiration date" autocomplete="off"><br/>
 				 </p>
				  
				 
				<br/><br/>
				 
          		 <span class="datespan">Record Registration Date</span><input type="text" name="regdate" id="regdate" readonly><br/>
          		 <br/>
          		 <span class="datespan">Membership Fee</span>
          		 
          		 <input type="text" name="verify" value="<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>" hidden>
          		 <input type="text" class="gymfee" id="mfee" name="price" ng-repeat="gym_fees in data " value="{{gym_fees.gym_fee}}" readonly><br/>
          		 <span class="datespan">Cash<input class="cash" type="text" id="mfeec" name="cash" placeholder="Cash" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" autocomplete="off" required><br/></span>
          		

			<br><br><input class="submit" type="submit" name="submit">
		</fieldset>
			</form>
			</div>			
			
</div>


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




	

	$('#regdate').val(my_date_format);
	
	
	



         $('#regform').submit(function(e){

         		$('#date').val(my_date_format);
         		
         		var x = parseInt($('.gymfee').val(),10);
         		var y = parseInt($('.cash').val(),10);
         		if(y >= x){

         			$.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                           	window.location.replace('#/');
                              window.location.replace('#/addmember');
                                    $('#success').html(data);
                                    
                            }

                  });


         		}else{
         			$('#success').html("Not enough cash.");
         		}

                  

                  
                  $('#regdate').val(my_date_format);
                e.preventDefault();
         });



$("#firstname, #lastname").on('input', function(event) {
  this.value = this.value.replace(/[^a-z\s]/gi, '');
});
         

});﻿


	</script>

</body>