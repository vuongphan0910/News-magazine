<?php 
include "/libraries/classquantritin.php";
$qt=new quantritin;
$Ten=$_GET['TenLT'];
if($Ten==NULL){
echo 'Vui Lòng Nhập Tên Loại Tin';
}
else if($qt->CheckLoaiTin($Ten)==false){
	echo 'Tên Loại Tin Đã Tồn Tại';
}
?>