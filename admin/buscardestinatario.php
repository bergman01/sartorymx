<?php
include_once('lib/conexion.php');
$link=conectarse_servicios();
$destinatario = $_GET['term'];
$consulta = "select destinatario FROM clintes WHERE destinatario LIKE '%$destinatario%'";

$result = mysql_query($consulta,$link);

if(mysql_num_rows($result)>0){
                while($fila = mysql_fetch_array($result)){ 
		$destinatario[] = $fila['destinatario'];	
	}
	echo json_encode($destinatario);
}

?>