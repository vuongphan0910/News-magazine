<?php 
include "libraries/classquantritin.php";
$qt=new quantritin;
$rowLSP=null;
if(isset($_GET['idTL']))
	$idTL=$_GET['idTL'];
$listLT=$qt->LoaiTrongTL($idTL);
?>	 
<select class="form-control show-tick" name="idLT"   >
	<?php while($rowLT=$listLT->fetch_array()) { ?>
		<option value="<?=$rowLT['idLT']?>" ><?=$rowLT['Ten']?></option>
	<?php }?>
</select>

