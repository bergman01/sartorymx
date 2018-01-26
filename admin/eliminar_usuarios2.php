<? 	include_once("lib/conexion.php");
error_reporting(0);
	$link=conectarse(); 
	
		$cambio=implode(',',$_POST['seleccion']);
		$tranx="delete from registro where id in(".$cambio.");";					
					$rtranx=mysql_query($tranx, $link);
					$idreg = mysql_insert_id($link);
					header("Location:usuarios.php");
	