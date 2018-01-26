<?php
error_reporting(0);
include_once("lib/conexion.php");
$link=conectarse(); 

$opcion1=$_POST['opcion1'];
if(!empty($opcion1)){
   $categoria=implode(',',$_POST['tipo']);
   $cambio=implode(',',$_POST['seleccion']);
   $cambio;
   $query = "select * from articulos where id_articulo in(".$cambio.");";
   //echo '<br/>';
   $resultado=mysql_query($query, $link);
if(mysql_num_rows($resultado)>0){

while($row = mysql_fetch_array($resultado)){ 
	$categoria_ant = $row['categoria_anterior'];

	//$categoria_actualiza = $categoria_ant.','.$categoria;
	//echo '<br/>';
   
 $tranx="update articulos set categoria='". $categoria_ant."' where id_articulo in(".$cambio.");";					
$rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);
}
}
   header("Location:filtro_categorias_masivo.php"); 

}


//header("Location:filtro_articulos.php");

?>