<?php 
include "libraries/classquantritin.php";
$qt=new quantritin;
$rowTL=null;
if(isset($_GET['lang']))
	$lang=$_GET['lang'];
else
	$lang='vi';
$listTL=$qt->ListTheLoai_lang($lang);
?>
<select class="form-control show-tick" name="idTL" id="TL"  >	
	<?php while($rowTL=$listTL->fetch_array()) {	 
		?>
		<option value="<?=$rowTL['idTL']?>"  ><?=$rowTL['TenTL']?></option>
	<?php }?>
</select>
<script>
	$(document).ready(function(){    
		lay_LT(); 
		$("#idTL").change(function(){
			lay_LT();
		});
	});
	function lay_LT(){
		$.get(
			'layloaitin.php',
			'idTL='+$('#TL').val(),
			function(html){
				$("#idLT").html(html);
			})
	}
</script>

