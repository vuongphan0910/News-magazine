<?php 
	require_once "classDB.php";
	$d = new connect;
	$kq=$d->List_LoaiTin();
	while($row=$kq->fetch_assoc())
		echo $row['Ten'],"<br/>";


?>