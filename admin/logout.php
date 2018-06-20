<?php 
	session_start();
	session_destroy();
	setcookie("gr",$_SESSION['login_group'],time()-1);
	header('location:login.php');
?>