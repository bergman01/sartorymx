<?php
error_reporting(0);
include_once('lib/conexion.php');
$link=conectarse();

$precio_per=$_POST['orden'];
$id= $_POST['idcat'];

for ($i=0; $i<=count($precio_per); $i++) {
$tranx[$i]="update banners set orden=".$precio_per[$i]." where id_banner=".$id[$i].";";    				
$rtranx=mysql_query($tranx[$i], $link);
$idreg = mysql_insert_id($link);
}	
header("location:filtro_banners.php");
?>