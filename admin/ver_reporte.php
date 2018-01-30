<?php 



error_reporting();

include_once("lib/template.php");



	$membership = new loginActions();

	$membership->confirm_Member2();

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

//<![CDATA[



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



//]]>



</script>

 

<?	

   body();?> <div id="page-wrapper">







        <div class="row">



          <div class="col-sm-8 col-md-10 col-lg-12 col-xs-12">



            <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE COTIZACIONES</h2>


            <br/>



           



          </div>



        </div>



		<div class="row">



          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">



            <div class="row">



												<hr>



												<h2 class="title-step" style="text-align: center;">Cotización y Clientes</h2>



												<!--<div class="fb-comments" data-href="http://www.impressline.com.mx/detalle.php?id_categoria=1&id=5" data-num-posts="5" data-width="875"></div>-->



											<div class="table-responsive">



											



              <table class="table table-bordered table-hover table-striped tablesorter">



                <thead>



                  <tr>



                  	<td style="background-color: #0A0145;color: #ffffff;"><input type="checkbox" id="marcar" onclick="marcar_desmarcar();" value="" checked></td>



                    <th style="background-color: #0A0145;color: #ffffff;">Codigo</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Producto</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Cantidad</th>



                    <th style="background-color: #0A0145;color: #ffffff;">P. Unitario</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Sub-total</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Personalizado</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Nota</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Precio P/unit</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Total personalizado</th>



                    <th style="background-color: #0A0145;color: #ffffff;">TOTAL</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Color</th>



                  </tr>



                </thead>



                <tbody>



                <?



							$link=conectarse_servicios();

              $email = $_GET['us'];

              $email2 =  strstr($email, '@');

              if($email2 == TRUE){

              $query_usuario="Select * from registro where email='$email' ;";



              $resultado_usuario=mysql_query($query_usuario, $link);

              if(mysql_num_rows($resultado_usuario)>0){

                while($row_usuario = mysql_fetch_array($resultado_usuario)){ 

                  $nombre_usuario = $row_usuario['nombres'];

                  $apellido_usuario = $row_usuario['apellidos'];

                  $email_usuario = $row_usuario['email'];

                  $empresa_usuario = $row_usuario['empresa'];

                  $telefono_usuario = $row_usuario['telefono'];

              }

            }

                              

          }else{

                  $nombre_usuario = '';

                  $apellido_usuario = '';

                  $email_usuario = '';

                  $empresa_usuario = '';

                  $telefono_usuario = '';



          }







							$usuario=$_GET['us'];



							$fecha=$_GET['f'];



                            $hora=$_GET['h'];

                            $codigo_cotizacion = $_GET['cc'];



							$query="Select * from cotizacion where usuario='$usuario' and estatus=2 and fecha='$fecha' and hora='$hora';";



							$resultado=mysql_query($query, $link);



							//echo $resultado;







							$icont=0;



							$class='success';



						



							if(mysql_num_rows($resultado)>0){







								while($row = mysql_fetch_array($resultado)){ 



									$tipo=html_entity_decode($row['persona'], ENT_QUOTES);

									$notas_personalizacion = htmlspecialchars_decode($row['notas_personalizacion'],ENT_QUOTES);
                  $dest = $row['destinatario'];



									$idss=$row['id_articulo'];







									$icont++;



									if($class=='success'){



								$class='active';



								}else{



									$class='success';



								}







									$laclase=($icont%2==0?"fila_par":"fila_impar");







									$imagen='no_publicado.gif';



									







									if($row['estatus']==0){







										$imagen='publicado.gif';



										$tip="Capturado ";







									}



									if($row['estatus'] == 2){



										$imagen='publicado.gif';



										$tip='Enviado ';



									}







									if($row['estatus'] == 1){



										$imagen='publicado.gif';



										$tip="Pendiente Enviar ";



									}











									



									if($imagen=='no_publicado.gif'){



										$class='danger';







										



									}







								?>



                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">



                  <form method="post" action="reporte_pdf.php" name="form" class="validar_form" target="_blank">



                  <input type="hidden" name="id[]" value="<?php echo $row['idcotizacion'];?>">



                  <input type="hidden" name="usuario" value="<?php echo $usuario;?>">



                  <input type="hidden" name="fecha" value="<?php echo $fecha;?>">



                  <input type="hidden" name="hora" value="<?php echo $hora;?>">

                  <input type="hidden" name="cc" value="<?php echo $codigo_cotizacion;?>">



                  



                    <td><input type="checkbox" name="seleccion[]" value="<?php echo $row['idcotizacion']; ?>" checked></td>



                    <td><? echo html_entity_decode($row['codigo'], ENT_QUOTES); ?></td>



                    <td><u><a href="../detalle.php?id=<?php echo $row['id_articulo'];?>" target="_blank"><?php echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></a></u></td>



                    <td><?php echo $row['unidad'];?></td>



											<td>$ <?php echo ROUND($row['precio_venta'],2);?></td>



											<?php 



											$precio=ROUND($row['precio_venta'],2);



											$u=$row['unidad'];



											$sub=$precio*$u;







											?>



											<td>$ <?php echo $sub;?></td>



                                            <td><?php echo $tipo;?></td>

                                            <td><?php echo $notas_personalizacion;?></td>



                                            <td>$ <?php echo $row['precio_persona'];?></td>



                                            <?php 



											$precio_per=$row['precio_persona'];



											$u=$row['unidad'];



											$sub2=$precio_per*$u;







											?>



                                            <td>$ <?php echo $sub2;?></td>



                                            <td>$ <?php echo $total= $sub+$sub2;?></td>



											<td><?php echo $row['color'];?></td>



											



											



                  </tr>



                  <? }







							}







							?>



                            



       



                </tbody>



              </table>







              



              <? if(mysql_num_rows($resultado) <= 0){?>



         <h1 style="text-align:center;" class="danger">No hay solicitudes de cotizacion por el momento</h1>



         <?php }?>



         <?php



         $link=conectarse_servicios();

         $user=$_SESSION['admin_user'];

         $query="SELECT * FROM usuarios where usuario = '$user'";

         $resultado9=mysql_query($query, $link);

         while($row9=mysql_fetch_array($resultado9)){

          $nombre = $row9['nombre'].' '.$row9['apellido_paterno'].' '.$row9['apellido_materno'];

          $telefono = $row9['telefono'];

          $email = $row9['email'];

          $puesto = $row9['puesto'];



         }?>



            <table class="table table-bordered table-hover table-striped tablesorter">



              	            <!--<tr><td>Destinatario: </td><td><input type="text" name="destinatario2" id="destinatario" value="<?php echo $nombre_usuario.' '.$apellido_usuario;?>" style="width: 100%"></td></tr>



                            <tr><td>Empresa: </td><td><input type="text" name="empresa" id="empresa" value="<?php echo $empresa_usuario;?>"  style="width: 100%"></td></tr>

                            <tr><td>Contacto: </td><td><input type="text" name="contacto_empresa" id="contacto_empresa" value=""  style="width: 100%"></td></tr>

                            <tr><td>Email: </td><td><input type="text" name="email_empresa" id="email_empresa" value="<?php echo $email_usuario;?>"  style="width: 100%"></td></tr>

                            <tr><td>Celular: </td><td><input type="text" name="celular_empresa" id="celular_empresa" value="<?php echo $telefono_usuario;?>" style="width: 100%"></td></tr>-->

                            <tr>

                              <td>Cliente</td>

                              <td><select class="form-control" name="id_cliente" id="proveedor" style="float: left;" class="required">



                                     <option value="">Seleccionar Cliente</option>



      <?php

    $query="SELECT id_clientes,destinatario FROM clientes order by destinatario asc";

    $resultado=mysql_query($query, $link);

    while($row=mysql_fetch_array($resultado)){

      ?>



       <option  value="<? echo $row[0]; ?>" <?php if($row[1] == $dest){ echo 'selected="selected"';} ?> ><?php echo $row[1]; ?> </option>



         <?php } ?>



         </select><a href="clientes.si.php?opc=ADD&id=0" class="btn btn-success" style="position: absolute;margin-left: 27px;">Agregar cliente</a></td>

                            </tr>



                            <tr><td>Saludo: </td><td><input type="text" name="saludo" value="En atenci&#243;n a su solicitud, le envío la siguiente cotizaci&oacute;n de artículos promocionales." style="width: 100%" ></td> </tr>



                            <tr><td>Despedida: </td><td><input type="text" name="despedida" value="Agradezco su atenci&oacute;n a la presente, quedo a sus &oacute;rdenes para cualquier duda o aclaraci&oacute;n."  style="width: 100%"></td> </tr>



                            <tr><td>Cotizado por: </td><td><input type="text" name="cotizo" value="<?php echo $nombre;?>"  style="width: 100%"></td></tr>



                            <tr><td>Puesto: </td><td><input type="text" name="puesto" value="<?php echo $puesto;?>" style="width: 100%"></td></tr>



                            <tr><td>Celular: </td><td><input type="text" name="telefono" value="<?php echo $telefono;?>" style="width: 100%"></td></tr>



                            <tr><td>Email: </td><td><input type="text" name="email" value="<?php echo $email;?>" style="width: 100%"></td></tr>



                            <tr><td>Condiciones: </td><td><input type="text" name="condicion" value="Pago de contado."  style="width: 100%"></td></tr>
                            <tr><td>Tiempo de entrega:</td><td><select class="form-control" name="tiempo_entrega" id="proveedor" style="float: left;" class="required">



      <?php

    $query="SELECT id_tiempo_entrega,tiempo_entrega FROM tiempo_entrega order by id_tiempo_entrega asc";

    $resultado=mysql_query($query, $link);

    while($row=mysql_fetch_array($resultado)){

      ?>



       <option  value="<? echo $row[0]; ?>" <?php if($row[0] == 4){ echo 'selected="selected"';}?>?><?php echo $row[1]; ?> </option>



         <?php } ?>



         </select></td></tr>



                            <tr><td>Nota: </td><td><input type="text" name="nota" value="Se aplican restricciones. Precios sujetos a cambios sin previo aviso." style="width: 100%"></td></tr>
                            <tr><td>Gran Total</td><td><input type="checkbox" name="gt" checked="checked" ></td></tr>



                            </table>

                          

                          </div>



            				      <a href="javascript:window.history.go(-1);" class="btn btn-success" style="background-color: rgb(71, 164, 71);;border-color: rgb(71, 164, 71);">Regresar</a>

                          <button class="btn btn-success" type="submit" >Exportar PDF</button>



												 </form>

                         

											</div>



										</div>



									</div>



								</div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>



  <script>

  $(document).ready(function(){

  

    // generamos un evento cada vez que se pulse una tecla

    $("#destinatario").keyup(function(){

      

      // enviamos una petición al servidor mediante AJAX enviando el id

      // introducido por el usuario mediante POST

      $.post("miarchivo.php", {"id":$("#destinatario").val()}, function(data){

      

        // Si devuelve un nombre lo mostramos, si no, vaciamos la casilla

        if(data.empresa)

          $("#empresa").val(data.empresa);

        else

          $("#empresa").val("");

          

        // Si devuelve un apellido lo mostramos, si no, vaciamos la casilla

        if(data.contacto_empresa)

          $("#contacto_empresa").val(data.contacto_empresa);

        else

          $("#contacto_empresa").val("");



        //

        if(data.email_empresa)

          $("#email_empresa").val(data.email_empresa);

        else

          $("#email_empresa").val("");



        //

        if(data.celular_empresa)

          $("#celular_empresa").val(data.celular_empresa);

        else

          $("#celular_empresa").val("");



        if(data.destinatario2)

          $("#destinatario2").val(data.destinatario2);

        else

          $("#destinatario2").val("");



        if(data.id_cliente)

          $("#id_cliente").val(data.id_cliente);

        else

          $("#id_cliente").val("");



      },"json");

    });

  });

  </script>





								    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>



    <script type="text/javascript">



             $(".validar_form").submit( function(){



        var check = $("input[type='checkbox']:checked").length;



        



            if(check == ""){



                alert('"Seleccione al menos un checkbox"');



                return false;



            } else {



                $('.errors').hide();



                //alert('Generando PDF');



                return true;



            }   



    });



    </script>

					<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

					<script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>

<?php footer(); ?>