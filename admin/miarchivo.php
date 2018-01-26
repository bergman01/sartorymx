<?php
include_once('lib/conexion.php');
# Esta página recibe por post el id del formulario.
#
# Para nuestro ejemplo, devolvemos un valor para el id 10, pero aqui se tendria
# que realizar la busqueda en la base de datos en busca del registro.
#
$link = conectarse();

if($_POST["id"] != "")
{
	$id = $_POST['id'];
	$id=trim($id);
	 $query = "select destinatario,empresa,contacto_empresa,email,celular,id_clientes from clientes where destinatario like '%$id%'";
	$resultado=mysql_query($query, $link);
    while($row=mysql_fetch_array($resultado)){
    	$empresa = $row['empresa'];
    	$contacto_empresa = $row['contacto_empresa'];
    	$email_empresa = $row['email'];
    	$celular_empresa = $row['celular'];
    	$destinatario = $row['destinatario'];
    	$id_cliente = $row['id_clientes'];
    }
	echo json_encode(array("empresa"=>$empresa, "contacto_empresa"=>$contacto_empresa,"email_empresa"=>$email_empresa,"celular_empresa"=>$celular_empresa,"destinatario2"=>$destinatario,"id_cliente"=>$id_cliente));
}else{
	echo json_encode(array("empresa"=>"", "contacto_empresa"=>"","email_empresa"=>"","celular_empresa"=>"","destinatario2"=>"","id_cliente"=>""));
}
?>
