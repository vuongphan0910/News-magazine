<?php 
require_once "libraries/classquantritin.php";
$qt=new quantritin;
$qt->checkLogin(); 
$idTL=$_GET['idTL'];
settype($idTL,"int");
$kq=$qt->Delete_TL($idTL);
header("location:index.php?p=theloai_list");
?>