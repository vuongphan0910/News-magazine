<?php 
	require_once "libraries/classquantritin.php";
    $qt=new quantritin;
    $qt->checkLogin(); 
    $idLT=$_GET['idLT'];
    $kq=$qt->Delete_LoaiTin($idLT);
    header("location:index.php?p=loaitin_list")
?>