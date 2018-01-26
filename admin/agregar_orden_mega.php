<?php
error_reporting(0);
include_once('lib/conexion.php');
$link=conectarse();

$precio_per=$_POST['orden'];
$id= $_POST['idcat'];

for ($i=0; $i<=count($precio_per); $i++) {
$tranx[$i]="update mega_categorias set mega_categoria_orden=".$precio_per[$i]." where mega_categoria_id=".$id[$i].";";    				
$rtranx=mysql_query($tranx[$i], $link);
$idreg = mysql_insert_id($link);
}	
header("location:filtro_categorias_master.php");
?>