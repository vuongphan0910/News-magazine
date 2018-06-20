<?php 
include "libraries/classquantritin.php";
$qt=new quantritin;
if(isset($_GET['lang']))
	$lang=$_GET['lang'];
else
	$lang='vi';
$listTL=$qt->ListTheLoai_lang($lang);
if(isset($_GET['idTin']))
	$idTin=$_GET['idTin'];
$tlt=$qt->LayTL_edit($idTin);
$rowTLT=$tlt->fetch_assoc();
?>
<select class="form-control show-tick" name="idTL" id="TL">
	<?php while($rowTL=$listTL->fetch_array()) { ?>
		<option value="<?=$rowTL['idTL']?>" <?php if($rowTL['idTL']==$rowTLT['idTL']) echo "selected=selected"; ?>> <?=$rowTL['TenTL']?> </option>
	<?php }?>
</select>
<script>
	$(document).ready(function(){    
		lay_LT_edit($('#TL').val(),<?=$idTin?>); 
		$("#idTL").change(function(){
			lay_LT_edit($('#TL').val(),<?=$idTin?>);
		});
	});
	function lay_LT_edit(a,b){
		$.get(
			'layloaitin_edit_tin.php',
			'idTL='+a+'&idTin='+b,
			function(html){
				$("#idLT").html(html);
			})
	}
</script>
