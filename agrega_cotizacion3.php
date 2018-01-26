<?php

include_once("lib/conexion.php");

require_once('lib/login.action.php');



	$membership = new loginAction();

  

	$membership->confirm_Member();



$link=conectarse(); 

	$usuario=$_SESSION['servicios_user'];

	$mayoreo =$_SESSION['mayoreo'];

	$mayoreod='0.'.$mayoreo;

	if($usuario == ''){

        header("Location:user.login.php");

        }

		

	

	

		$ids=$_POST['id_articulo'];

		$unidades=$_POST['unidades'];

		$color=$_POST['color'];

		$comentario=$_POST['comentario'];

		$tipo=$_POST['tipo'];

		$fecha =$_POST['fecha'];

		$hora= $_POST['hora'];

		$us=$_POST['us'];

		$codigo_cotizacion = $_POST['cc'];

                $query_codigo="select empresa,cotizado_por from cotizacion where codigo_cotizacion = '$codigo_cotizacion';";
		$resultado_codigo=mysql_query($query_codigo, $link);
		if(mysql_num_rows($resultado_codigo)>0){
		while($row_codigo = mysql_fetch_array($resultado_codigo)){
		    $empresa = $row_codigo['0'];
		    $cotizado_por = $row_codigo['1']; 
		}
	}

		$query="select * from articulos where id_articulo=$ids;";

		$resultado=mysql_query($query, $link);

		if(mysql_num_rows($resultado)>0){

		while($row = mysql_fetch_array($resultado)){ 

			$nombre=$row['nombre'];

			$codigo=$row['codigo'];

			if($mayoreo == ''){

			$precio=round($row['precio_venta'],2);

		}else{

			$precio=round(($row['precio_venta']*$mayoreod),2);

		}

			$personaliza=$row['personalizado'];





		}

	}

		$idc=$_GET['ids'];

		if($usuario != ''){

			for ($i=0; $i<=count($unidades); $i++) {

			$total = $precio * $unidades[$i];

				$total = round($total,2);	

		$tranx[$i]="insert into cotizacion(id_articulo,usuario,fecha,estatus,unidad,color,nombre,codigo,precio_venta,persona,comentario,hora,total,codigo_cotizacion,empresa,cotizado_por) values($ids,'$us','$fecha',2,$unidades[$i],'$color[$i]','$nombre','$codigo','$precio','$tipo','$comentario','$hora','$total','$codigo_cotizacion','$empresa','$cotizado_por');";				

					$rtranx=mysql_query($tranx[$i], $link);

					$idreg = mysql_insert_id($link);

				}

		header("Location:admin/ver_cotizacion.php?id=$us&f=$fecha&h=$hora&cc=$codigo_cotizacion");

	}

	

?>



