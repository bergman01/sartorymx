<?php

include_once("lib/conexion.php");

$id = $_GET['id'];

$link=conectarse_servicios();

$query="SELECT nombres,apellidos,email,telefono,empresa FROM registro where id = $id;";

$resultado=mysql_query($query, $link);

if(mysql_num_rows($resultado)>0){

	while($row = mysql_fetch_array($resultado)){

		$nombres = $row['nombres'];

		$apellidos = $row['apellidos'];

		$email = $row['email'];

		$telefono = $row['telefono'];

		$empresa = $row['empresa'];

		$destinatario = $row['nombres'].' '.$row['apellidos'];

	}

}

$update ='update registro set es_cliente = 1 where id = '.$id;

$update_tranx=mysql_query($update, $link);

$tranx = "insert into clientes(destinatario,nombres,apellidos,email,celular,empresa) values('$destinatario','$nombres','$apellidos','$email','$celular','$empresa')";



$rtranx=mysql_query($tranx, $link);

$idreg = mysql_insert_id($link);

header("Location:visitantes.php");