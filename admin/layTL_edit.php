<?php 
include "libraries/classquantritin.php";
$qt=new quantritin;
$rowTL=null;
$rowLT=null;
if(isset($_GET['lang']))
	$lang=$_GET['lang'];
else
	$lang='vi';
$listTL=$qt->ListTheLoai_lang($lang);
if(isset($_GET['idLT']))
	$idLT=$_GET['idLT'];
$lt=$qt->Detail_Loaitin($idLT);
$rowLT=$lt->fetch_assoc();
?>
<select class="form-control show-tick" name="idTL">
	<?php while($rowTL=$listTL->fetch_array()) { ?>
		<option value="<?=$rowTL['idTL']?>" <?php if($rowTL['idTL']==$rowLT['idTL']) echo "selected=selected"; ?>> <?=$rowTL['TenTL']?> </option>
	<?php }?>
</select>
