<? 	include_once("lib/conexion.php");
error_reporting(0);
	$link=conectarse(); 
	
		$cambio=implode(',',$_POST['seleccion']);
		$id = $_POST['seleccion'];
		for ($i=0; $i<=count($id); $i++) {
			$tranx[$i]="delete from cotizacion where hora ='".$id[$i]."';";					
			$rtranx=mysql_query($tranx[$i], $link);
			$idreg = mysql_insert_id($link);
		}

			header("Location:filtro_cotizacion.php");


	
	?>