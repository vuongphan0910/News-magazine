<?php 
include "libraries/classquantritin.php";
$qt=new quantritin;
if(isset($_GET['idTL']))
	$idTL=$_GET['idTL'];
if(isset($_GET['idTin']))
	$idTin=$_GET['idTin'];
$tin=$qt->Tin_Detail($idTin);
$rowTin=$tin->fetch_array();
$listLT=$qt->LoaiTrongTL($idTL);
?>	 
<select class="form-control show-tick" name="idLT"   >
	<?php while($rowLT=$listLT->fetch_array()) { ?>
		<option value="<?=$rowLT['idLT']?>" <?=$rowLT['idLT']==$rowTin['idLT']?'selected':''?> ><?=$rowLT['Ten']?></option>
	<?php }?>
</select>

