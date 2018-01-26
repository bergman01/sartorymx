<?php
	$tipo = $_FILES['archivo']['type'];
	$tamanio = $_FILES['archivo']['size'];
	$archivotmp = $_FILES['archivo']['tmp_name'];
	$respuesta = new stdClass();
	
	if( $tipo == 'application/vnd.ms-excel'){
		
		$archivo = $_FILES['archivo']['name'];
	
		if(move_uploaded_file($archivotmp, $archivo) ){
	 		$respuesta->estado = true;	
	 		$respuesta->mensaje = "El archivo se pudo subir al servidor";	
		} else {
    		$respuesta->estado = false;
			$respuesta->mensaje = "El archivo no se pudo subir al servidor, intentalo mas tarde";
		}
	
		if($respuesta->estado){
		
			$lineas = file($archivo);

			$respuesta->mensaje = "";
			$respuesta->estado = true;
			$conexion = new mysqli('45.40.164.16','sartory','S4rT0rY#','sartory',3306);
			foreach ($lineas as $linea_num => $linea)
			{
				$datos = explode(",",$linea);
				$codigo = trim($datos[0]);
				$categoria = trim($datos[1]);
				$nombre = trim($datos[2]);
				$idProveedor = trim($datos[3]);
				$costo = trim($datos[4]);
				$utilidad = trim($datos[5]);
				$imagen = trim($datos[6]);

				$ppv=100-$utilidad;
				$ppv=".".$ppv;
				$precio_venta=$costo/$ppv;
			
	    		$consulta = "insert into articulos(codigo,categoria,nombre,id_proveedor,costos,utilidad,imagen,precio_venta,fecha_creacion,estatus) values('$codigo',$categoria,'$nombre',$idProveedor,'$costo','$utilidad','$imagen','$precio_venta',CURDATE(),1);";	
	    		$respuesta->estado = true;		
				if(!$conexion->query($consulta)){			
					$respuesta->estado = false;
					$respuesta->mensaje .= "No se guardo, verifica la información \n"; 				
				}
			}
		}
		if($respuesta->estado == true)
			$respuesta->mensaje = "Todos los registros se guardaron correctamente\n";
	}
	else {
		$respuesta->mensaje = "Solo se admiten archivos .csv, vuelvelo a intentar\n";
	}
	echo json_encode($respuesta);
?>