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

<?php for($i=0;$i<999;$i++){
		echo '<script type="text/javascript">
		function showContent'.$i.'() {
			element = document.getElementById("content'.$i.'");
		check = document.getElementById("check");
        if (check.checked) {
            element.style.display="block";
        }
        else {
            element.style.display="none";
        }
    }
    </script>';
	}?><br/>

<?	



   body();?> <div id="page-wrapper">



        <div class="row">

          <div class="col-lg-10">

            <h1>Panel de Control <small>Administrador</small></h1>

            <br/>
          </div>

        </div>
		<div class="row">

          <div class="col-lg-10">

            <div class="row">
<hr>

<h2 class="title-step" style="text-align: center;">Solicitud de Cotización</h2>
											<div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">

                <thead>

                  <tr>

                    <th>Codigo</th>

                    <th>Nombre</th>

                    <th>Unidades</th>

                    <th>Precio Unitario</th>

                    <th>Subtotal</th>

                    <th>Personalizado</th>
                    <th>Nota de personalización</th>

                    <th>Precio P/unit</th>

                    <th>Sub personalizado</th>

                    <th>TOTAL</th>

                    <th>Color</th>
                    <th>Descuento</th>
                    <th>Gran Total</th>

                    <th></th>

                  </tr>

                </thead>

                <tbody>

                <?

							$link=conectarse_servicios();

							$usuario=$_GET['id'];

							$fecha=$_GET['f'];

                            $hora=$_GET['h'];

							$query="Select * from cotizacion where usuario='$usuario' and estatus=2 and fecha='$fecha' and hora='$hora';";

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

                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                  <form method="post" action="agrega_pp.php">

                  <input type="hidden" name="id[]" value="<?php echo $row['idcotizacion'];?>">

                  <input type="hidden" name="usuario" value="<?php echo $usuario;?>">

                  <input type="hidden" name="fecha" value="<?php echo $fecha;?>">

                  <input type="hidden" name="hora" value="<?php echo $hora;?>">

                    <td><? echo html_entity_decode($row['codigo'], ENT_QUOTES); ?></td>

                    <td><u><a href="../detalle.php?id=<?php echo $row['id_articulo'];?>" target="_blank"><?php echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></a></u></td>

                    <td><input type="text" style="width: 50px" name="unidad[]" value="<?php echo $row['unidad'];?>"></td>

											<td><input type="text" name="precio_unitario[]" value="<?php echo ROUND($row['precio_venta'],2);?>" style="width: 50px" /></td>

											<?php 

											$precio=ROUND($row['precio_venta'],2);

											$u=$row['unidad'];

											$sub=$precio*$u;
											?>

											<td>$ <?php echo $sub;?></td>

                                            <td><input type="text" value="<?php echo $tipo;?>" name="tipo[]"/></td>
                                            <td><input type="text" value="<?php echo $notas_personalizacion;?>" name="notas[]"/></td>

                                            <td><input type="text" name="precio_per[]" value="<?php echo $row['precio_persona'];?>" style="width: 45px"></td>

                                            <?php 

											$precio_per=$row['precio_persona'];

											$u=$row['unidad'];

											$sub2=$precio_per*$u;



											?> 

                                            <td>$ <?php echo $sub2;?></td>

                                            <td><?php echo $total= $sub+$sub2;?></td>

											<td><?php echo $row['color'];?></td>
											<td><input type="checkbox" <? if ($row['descuento']==1) { echo 'checked="checked"'; } ?> name="descuento[]" id="check" onclick="showContent<?php echo $icont;?>()" value="1" /><span><div id="content<?php echo $icont;?>" style="width: 50px;<? if ($row['descuento']==1) { echo ''; }else{ echo 'display: none;';} ?>"><input type="text" name="descuento_valor[]" style="width: 50px" value="<?php echo $row['descuento_valor'];?>"></div></span></td>
											<td><input type="checkbox" name="as"></td>

											<td><a href="eliminar_coti2.php?id=<?php echo $row['idcotizacion']; ?>&us=<?php echo $usuario;?>&f=<?php echo $fecha;?>&h=<?php echo $hora;?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>
											</tr>

                  <?php
              }
							}
							?>

                            <tr><td><button class="btn btn-flat" type="submit">Actualizar</button></td></form>

                            <td><a href="../index.php?h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $usuario;?>"><button class="btn btn-flat" type="submit">Agregar Articulo</button></a></td>
                            </tr>

                </tbody>

              </table>

              <? if(mysql_num_rows($resultado) <= 0){?>

         <h1 style="text-align:center;" class="danger">No hay solicitudes de cotizacion por el momento</h1>

         <?php }?>

            </div>
            <a href="ver_reporte.php?us=<?php echo $usuario;?>&f=<?php echo $fecha;?>&h=<?php echo $hora;?>"><button class="btn btn-flat" type="submit">Personalizar Cotización</button>

											</div>

										</div>

									</div>

								</div>
					<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
					<script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>
					<script type="text/javascript">

<?php footer(); ?>