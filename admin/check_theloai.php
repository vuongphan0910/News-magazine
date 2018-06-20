<?php 
include "/libraries/classquantritin.php";
$qt=new quantritin;
$TenTL=$_GET['TenTL'];
if($TenTL==NULL){
echo '<b>Vui Lòng Nhập Tên Thể Loại</b>';
}
else if($qt->CheckTheLoai($TenTL)==false){
	echo '<b>Tên Thể Loại Đã Tồn Tại</b>';
}
?>