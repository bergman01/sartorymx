<?php 



error_reporting();



include_once("lib/template.php");



	$membership = new loginActions();



	$membership->confirm_Member2();



//	include_once("librerias/rutas.php");



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



}div.error{

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





function porcentaje($venta,$porciento,$decimales){



return number_format($venta*$porciento/100 ,$decimales);

}

</script>



<?php /*for($i=0;$i<999;$i++){

		echo '<script type="text/javascript">

		$(document).ready(function(){

   $("#mayoria_edad'.$i.'").click(function(evento){

      if ($("#mayoria_edad'.$i.'").attr("checked")){

         $("#formulariomayores'.$i.'").css("display", "block");

      }else{

         $("#formulariomayores'.$i.'").css("display", "none");

      }

   });

});

    </script>';

	}*/?><br/>



<?	







   body();?> <div id="page-wrapper">







        <div class="row">



          <div class="col-sm-8 col-md-10 col-lg-12 col-xs-12">



            <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE VENTAS</h2>



            <br/>

          </div>



        </div>

		<div class="row">



          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">



            <div class="row">

<hr>



<h2 class="title-step">DETALLES DE LA VENTA</h2>

											<div class="table-responsive">

              

                <?php
							$link=conectarse_servicios();

							$usuario=$_GET['id'];
							$fecha=$_GET['f'];
                            $hora=$_GET['h'];

                            $codigo_cotizacion = $_GET['cc'];

                                 $query2="Select * from cotizacion where usuario='$usuario' and estatus=5 and fecha='$fecha' and hora='$hora' limit 1;";

							$resultado2=mysql_query($query2, $link);
							if(mysql_num_rows($resultado2)>0){

								while($row1 = mysql_fetch_array($resultado2)){ 
									$motivo = $row1['motivo'];
								}
							}

							$query="Select * from cotizacion where usuario='$usuario' and estatus=5 and fecha='$fecha' and hora='$hora';";

							$resultado=mysql_query($query, $link);

							//echo $resultado;

							$icont=0;

							$class='success';

							if(mysql_num_rows($resultado)>0){

								while($row = mysql_fetch_array($resultado)){ 

									$tipo=html_entity_decode($row['persona'], ENT_QUOTES);

									$notas_personalizacion = htmlspecialchars_decode($row['notas_personalizacion'],ENT_QUOTES);

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
                <table class="table table-bordered table-hover table-striped tablesorter">



                <thead>



                  <tr>



                    <th style="background-color: #0A0145;color: #ffffff;">Codigo</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Producto</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Cantidad</th>



                    <th style="background-color: #0A0145;color: #ffffff;">P. Unitario</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Sub-total</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Personalizado</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Nota </th>
                  </tr>
                </thead>
                <tbody>

                  <tr class="sucess" id="row<? echo $icont; ?>">

                  <form method="post" action="observaciones_cancelacion.php">

                  <input type="hidden" name="id[]" value="<?php echo $row['idcotizacion'];?>">

                  <input type="hidden" name="usuario" value="<?php echo $usuario;?>">

                  <input type="hidden" name="fecha" value="<?php echo $fecha;?>">

                  <input type="hidden" name="hora" value="<?php echo $hora;?>">

                  <input type="hidden" name="codigo_cotizacion" value="<?php echo $codigo_cotizacion;?>">

                    <td><? echo html_entity_decode($row['codigo'], ENT_QUOTES); ?></td>

                    <td><u><a href="../detalle.php?id=<?php echo $row['id_articulo'];?>" target="_blank"><?php echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></a></u></td>

                    <td><input type="text" style="width: 50px" name="unidad[]" value="<?php echo $row['unidad'];?>"></td>

					<td><span class="add-on">$ </span><input type="text" name="precio_unitario[]" value="<?php echo ROUND($row['precio_venta'],2);?>" style="width: 50px" /></td>

											<?php 
											$precio=ROUND($row['precio_venta'],2);

											$u=$row['unidad'];

											$total_previo = $precio * $u;

											$sub=$precio*$u;

											$descuento = $row['descuento_valor'];

											$porcentaje = $descuento/100;

											$precio_descuento = $sub*$porcentaje;

                                            $precio_descuento= round($precio_descuento,2);

                                            $total_descuento = $total-$precio_descuento;

                                            //$total_neto = $total_descuento*1.16;

                                            //$totals=$total_descuento*1.16;
                                            $total_descuento=round($total_descuento,2);
                                             $idmotivo = $row['motivo'];
                                            $obser = $row['observacion'];

											?>

											<?php if($row['descuento'] == 1){ ?>

                                            <td>$ <?php echo $total_descuento;?></td>

                                            <?php }else{?>

                                            <td><span class="add-on">$</span><?php echo $total_previo;?></td>

                                            <?php }?>

                                            <td><input type="text" value="<?php echo $tipo;?>" name="tipo[]"/></td>

                                            <td><input type="text" value="<?php echo $notas_personalizacion;?>" name="notas[]"/></td>
											</tr>

                            <table class="table table-bordered table-hover table-striped tablesorter">
                              <tr>
                              <td>Motivos de la cancelación</td>
                              <td>DETAS DE DETALLE</td>
                            </tr>
                            <tr>
                              <td>prueba</td>
                              <td>adasda</td>
                            </tr>
                        </table>
                         </tr>
                            <table>
                            <tr>
                              <td><button class="btn btn-success" type="submit">Actualizar Datos</button>&nbsp;&nbsp;&nbsp;</td>
                            </form>
                            </tr>
                        </table>
                </tbody>
              </table>
              <br/>

                  <?php
              }
              }
              ?>
              <table>
                            <tr>
                              <td><a href="filtro_ventas.php" class="btn btn-success" style="background-color: rgb(71, 164, 71);;border-color: rgb(71, 164, 71);">Regresar</a>&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                        </table>
                           
              <? if(mysql_num_rows($resultado) <= 0){?>
         <h1 style="text-align:center;" class="danger">No hay cotizaciones canceladas por el momento</h1>
         <?php }?>
            </div>
											</div>
										</div>
									</div>
								</div>
					<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
					<script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>
<?php footer(); ?>