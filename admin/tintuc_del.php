<?php 
if(isset($_GET['idTin']))
	$idTin=$_GET['idTin'];
$qt->Tin_del($idTin);
header("location:index.php?p=tin_list");
?>