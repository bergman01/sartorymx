 <?php
include_once('lib/conexion.php');
$link=conectarse();

$id=$_POST['id_articulo'];

$precio=$_POST['precio'];

$tranx="update articulos set precio_venta='$precio' where id_articulo='$id'";
$rtranx=mysql_query($tranx, $link);	
$idreg = mysql_insert_id($link);	
echo "<script language='javascript'>window.location='filtro_articulos.php'</script>"; 			
?>
