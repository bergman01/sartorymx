<?php

include_once('lib/conexion.php');



$link=conectarse();

function porcentaje($cantidad,$porciento,$decimales){

return number_format($cantidad*$porciento/100 ,$decimales);
}
$palabra = $_POST['palabras'];
$proveedor = $_POST['proveedores'];
$codigo = $_POST['codigos'];
$porciento="30";


$id=$_POST['id'];

$costos=$_POST['costo'];

$utilidad=$_POST['utilidad'];

$cantidad=$_POST['precio_venta'];

//$buscar=substr($utilidad, 2);


for ($i=0; $i<=count($id); $i++) {

$ppv[$i]= 100-$utilidad[$i];
$ppv[$i]= ".".$ppv[$i];
$precio_venta[$i]=$costos[$i] / $ppv[$i];
$precio_venta[$i]=round($precio_venta[$i], 2);
$tranx[$i]="update articulos set precio_venta='".$precio_venta[$i]."',costos='".$costos[$i]."',utilidad='".$utilidad[$i]."',update_precios=NOW() where id_articulo=".$id[$i].";";					

$rtranx=mysql_query($tranx[$i], $link);

$idreg = mysql_insert_id($link);

}	


header("location:filtro_precios.php?palabra=".$palabra."&proveedor=".$proveedor."&codigo=".$codigo);

?>