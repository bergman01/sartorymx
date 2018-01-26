<? 	include_once("lib/conexion.php");
	$link=conectarse(); 
	
		$ids=$_GET['id'];
		$id=$_GET['id_art'];
		$tranx="delete from galeria where id_galeria=$ids";					
					$rtranx=mysql_query($tranx, $link);
					$idreg = mysql_insert_id($link);
					header("Location:filtro_galerias.php?id=$id");
	
	?>