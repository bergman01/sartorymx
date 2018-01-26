<?php
	
	include_once('lib/conexion.php');
    $link=conectarse_servicios();
	$destinatario = $_POST['destinatario'];
	$consulta = "select id_cliente,empresa,contacto_empresa,email,celular FROM tblalumno WHERE matricula = '$matricula'";

	$result = mysql_query($consulta,$link);
	
	$respuesta = new stdClass();
	if(mysql_num_rows($result)>0){
        $fila = mysql_fetch_array($result);
		$respuesta->empresa = $fila['empresa'];
		$respuesta->contacto_empresa = $fila['contacto_empresa'];
		$respuesta->email_empresa = $fila['email'];
		$respuesta->id_cliente = $fila['id_cliente'];
		$respuesta->celular_empresa = $fila['celular'];		
	}
	echo json_encode($respuesta);

?>