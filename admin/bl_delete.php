<?php 
	require_once "libraries/classquantritin.php";
    $qt=new quantritin;
    $qt->checkLogin(); 
    $idYKien=$_GET['idYKien'];
    $kq=$qt->BL_del($idYKien);
    header("location:index.php?p=bl_list");
?>