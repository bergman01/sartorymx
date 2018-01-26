<?php
include_once('lib/conexion.php');
header("Content-type: application/vnd.ms-$tipo");
header("Content-Disposition: attachment; filename=visitantes.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th style="background-color: #0A0145;color: #ffffff;">Nombre</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Empresa</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Telefono</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Usuario</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Password</th>
                    <th style="background-color: #0A0145;color: #ffffff;"># visitas</th>
                  </tr>
                </thead>
                <tbody>
                <?php
              $link=conectarse_servicios();
              $query="SELECT * FROM registro order by id desc  ;";
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
                    <td><?php echo $row['nombres'];?> <?php echo $row['apellidos'];?> </td>
                    <td><?php echo $row['empresa'];?></td>
                    <td><?php echo $row['telefono'];?></td>
                    <td><a href="admin.si.usuarios.php?id=<?php echo $row['id'];?>&opc=UPD"><?php echo $row['usuario'];?></a></td>
                    <td><?php echo $row['pass2'];?></td>
                    <td><?php echo $row['visitas'];?></td>
                  </tr>
                  <?php }
              }
              ?>
                </tbody>
              </table>