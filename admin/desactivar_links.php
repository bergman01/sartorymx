<?php

include_once("lib/conexion.php");
	$link=conectarse(); 
	
		$lin=$_GET['link'];
		$ids=$_GET['id'];

		if($lin==0){
			$tranx="update mega_categorias set link = 1 where mega_categoria_id = $ids";
			$rtranx=mysql_query($tranx, $link);
			$idreg = mysql_insert_id($link);
			
		}else{
			$tranx="update mega_categorias set link = 0 where mega_categoria_id = $ids";
			$rtranx=mysql_query($tranx, $link);
			$idreg = mysql_insert_id($link);
		}

	header("Location:filtro_categorias_master.php");