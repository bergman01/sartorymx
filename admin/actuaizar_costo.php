<?php
include_once("lib/conexion.php");
$link=conectarse();
$costo = $_POST['costos'];
$utilidad = $_POST['utilidad'];
$id_articulo = $_POST['id_articulo'];
$ppv=100-$utilidad;
$ppv='.'.$ppv;
$venta=$costo / $ppv;
echo $tranx="update articulos set precio_venta='$venta',costos='$costo' where id_articulo=$id_articulo";	
$rtranx=mysql_query($tranx, $link);

//header("Location:filtro_articulos.php");
?>