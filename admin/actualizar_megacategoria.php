<?php
error_reporting(0);
include_once("lib/conexion.php");
$link=conectarse(); 

$opcion1=$_POST['opcion1'];
if(!empty($opcion1)){
   $categoria=implode(',',$_POST['tipo']);
   $cambio=$_POST['seleccion'];
for($i=0;$i<=count($cambio);$i++){
   $query[$i] = "select * from articulos where id_articulo =".$cambio[$i].";";
   //echo '<br/>';
  $resultado[$i]=mysql_query($query[$i], $link);
if(mysql_num_rows($resultado[$i])>0){

while($row[$i] = mysql_fetch_array($resultado[$i])){ 
   $categoria_ant[$i] = $row[$i]['mega_categoria'];
   //echo "<br/>";

   if($categoria_ant[$i] == ''){
      $categoria_actualiza[$i] = $categoria;
   }else{
      $categoria_actualiza[$i] = $categoria_ant[$i].','.$categoria;
   }
   //echo "<br/>";

   //echo '<br/>';
$tranx[$i]="update articulos set mega_categoria='". $categoria_actualiza[$i]."',mega_categoria_anterior='".$categoria_ant[$i]."' where id_articulo =".$cambio[$i].";";               
$rtranx[$i]=mysql_query($tranx[$i], $link);
$idreg = mysql_insert_id($link);
}
}
}
   header("Location:filtro_megacategorias_masivo.php"); 

}


//header("Location:filtro_articulos.php");

?>