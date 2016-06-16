<!-- Latest compiled and minified CSS -->
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/addnewaccount.css">
</head>
<body>
<div id="wtf" ng-controller="addnewaccountController">


			<div id="fields">
			<form id="regform" method="post" action="../php/regaccount.php">
				<fieldset style="width:900; border-width:1px;" >
			<legend><h2>Registration Form</h2></legend>
			<h3 id="success"></h3><br/>
				
			 <input class="fname" type='text' name='firstname' id='firstname' placeholder="First Name" autocomplete="off" required/>

			<input class="lname" type='text' name='lastname' id='lastname' placeholder="Last Name" autocomplete="off" required />
			

			<label for="male">Male  </label><input type="radio" name="gender" id="male" required value="Male" />
			<label for="female">Female  </label><input type="radio" name="gender" id="female" value="Female" /><br /><br />

				 <input type="text" name="address" id="caddress" placeholder="Current Address" autocomplete="off" required><br/>
				 <input type="text" name="contact" id="contact" placeholder="Contact # (Mobile/Landline)" autocomplete="off" required>
				 <input type="text" name="email" id="email" placeholder="Email Address" autocomplete="off" required><br /><br />
				 
				 
				 <span class="datespan">Type</span>
				 <select name="type" required>
				 	  <option  value="Staff">Staff</option>
				 	  <option  value="Admin">Admin</option>
				 	  
					  
				 </select>
				 <span class="datespan">Status</span>
				 <select name="status" required>
				 	  <option  value="Deactivated">Deactivated</option>
				 	  <option  value="Activated">Activated</option>
				 	  
					  
				 </select><br/></br>
				 <span class="datespan"></h3><b>Login information</b></h3></span><br/>
				 <input type="text" name="username" id="heigth" class="validate" placeholder="Username" autocomplete="off" required><br/>
				 <input type="password" name="password" class="validate" id="expdate_sub" placeholder="Password" value="12345" readonly required><br/>
				 <div id="walasa">
				 <span class="datespan" ></h3><b>For Password Recovery</b></h3></span><br/><br/>
				 <span class="datespan" >Select Secret Question</span>
				 <select name="secretQuestion" >
				 	  <option value="What was your first pet’s name?">What was your first pet’s name?</option>
				 	  <option value="What is your favorite food?">What is your favorite food?</option>
				 	  <option value="What is your mother’s maiden name?">What is your mother’s maiden name?</option>
				 	  <option value="What’s your first teacher’s name?">What’s your first teacher’s name?</option>
				 	  <option value="What is your city of birth?">What is your city of birth?</option>
				 	  <option value="What’s your phone number?">What’s your phone number?</option>
				 	  <option value="What’s your frequent flyer number?">What’s your frequent flyer number?</option>
				 	  <option value="What is your library card number?">What is your library card number?</option>
				 	  <option value="What city were you born in?">What city were you born in?</option>  
				 </select></br></br>
				 <input type="text" name="secretAnswer" id="secretAnswer" placeholder="Your Secret Answer" >
 				 </div>


			<br><input class="submit" type="submit" name="submit">
		</fieldset>
			</form>
			</div>			
			
</div>





<script type="text/javascript">

   

		$(document).ready(function(){
		 
    


         $('#regform').submit(function(e){


                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('#success').html(data).delay(3000).slideUp();
                            }

                  });

                  $("#regform")[0].reset();
                  
                e.preventDefault();
         });
         

});﻿
		Array.prototype.indexOf = Array.prototype.indexOf || function (searchElement) {
        "use strict";
        if (this == null) {
            throw new TypeError();
        }
        var t = Object(this);
        var len = t.length >>> 0;
        if (len === 0) {
            return -1;
        }
        var n = 0;
        if (arguments.length > 1) {
            n = Number(arguments[1]);
            if (n != n) { // shortcut for verifying if it's NaN
                n = 0;
            } else if (n != 0 && n != Infinity && n != -Infinity) {
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
            }
        }
        if (n >= len) {
            return -1;
        }
        var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);
        for (; k < len; k++) {
            if (k in t && t[k] === searchElement) {
                return k;
            }
        }
        return -1;
}

document.querySelector('.validate').onkeypress = validate;

function validate(e) {
            e = e || event;
            return /[a-z0-9]/i.test(String.fromCharCode(e.charCode || e.keyCode)) 
                    || !!(!e.charCode && ~[8,37,39,46].indexOf(e.keyCode));
}



	</script>

</body>