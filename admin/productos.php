<?php
include_once('lib/conexion.php');
if (isset($_GET['term'])){
	# conectare la base de datos
    $con=conectarse();
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	echo $fetch = mysql_query("SELECT * FROM productos where codigo_producto like '%" . $_GET['term'] . "%' LIMIT 0 ,50",$con); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysql_fetch_array($fetch)) {
		$id_producto=$row['id_producto'];
		$precio=number_format($row['precio_venta'],2,".","");
		$row_array['value'] = $row['codigo_producto']." | ".$row['nombre_producto'];
		$row_array['id_producto']=$row['id_producto'];
		$row_array['codigo']=$row['codigo_producto'];
		$row_array['descripcion']=$row['nombre_producto'];
		$row_array['precio']=$precio;
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysql_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>