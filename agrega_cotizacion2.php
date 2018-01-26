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
            function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=5;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

	
	
		$ids=$_POST['id_articulo'];
		$unidades=$_POST['unidades'];
		$color=$_POST['color'];
		$comentario=$_POST['comentario'];
		$tipo=$_POST['tipo'];

			if($_POST['cc'] == ''){

			$codigo=generaPass();
	$query1= "select * from cotizacion where codigo_cotizacion = '$codigo'";
	$rtranxx = mysql_query($quey1,$link);
				if(mysql_num_rows($rtranxx)>0){
				$codigo_cotizacion = generaPass();
				}else{
				$codigo_cotizacion = $codigo;
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
		$tranx[$i]="insert into cotizacion(id_articulo,usuario,fecha,estatus,unidad,color,nombre,codigo,precio_venta,persona,comentario,total) values($ids,'$usuario',CURDATE(),0,$unidades[$i],'$color[$i]','$nombre','$codigo','$precio','$tipo','$comentario','$total');";					
					$rtranx=mysql_query($tranx[$i], $link);
					$idreg = mysql_insert_id($link);
				}
		header("Location:cotizacion.php");
	}
	
?>

