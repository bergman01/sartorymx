 <?php
include_once('lib/conexion.php');
$link=conectarse();

$id=$_POST['hora'];

$cliente=$_POST['cliente'];

$cotizado_por=$_POST['cotizado_por'];

$tranx="update cotizacion set empresa='$cliente',cotizado_por='$cotizado_por' where hora='$id'";
$rtranx=mysql_query($tranx, $link);	
$idreg = mysql_insert_id($link);	
echo "<script language='javascript'>window.location='filtro_cotizacion.php'</script>"; 			
?>
