<?php
include_once("lib/conexion.php");
$id_category = $_POST['id_category'];

$result = $conexion->query("SELECT * FROM clientes WHERE id_parent = ".$id_category." ORDER BY name ASC");
$query="SELECT id_clientes,destinatario FROM clientes";
$resultado=mysql_query($query, $link);
if(mysql_num_rows($resultado)>0){
		while($row=mysql_fetch_array($resultado)){        
        $html .= '<input type="text" name="destinatario2" id="destinatario" value="<?php echo $row["destinatario"];?>" style="width: 100%">';
    }
}
echo $html;
?>

                           <!-- <tr><td>Empresa: </td><td><input type="text" name="empresa" id="empresa" value="<?php echo $empresa_usuario;?>"  style="width: 100%"></td></tr>
                            <tr><td>Contacto: </td><td><input type="text" name="contacto_empresa" id="contacto_empresa" value=""  style="width: 100%"></td></tr>
                            <tr><td>Email: </td><td><input type="text" name="email_empresa" id="email_empresa" value="<?php echo $email_usuario;?>"  style="width: 100%"></td></tr>
                            <tr><td>Celular: </td><td><input type="text" name="celular_empresa" id="celular_empresa" value="<?php echo $telefono_usuario;?>" style="width: 100%"></td></tr>-->