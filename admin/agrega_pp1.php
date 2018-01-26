<?php

include_once('lib/conexion.php');



$link=conectarse();

$usuario=$_POST['usuario'];

$fecha=$_POST['fecha'];

$hora=$_POST['hora'];

$precio_per=$_POST['precio_per'];

$id=$_POST['id'];

$unidad=$_POST['unidad'];

$precio=$_POST['precio_unitario'];
$tipo=$_POST['tipo'];
$notas = $_POST['notas'];

for ($i=0; $i<=count($id); $i++) {

 $tranx[$i]="update cotizacion set persona='".$tipo[$i]."',precio_venta='".$precio[$i]."',unidad=".$unidad[$i].",precio_persona='".$precio_per[$i]."',notas_personalizacion='".$notas[$i]."' where idcotizacion=".$id[$i].";";

$rtranx=mysql_query($tranx[$i], $link);

$idreg = mysql_insert_id($link);

}	

header("location:ver_cotizacion.php?id=$usuario&f=$fecha&h=$hora");

?>