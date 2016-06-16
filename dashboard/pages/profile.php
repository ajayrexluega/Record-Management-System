
<?php
session_start();
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
</head>
<body>
<div id="wtf">


			<div id="fields">
			<form id="regform" method="post" action="../php/updateprofile.php">
				<fieldset style="width:900; border-width:1px;" >
			<legend><h2><?php echo $_SESSION['firstname']; echo "'s" ?> Informations</h2></legend>
			<h3 id="success"></h3><br/>
			<input name="id" type="text" value="<?php echo $_SESSION['id'] ?>" hidden readonly required>
				
			 <input class="fname" type='text' name='firstname' id='firstname' placeholder="First Name" value="<?php echo $_SESSION['firstname']; ?>" required/>

			<input class="lname" type='text' name='lastname' id='lastname' placeholder="Last Name" value="<?php echo $_SESSION['lastname']; ?>" required />
			

			<input type="text" name="gender" id="gender" placeholder="Gender" value="<?php echo $_SESSION['gender']; ?>" readonly required><br /><br />

				 <input type="text" name="address" id="caddress" placeholder="Current Address" value="<?php echo $_SESSION['address']; ?>" required><br/>
				 <input type="text" name="contact" id="contact" placeholder="Contact # (Mobile/Landline)" value="<?php echo $_SESSION['contact']; ?>" required>
				 <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $_SESSION['email']; ?>" required>
				 <br/>
				 <span class="datespan"></h3><b>Login information</b></h3></span><br/>
				 <input type="text" name="username" id="heigth" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" readonly required><br/>
				 <input type="password" name="password" id="expdate_sub" placeholder="Password" value="<?php echo $_SESSION['password']; ?>" readonly required><br/>
				 <!--<span class="datespan"></h3><b>For Password Recovery</b></h3></span><br/><br/>
				 <span class="datespan">Select Secret Question</span>
				 <input type="text" name="secretQuestion" id="email" value="<?php echo $_SESSION['secret_question']; ?>"required readonly></br></br>
				 <input type="text" name="secretAnswer" id="secretAnswer" placeholder="Your Secret Answer" value="<?php echo $_SESSION['secret_answer']; ?>" required>-->
 				 


			<br><input class="submit" type="submit" name="submit" value="Update">
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
                                    $('#success').html(data);
                            }

                  });

                  
                  
                e.preventDefault();
         });
         

});﻿



	</script>

</body>