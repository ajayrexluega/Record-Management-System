<?php
	error_reporting(0);
	
	$connect = mysql_connect("localhost","root","");
	$db = mysql_select_db("rmsdb");

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	
		$query = mysql_query("select * from user_accounts where username='".$username."'");
 
		if(mysql_num_rows($query) > 0 ){
			while ($row = mysql_fetch_assoc($query)) {
				if($row['password'] == $password){

					if($row['status'] == 'Activated'){

						if($row['type'] == 'Admin'){
							session_start();
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];
					$_SESSION['gender'] = $row['gender'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['contact'] = $row['contact'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['secret_question'] = $row['secret_question'];
					$_SESSION['secret_answer'] = $row['secret_answer'];


					echo"<h3>WELCOME Admin!</h3>";
					echo  '<p style="color:green"><b>You are now Logged In!</b></p>
					<script type="text/javascript">
						(function(){
						   setTimeout(function(){
						     window.location="dashboard/dashboard.php";
						   },2000); /* 1000 = 1 second*/
					    })();
					</script>';

						}else{
							session_start();
							$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];
					$_SESSION['gender'] = $row['gender'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['contact'] = $row['contact'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['secret_question'] = $row['secret_question'];
					$_SESSION['secret_answer'] = $row['secret_answer'];

							echo"<h3>WELCOME Staff!</h3>";
					echo  '<p style="color:green"><b>You are now Logged In!</b></p>
					<script type="text/javascript">
						(function(){
						   setTimeout(function(){
						     window.location="dashboard/staffdashboard.php";
						   },2000); /* 1000 = 1 second*/
					    })();
					</script>';

						}



					}else{
						echo '<center><p style="color:red"><b>Sorry Your Account has been Deactivated!</b></p></center>';

					}
					
				}else{
					echo  '<center><p style="color:red"><b>Wrong password!</b></p></center>';
				}
				
			}
		}else{

			session_destroy();
			echo  '<center><p style="color:orange"><b>User not found!</b></p></center>';
		}
		 				


	?>