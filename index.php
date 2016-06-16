<?php
require_once '/php/dbconfig.php';

if($user->is_loggedin()!="")
{
	$user->redirect('/rms final 2/dashboard/dashboard.php');
}


?>

<!DOCTYPE html>

<html lang="en">
<head>
	
	<title>RMS Log In</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">
	<script src="js/jquery-1.11.3.min.js"></script>
	
</head>


<body class="body">

	<div id="body">
	<div id="form">
	<form class="login-form" method="POST" action="php/loginauthenticate.php" >
	<fieldset>
		<legend align="center"><img class="wrc" src="images/wfc logo2.png" alt="WRC"></legend>
		<div id="get_content"></div>

		
		<p>
		<input class="username" type="text" name="username" placeholder="Username" autocomplete="off"required/><br>
		<input class="password" type="password" name="password" placeholder="Password" required/><br>
		</p>
		<input id="register"class="login-button" type="submit" value="Log In"  />
		<a href="" class="forgotpass">Forgot your password?</a>
		
	</fieldset>		
	</form>
	</div>
	</div>
	<footer>
		<P>&copy; 2016 ACT Students,Thesis</P>
	</footer>
	<script type="text/javascript">

		$(document).ready(function(){
         $('form').submit(function(){


                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('#get_content').html(data);
                            }

                  });
                event.preventDefault();
         });

});﻿



	</script>
</body>	
</html>