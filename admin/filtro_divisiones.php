<?php
error_reporting();
include_once("lib/template.php");

	$membership = new loginActions();
	$membership->confirm_Member2();

//	include_once("librerias/rutas.php");
cabezal(); 
?>



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
    if (confirm('¿Está seguro de querer eliminar esta categoria?')){
       document.v.submit() 
    } 
} 
function confirmar ( mensaje ) { 
return confirm( mensaje ); 
} 
</script>
<?php
   body();?>
   <div id="page-wrapper">
        <div class="row">
          <div class="col-sm-8 col-md-6 col-lg-12 col-xs-14">
            <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE DIVISIONES</h2>
          </div>
        </div>
		<div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-14">
            <div class="row">
  	          <div class="col-sm-8 col-md-6 col-lg-2 col-xs-6"><h1>Divisiones</h1></div>
              <div class="col-sm-4 col-md-6 col-lg-10 col-xs-2" align="right"><h2><a href="admin.si.divisiones.php?opc=ADD&id=0" class="btn btn-success">Agregar Division</a></h2></div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                  	<th style="background-color: #0A0145;color: #ffffff;"></th>
                    <th style="background-color: #0A0145;color: #ffffff;">Categoria</th>
                    <th style="background-color: #0A0145;color: #ffffff;"></th>
                    <th style="background-color: #0A0145;color: #ffffff;">Publicado</th>
                    <th style="background-color: #0A0145;color: #ffffff;"></th>
                    <th style="background-color: #0A0145;color: #ffffff;"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
							$link=conectarse_servicios();
							$query="SELECT * FROM divisiones order by division_orden asc;";
							$resultado=mysql_query($query, $link);
							//echo $resultado;
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
									if($row['division_estatus']==1){
										$imagen='publicado.gif';
									}
									if($imagen=='no_publicado.gif'){
										$class='danger';
									}
									if($row['link'] == 0){
										$pal = 'Desactivar';
									}else{
										$pal = 'Activar';
									}
								?>
                  <form action="agregar_orden_mega.php" method="post">
                  <input type="hidden" name="idcat[]" value="<?php echo $row['division_id'];?>">
                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                    <td style="width: 10px"><a href="admin.si.divisiones.php?<? echo "id=".$row['division_id']."&opc=UPD"; ?>&rowId=row<? echo $icont; ?>"><img src="img/editar.gif" border="0"/><? echo $row['orden']; ?></a></td>
                    <td ><a href="../divisiones/<?php echo $row['division_imagen']?>" target="_blank" border="0" /><? echo html_entity_decode($row['division_nombre'], ENT_QUOTES); ?></a></td>                    <!--<td><img src="../categorias/<?php echo $row['imagen']?>" border="0" /></td>-->

                    <td><a href="desactivar_link.php?link=<?php echo $row['link'];?>&id=<?php echo $row['division_id']; ?>"><?php echo $pal;?> link</td>
                    <td style="width: 10px"><img src="img/<? echo $imagen; ?>" border="0" /></td>
                    <td style="width: 10px"><input  type="number" min="00" max="9999" name="orden[]" value="<?php echo $row['division_orden'];?>" style="width: 45px !important" size="5"></td>
                    <td style="width: 10px"><a href="eliminar_division.php?id=<?php echo $row['division_id']; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>
                  </tr>
                  <? }
							}
							?>
							<td><button type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Guardar">Actualizar Orden</button></td>
							</form>
                </tbody>
              </table>
              <? if(mysql_num_rows($resultado) <= 0){?>
         <h1 style="text-align:center;" class="danger">No hay Divisiones capturadas por el momento</h1>
         <?php }?>
            </div>
          </div>
         </div>
        </div>
					<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
					<script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>
<?php footer(); ?>