<?php
error_reporting(0); 
include_once("lib/conexion.php");
	$link=conectarse(); 
	
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


$hora=date('H:i:s');
//$fecha = CURDATE();
		$codigo=$_GET['codigo'];

               $codigo1 = generaPass();
	$query1= "select * from cotizacion where codigo_cotizacion = '$codigo1'";
	$rtranxx = mysql_query($quey1,$link);
				if(mysql_num_rows($rtranxx)>0){
				$codigo_cotizacion = generaPass();
				}else{
					$codigo_cotizacion = $codigo1;
				}
		

		$query="select * from cotizacion where codigo_cotizacion = '$codigo'";
		$resultado=mysql_query($query, $link);
		if(mysql_num_rows($resultado)>0){
			while($row = mysql_fetch_array($resultado)){
			$tranx = "insert into cotizacion(id_articulo,usuario,fecha,estatus,unidad,personalizado,color,nombre,codigo,precio_venta,persona,comentario,precio_persona,empresa,hora,cotizado_por,envio,destinatario,empresa2,contacto_empresa,email_empresa,celular_empresa,saludo,despedida,cotizado_por2,puesto,celular,email,condiciones,notas,notas_personalizacion,descuento,descuento_valor,gran_total,total,codigo_cotizacion) values(".$row['id_articulo'].",'".$row['usuario']."',CURDATE(),".$row['estatus'].",".$row['unidad'].",'".$row['personalizado']."','".$row['color']."','".$row['nombre']."','".$row['codigo']."','".$row['precio_venta']."','".$row['persona']."','".$row['comentario']."','".$row['precio_persona']."','".$row['empresa']."','".$hora."','".$row['cotizado_por']."',".$row['envio'].",'".$row['destinatario']."','".$row['empresa2']."','".$row['contacto_empresa']."','".$row['email_empresa']."','".$row['celular_empresa']."','".$row['saludo']."','".$row['despedida']."','".$row['cotizado_por2']."','".$row['puesto']."','".$row['celular']."','".$row['email']."','".$row['condiciones']."','".$row['notas']."','".$row['notas_personalizacion']."',".$row['descuento'].",".$row['descuento_valor'].",".$row['gran_total'].",'".$row['total']."','".$codigo_cotizacion."');";				
		    $rtranx=mysql_query($tranx, $link);
		    $idreg = mysql_insert_id($link);
	}
}
header("Location:filtro_cotizacion.php");
	
	?>