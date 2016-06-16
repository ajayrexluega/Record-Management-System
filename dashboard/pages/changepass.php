
<?php
session_start();
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/changepass.css">
<body>
<div id="wtf">


			<div id="fields">
			<form id="regform" method="post" action="../php/changepassdata.php">
				<fieldset style="width:900; border-width:1px;" >
			<legend><h2>Change Password</h2></legend>
			<h3 id="success"></h3><br/>
			<input name="id" type="text" value="<?php echo $_SESSION['id'] ?>" hidden readonly required>
				
			
				 
				 <input type="text" name="username" id="heigth" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" readonly required><br/>
				 <input type="password" name="password" id="expdate_sub" placeholder="Old Password" required><br/>
				 <input type="password" class="newpass" name="newpassword" id="expdate_sub" placeholder="New Password" required><br/>
				 <input type="password" class="retypenewpass" name="retypenewpassword" id="expdate_sub" placeholder="Retype New Password" required><br/>
				 
 				 


			<br><input class="submit" type="submit" name="submit" value="Update">
		</fieldset>
			</form>
			</div>			
			
</div>





<script type="text/javascript">

   

		$(document).ready(function(){
		 
    


         $('#regform').submit(function(e){
         	var newpass = $('.newpass').val();
         	var retypenewpass = $('.retypenewpass').val();
         	if(newpass == retypenewpass){
         			$.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('#success').html(data);
                            }

                  });


         	}else{
         		$('#success').html('<p style="color: red">New Password did not match</p>');
         	}

 				 $("#regform")[0].reset();
                e.preventDefault();
         });
         

});﻿



	</script>

</body>