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



<?php
   body();?>
   <div id="page-wrapper">
        <div class="row">
          <div class="col-sm-8 col-md-10 col-lg-12 col-xs-12">
            <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE COTIZACIONES </h2>
                      </div>
        </div>
		<div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <div class="row">
            <div class="table-responsive">

            <form action="eliminar_multiplecotizacion.php" method="post">
            <table class="table table-bordered table-hover table-striped tablesorter">
            	<tr>
         <td style="background-color:  #ffffff !important;border: 1px solid #fff;"><input type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Eliminar Selección" onclick="return confirmar('¿Está seguro que desea eliminar la selección?')"></td>
            	</tr>
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                  	<td><input type="checkbox" id="marcar" onclick="marcar_desmarcar();" value=""></td>
                  	<th >Usuario</th>
                  	<th>Folio Cotización</th>
                    <th >Fecha de Solicitud</th>
                    <th >Motivo</th>
                    <th>Observación</th>
                    <!--<th style="width: 50px"></th>
                    <th style="width: 50px">Copiar Cotización</th>
                    <th style="width: 50px">Venta</th>-->
                    <th style="width: 50px"></th>
                  </tr>
                </thead>
                <tbody>



                <?php
							$link=conectarse_servicios();
							$actual = date('Y');
							//$query="SELECT DISTINCT usuario,fecha,estatus,hora,empresa,cotizado_por,envio,codigo_cotizacion FROM cotizacion where estatus=2 and fecha like '$actual%' order by fecha desc,hora desc;";
							$query="SELECT DISTINCT usuario,fecha,estatus,hora,empresa2,destinatario,contacto_empresa,empresa,cotizado_por,envio,codigo_cotizacion,observacion,motivo FROM cotizacion where estatus=6 order by fecha desc,hora desc;";

							$resultado=mysql_query($query, $link);
							//echo $resultado;
							$icont=0;
							$class='success';
							if(mysql_num_rows($resultado)>0){
								while($row = mysql_fetch_array($resultado)){ 
                                    $cliente=$row['empresa'];

                                    $envio=$row['envio'];
									$icont++;
									if($class=='success'){
								$class='active';
								}else{
									$class='success';
								}
									$laclase=($icont%2==0?"fila_par":"fila_impar");
									$imagen='no_publicado.gif';

									if($row['envio']==1){

										$imagen='publicado.gif';

									}

									if($row[2]==2){
										$estatus='Cotización solicitada';
									}

									if($imagen=='no_publicado.gif'){
										$class='success';
									}
								?>



                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                   <td><input type="checkbox" name="seleccion[]" value="<?php echo $row['hora']; ?>" requerit></td>
                  <td><a href="ver_cancelado.php?id=<?php echo $row['usuario'];?>&f=<?php echo $row['fecha'];?>&h=<?php echo $row['hora'];?>&cc=<?php echo $row['codigo_cotizacion'];?>"><?php echo $row['usuario'];?></a></td>
                  <td><?php echo $row['codigo_cotizacion'];?></td>
                    <td><?php echo date('d/m/y' ,strtotime($row['fecha'])).' '.$row['hora'];?> </td>
                    <?php
                    $query2="SELECT empresa FROM registro where usuario='".$row['usuario']."' ";
					$resultado2=mysql_query($query2, $link);
					while($row2 = mysql_fetch_array($resultado2)){ 
                    $cliente1=$row2[0]; 
                } 
                    if($cliente1==''){
                    $cliente1 = $cliente;
                    }

                    $query_motivo="select motivo from motivo_cancelacion where id_motivo =". $row['motivo'];
                    $res_mot=mysql_query($query_motivo,$link);
                    while($rowm = mysql_fetch_array($res_mot)){
                    $mot = $rowm[0];
                  }

                    ?>

                    <form  method="post">
                    <input type="hidden" name="hora" value="<?php echo $row['hora']; ?>"/>
                    <td><?php echo html_entity_decode($mot, ENT_QUOTES); ?></td>
                    <td><?php echo html_entity_decode($row['observacion'], ENT_QUOTES); ?></td>
                    <!--<td><input type="submit" class="btn btn-primary" onClick="this.form.action='update_coti.php';this.form.submit()" name="guardar" id="guardar" value="Guardar"/></td>-->
                    </form>
                    <!--<td><a href="copiar_cotizacion.php?codigo=<?php echo $row['codigo_cotizacion'];?>" onclick="return confirmar('¿Está seguro que desea copiar esta cotización?')"> <img src="img/report_edit.png" border="0" title="Copiar Cotización" style="cursor: pointer;">Copiar</td>
                    <td><a href="convertir_venta.php?codigo=<?php echo $row['codigo_cotizacion'];?>" onclick="return confirmar('¿Está seguro que desea convertir a venta esta cotización?')"> <img src="img/report_edit.png" border="0" title="Convertir Venta" style="cursor: pointer;">VEnta</td>-->
                    <td><a href="eliminar_cotizacion.php?id=<?php echo $row['hora']; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>
                  </tr>
                  <?php
                     }
                   }
                   ?>
                </tbody>
              </table>
              <?php if(mysql_num_rows($resultado) <= 0){?>
         <h1 style="text-align:center;" class="danger">No hay Cotizaciones capturados por el momento</h1>
         <?php }?>
         </form>
            </div>
          </div>
         </div>
        </div>
					<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
					<script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>
<?php footer(); ?>