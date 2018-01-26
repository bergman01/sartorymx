<?php 







error_reporting();







include_once("lib/template.php");







  $membership = new loginActions();







  $membership->confirm_Member2();







//  include_once("librerias/rutas.php");







  cabezal(); ?>







<style>







.fila_par{







  background-color:#FFFFFF;







}







.fila_impar{







  background-color:#E5E5E5;







}







.new_row{







  background:#FFFFCC;







}







.tabla_encabezado {







  background-color:#D1D1D1;







  color:#000000;







  font-family:'Arial';







  font-size:11px;







  font-weight:bold;







}







#modTitle{







  font-family:Verdana, Arial, Helvetica, sans-serif; 







  font-weight:bold;







}







#msgContainer{







  padding-top:10px;







  padding-bottom:10px;







  text-align:center;







  font-family:Verdana, Arial, Helvetica, sans-serif;







  font-size:12px;







  width:100%;







}







#msgContainer a{







  text-decoration:none;







  color:#0066FF;







}







div.saved{







  background:#99FF99;







  border-top:1px solid #339900;







  border-bottom:1px solid #339900;







}















div.error{







  background:#FFCCCC;







  border-top:1px solid #FF3366;







  border-bottom:1px solid #FF3366;







}







.form-control{







  width:auto;







}







</style>







<link rel="stylesheet" type="text/css" href="css/rounded_borders.css">







<script language="javascript" src="js/jquery-1.2.6.min.js" type="text/javascript"></script>







<script language="javascript" src="js/get2post.js" type="text/javascript"></script>







<script language="javascript">















function fEliminarSeccion(idseccion){















  if (confirm("¿Está seguro de querer eliminar esta seccion?"))















    $(".InfoBarContent").load("eliminar_doc.php",{t:'del',ids:idseccion, prmsection:2 ,rnd:Math.random()});















}







function pregunta(){ 















    if (confirm('¿Está seguro de querer eliminar este proveedor?')){ 















       document.v.submit() 















    } 















} 















function confirmar ( mensaje ) { 















return confirm( mensaje ); 















} 



function marcar_desmarcar(){



var marca = document.getElementById('marcar');



var cb = document.getElementsByName('seleccion[]');



for (i=0; i<cb.length; i++){



if(marca.checked == true){



cb[i].checked = true



}else{



cb[i].checked = false;



}



}



 



}















</script>















<?php body();?>

   <div id="page-wrapper">

        <div class="row">

          <div class="col-sm-8 col-md-6 col-lg-10 col-xs-14">

           <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE VISITANTES</h2>

          </div>

        </div>

    <div class="row">

          <div class="col-sm-8 col-md-6 col-lg-12 col-xs-14">

            <div class="row">

              <div class="col-sm-8 col-md-6 col-lg-2 col-xs-14"><h1>Visitantes</h1></div>



              <form action="eliminar_usuarios2.php" method="post">

              <div class="col-sm-8 col-md-6 col-lg-10 col-xs-4" align="right"><h2><a href="admin.si.usuarios.php?opc=ADD&id=0" class="btn btn-success">Agregar Usuario visitante</a> <span><input type="submit" class="btn btn-primary" value="Eliminar Seleccion"></span> <a href="exporta_visitantes.php" class="btn btn-success">Exporta visitantes</a></h2></div>

            </div>

            <div class="table-responsive">

              <form action="" method="post"> 



             <h2>Buscador general</h2>



             <table class="table table-bordered table-hover table-striped tablesorter">



              <tr>



                <td><strong>Empresa</strong><br/><input type="text" name="empresa"></td>

                <td><strong>Nombre</strong><br/><input type="text" name="nombre"></td>

                <td><strong>Apellidos</strong><br/><input type="text" name="apellido"></td>

                    <td><input type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Buscar"></td>



              </tr>



            </table>



            </form>

              <table class="table table-bordered table-hover table-striped tablesorter">

                <thead>

                  <tr>

                    <td style="background-color: #0A0145;color: #ffffff;"><input type="checkbox" id="marcar" onclick="marcar_desmarcar();" value=""></td>

                    <th style="background-color: #0A0145;color: #ffffff;">Nombre</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Empresa</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Telefono</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Usuario</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Email</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Password</th>

                    <th style="background-color: #0A0145;color: #ffffff;"># visitas</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Ultimo login</th>

                    <th style="background-color: #0A0145;color: #ffffff;"></th>

                    <th style="background-color: #0A0145;color: #ffffff;"></th>

                  </tr>

                </thead>

                <tbody>

                <?php

              $link=conectarse_servicios();

              $empresa = $_POST['empresa'];

              $nombres = $_POST['nombre'];

              $apellidos = $_POST['apellido'];

              $query="SELECT * FROM registro order by ultimo_inicio desc;";

              if($empresa != ''){

                $query = "SELECT * from registro where empresa like '%$empresa%' order by id asc;";

              }



              if($nombre !=''){

                $query = "SELECT * FROM registro where nombres like '%$nombre%' order by id asc;";

              }



              if($nombre !='' && $apellido !=''){

                $query = "SELECT * from registro where apellidos like '%$apellidos%' order by id asc;";

              }



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

                    <td><input type="checkbox" name="seleccion[]" value="<?php echo $row['id']; ?>" requerit></td>

                    <td><?php echo $row['nombres'];?> <?php echo $row['apellidos'];?> </td>

                    <td><?php echo $row['empresa'];?></td>

                    <td><?php echo $row['telefono'];?></td>

                    <td><a href="admin.si.usuarios.php?id=<?php echo $row['id'];?>&opc=UPD"><?php echo $row['usuario'];?></a></td>

                    <td><img src="img/<?php echo $imagen; ?>"></td>

                    <td><?php echo $row['pass2'];?></td>

                    <td><?php echo $row['visitas'];?></td>

                    <?php if(date("d/m/Y", strtotime($row['ultimo_inicio'])) == '31/12/1969'){?>

                    <td>Sin loguin</td>

                    <?php }else{?>

                    <td><?php echo date("d/m/Y", strtotime($row['ultimo_inicio']));?></td>

                    <?php }?>

                    <td><?php if($row['es_cliente'] == 0){?><a href="convierte_cliente.php?id=<?php echo $row['id'];?>"><i class="fa fa-address-card"></i>Convertir a Cliente</a><?php }else{?> <img src="img/publicado.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /><?php }?></td>

                    <td><a href="eliminar_registro.php?id=<?php echo $row[0]; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>

                  </tr>

                  <?php }

              }

              ?>

                </tbody>

              </table>

            </form>

              <? if(mysql_num_rows($resultado) <= 0){?>

         <h1 style="text-align:center;" class="danger">No hay Proveedores capturados por el momento</h1>

         <?php }?>

            </div>

          </div>

         </div>

        </div>

          <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

          <script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>

<?php footer(); ?>