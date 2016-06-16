<?php
include 'session.php';
$_SESSION=array();
setcookie(session_name(),"",time()-3600);
session_destroy();
unset($_SESSION['username']);
header("Location: ../index.php?id=logout_successful");

		
?>