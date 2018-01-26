<?php
error_reporting(0);
include_once("lib/conexion.php");
	$link=conectarse(); 

$codigo=$_GET['codigo'];

$tranx="update cotizacion set estatus=6 where codigo_cotizacion ='$codigo'";
$rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);
header("Location:filtro_cotizacion.php");

?>