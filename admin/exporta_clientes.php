<?php
include_once('lib/conexion.php');
header("Content-type: application/vnd.ms-$tipo");
header("Content-Disposition: attachment; filename=clientes.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                	<tr>
                  	<th style="background-color: #0A0145;color: #ffffff;">Clave</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Nombres</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Apellidos</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Empresa</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Email</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Telefono Fijo</th>
                    <th style="background-color: #0A0145;color: #ffffff;">CElular</th>
                  </tr>
                </thead>
                <tbody>
                <?php
							$link=conectarse_servicios();
							$empresa = $_POST['empresa'];
							$nombre = $_POST['nombre'];
							$apellido = $_POST['apellido'];

							$query="SELECT * FROM clientes order by id_clientes asc;";

							$resultado=mysql_query($query, $link);
							$icont=0;

							$class='success';



							if(mysql_num_rows($resultado)>0){



								while($row = mysql_fetch_array($resultado)){ 
									$icont++;
									if($class=='success'){
								$class='active';

								}else{
									$class='success';
								}



									$laclase=($icont%2==0?"fila_par":"fila_impar");



									$imagen='no_publicado.gif';



									if($row['publicar']=='S'){



										$imagen='publicado.gif';



									}
									if($imagen=='no_publicado.gif'){

										$class='success';
									}



								?>
                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                    <td><a href="admin.si.clientes.php?<? echo "id=".$row['id_clientes']."&opc=UPD"; ?>&rowId=row<? echo $icont; ?>"><?php echo $row['id_clientes'];?></a></td>
                    <td><? echo html_entity_decode($row['nombres'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['apellidos'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['empresa'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['email'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['telefono_empresa'], ENT_QUOTES); ?> Ext: <? echo html_entity_decode($row['extension'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['celular'], ENT_QUOTES); ?></td>
                  </tr>
                  <?php }
							}



							?>



                </tbody>







              </table>