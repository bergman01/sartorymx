<?php

include_once('lib/conexion.php');

$link=conectarse();

$usuario=$_POST['usuario'];

$fecha=$_POST['fecha'];

$hora=$_POST['hora'];

$id=implode(',',$_POST['id']);

$observacion = $_POST['observaciones'];
$motivo = $_POST['motivo'];

$tranx="update cotizacion set observacion='".$observacion."',motivo='".$motivo."' where idcotizacion in(".$id.");";

$rtranx=mysql_query($tranx, $link);

$idreg = mysql_insert_id($link);	

header("location:ver_cancelado.php?id=$usuario&f=$fecha&h=$hora");

?>