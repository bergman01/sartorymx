<?php
include_once("lib/conexion.php");

$link=conectarse();

function porcentaje($venta,$porciento,$decimales){

return number_format($venta*$porciento/100 ,$decimales);
}
$utilidad = '30';
$query="select * from articulos where costos = 0";

$resultado=mysql_query($query, $link);

while($row=mysql_fetch_array($resultado)){ 
$id = $row['id_articulo'];
$ventas = $row['precio_venta'];
$costos=porcentaje($ventas,$utilidad,2);
$venta = round($ventas,2);
$costo = $venta - $costos;

mysql_query("BEGIN");
$tranx = "update articulos set costos = '$costo' where id_articulo = $id;";
$rtranx=mysql_query($tranx, $link);
if(!$rtranx) {
	mysql_query("ROLLBACK");
	$estatus="ERROR";
}else{
	mysql_query("COMMIT");
	$estatus="OK";
}

}
/*
$utilidad = '30';
$ventas = $_POST['venta'];
$costos=porcentaje($ventas,$utilidad,2);
$venta = round($ventas,2);
echo "Ventas redondeados ".$venta."<br/>";
$costo = $venta - $costos;
echo "Costo ".$costo.'<br/>';
$ppv=100-$utilidad;
$ppv='.'.$ppv;
$venta=$costo / $ppv;
echo "venta ".$venta;
*/?>
<form action="" method="post">
<input type="text" name="venta">
<br/>
<input type="submit" name="manda" value="ver">
</form>