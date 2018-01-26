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
//$gran_total = $_POST['gran_total'];
//$gran_total = $_POST['gran_total'];
$descuento = $_POST['descuento'];
$descuento_valor = $_POST['descuento_valor'];
$total=$_POST['total'];

for ($i=0; $i<=count($id); $i++) {
	if ($_POST["gran_total"][$i]=='on'){
				$gran_total[$i]=1;
			}else{ $gran_total[$i] = 0; }

$total[$i] = $total[$i]+($precio_per[$i] * $unidad[$i]);

$tranx[$i]="update cotizacion set persona='".$tipo[$i]."',precio_venta='".$precio[$i]."',unidad=".$unidad[$i].",precio_persona='".$precio_per[$i]."',notas_personalizacion='".$notas[$i]."',descuento='".$descuento[$i]."',descuento_valor=".$descuento_valor[$i].",gran_total=".$gran_total[$i]." where idcotizacion=".$id[$i].";";

$rtranx=mysql_query($tranx[$i], $link);

$idreg = mysql_insert_id($link);

}	

header("location:ver_cotizacion.php?id=$usuario&f=$fecha&h=$hora");

?>