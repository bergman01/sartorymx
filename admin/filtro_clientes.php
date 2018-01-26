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







</script>







<?php body();?>
   <div id="page-wrapper">
        <div class="row">
          <div class="col-sm-8 col-md-6 col-lg-10 col-xs-14">
           <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE CLIENTES</h2>
          </div>
        </div>
		<div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-14">
            <div class="row">
  	          <div class="col-sm-8 col-md-6 col-lg-2 col-xs-6"><h1>Clientes</h1></div>
              <div class="col-sm-4 col-md-6 col-lg-10 col-xs-2" align="right"><h2><a href="admin.si.clientes.php?opc=ADD&id=0" class="btn btn-success">Agregar cliente</a> <a href="exporta_clientes.php" class="btn btn-success">Exportar clientes</a></h2></div>
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
                  	<th style="background-color: #0A0145;color: #ffffff;">Clave</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Nombres</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Apellidos</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Empresa</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Telefono Fijo</th>
                    <th style="background-color: #0A0145;color: #ffffff;">Descuento Mayoreo</th>
                    <th style="background-color: #0A0145;color: #ffffff;"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
							$link=conectarse_servicios();
							$empresa = $_POST['empresa'];
							$nombre = $_POST['nombre'];
							$apellido = $_POST['apellido'];

							$query="SELECT * FROM clientes order by id_clientes asc;";
							if($empresa != ''){
								$query = "SELECT * from clientes where empresa like '%$empresa%' order by id_clientes asc;";
							}

							if($nombre !=''){
								$query = "SELECT * FROM clientes where nombres like '%$nombre%' order by id_clientes asc;";
							}

							if($nombre !='' && $apellido !=''){
								$query = "SELECT * from clientes where nombres like '%$nombre%' order by id_clientes asc;";
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
                    <td><a href="admin.si.clientes.php?<? echo "id=".$row['id_clientes']."&opc=UPD"; ?>&rowId=row<? echo $icont; ?>"><?php echo $row['id_clientes'];?></a></td>
                    <td><? echo html_entity_decode($row['nombres'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['apellidos'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['empresa'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['telefono_empresa'], ENT_QUOTES); ?> Ext: <? echo html_entity_decode($row['extension'], ENT_QUOTES); ?></td>
                    <td><? if($row['mayoreo'] == ''){ echo '0'; }else{echo html_entity_decode($row['mayoreo'], ENT_QUOTES).'%';} ?></td>
                    <td><a href="eliminar_clientes.php?id=<?php echo $row['id_clientes']; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>
                  </tr>
                  <?php }
							}



							?>



                </tbody>







              </table>







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