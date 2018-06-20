<?php 
	if(isset($_GET['idUser']))
		$idUser=$_GET['idUser'];
	$qt->User_del($idUser);
	header("location:index.php?p=user_list");
 ?>