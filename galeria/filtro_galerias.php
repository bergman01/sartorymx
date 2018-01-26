<?php 
error_reporting();
include_once("lib/template.php");
	

	$membership = new loginActions();

	$membership->confirm_Member2();

$link=conectarse_servicios();

$id = $_GET['id'];
//	include_once("librerias/rutas.php");
if($_POST){
	$carpetaDestino="../galeria/";
 
    # si hay algun archivo que subir
    if($_FILES["archivo"]["name"][0])
    {
 
        //# recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
        {
 
            //# si es un formato de imagen
            if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
 
                    //# movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {
                        //echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente";
                        $foto=$_FILES['archivo']['name'][$i];
                        $id_articulo=intval($_GET['id']);

                    mysql_query("BEGIN");

                        $tranx="insert into galeria (archivo,id_articulo)  values('$foto',$id_articulo);";

                        $rtranx=mysql_query($tranx, $link);

                        $idreg = mysql_insert_id($link);

                        if(!$rtranx) 

                    {

                        mysql_query("ROLLBACK");

                        //deleteFiles($ruta_files.$HTTP_POST_FILES["filefoto"]['name']);

                        $estatus="ERROR";

                    }

                    else{

                        mysql_query("COMMIT");

                        $estatus="OK";

                    }
                    $estatus="OK";
                        

                    
                    
                    }else{
                        $estatus="ERROR";
                        $error="<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                    }
                }else{
                    $estatus="ERROR";
                    $error= "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
                $estatus="ERROR";
                $error="<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen jpg";
            }
        }
    }else{
        $estatus="ERROR";
        $error="<br>No se ha subido ninguna imagen";
    }
}

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
<?	

   body();?>
   <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-10">
           <h2 style="color:#FE0000;padding-left: 150px">ADMINISTRADOR DE GALERIAS</h2>
          </div>
        </div>



		<div class="row">
          <div class="col-lg-10">
            <div class="row">
  	          <div class="col-md-6"><h1>Galeria</h1></div>
              <div class="col-md-6" align="right"><a href="filtro_articulos.php">Regresar</a><h2><a href="admin.si.galeria.php?opc=ADD&id=<?php echo $id;?>" class="btn btn-success">Agregar Imagen Galeria</a></h2></div>
            </div>
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="niceform">
	<fieldset>
	<?php if(isset($estatus) && $estatus == "OK"){ ?>
	<div id="msgContainer" class="saved">Se ha guardado correctamente la 
informaci&oacute;n. <a href="filtro_galerias.php?id=<?php echo $_GET['id'];?>" onClick="actualizarLista();">Ver lista 
Actualizada.</a></div>
	<? }
	   if(isset($estatus) && $estatus == "ERROR"){	?>
	<div id="msgContainer" class="error">Ocurrio un error al intentar guardar la 
informacion. Por favor Intenta de Nuevo.</div>
	<? } ?>
	<? if(!isset($estatus)){ ?><div>&nbsp;</div><? } ?>
	<input type="hidden" id="id" name="id" value="<? echo $idreg; ?>" />
	<input type="hidden" id="idRow" name="idRow" value="<? echo $_GET["rowId"]; ?>" />
	<input type="hidden" id="opc" name="opc" value="ADD" />

    

    </br>    <div class="table-responsive">

              <table class="table table-bordered table-hover table-striped tablesorter" align="center">
        <tr>
        	<td><label>Archivo Relacionado</label></td>
            <td>

           <input class="form-control" name="archivo[]" id="filefoto" type="file" size="55" accept=".jpg,.png"/  multiple ></dd>
	  <? if (!empty($foto)){ ?>
		  <br /> Archivo Anexo: <img src="img/script.png" border="0" /> <? echo $foto ?> [<a href="<? echo $ruta_files.$foto ?>" target="_blank">Ver archivo</a>]
	  <? } ?>	  <input type="hidden" id="hiurl" name="hiurl" value="<? echo $foto ?>"  /></td>

        </tr>
    </table>
    </div>
   </fieldset>
   <?php if($opcion=="UPD"){?>
    <div class="modal-footer">

                    <a href="filtro_galerias.php?id=<?php echo $_GET['id'];?>" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" >Guardar</button>
                </div>
                <?php } ?>
                <?php if($opcion!="UPD"&& $user=='admin'){?>

    <div class="modal-footer">

                    <a href="ffiltro_galerias.php?id=<?php echo $_GET['id'];?>" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="sumbit" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" o>Guardar</button>
                </div>
                <?php } ?>

<?php if($opcion!="UPD" && $user!='admin'){?>
    <div class="modal-footer">

                    <a href="filtro_galerias.php?id=<?php echo $_GET['id'];?>" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>
                    <button type="sumbit" class="btn btn-primary" name="guardar" id="guardar" value="Guardar">Guardar</button>
                </div>
                <?php } ?>
    </form>

            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                  	<th style="background-color: #0A0145;color: #ffffff;"></th>
                    <th style="width: 10px;background-color: #0A0145;color: #ffffff;"></th>
                  </tr>
                </thead>
                <tbody>
                <?
							
							
							echo $query="SELECT * FROM galeria where id_articulo = $id order by id_galeria asc;";
														

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
									

									if($row['estatus']==1){

										$imagen='publicado.gif';

									}
									if($imagen=='no_publicado.gif'){
										$class='success';
									}

								?>
                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                    <td><img src="../galeria/<?php echo $row['archivo'];?>" style="width: 100px;"></td>
                    <td><a href="eliminar_galerias.php?id=<?php echo $row['id_galeria']; ?>&id_art=<?echo $id;?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>
                    
                  </tr>
                  <? }

							}

							?>
                            
                </tbody>
              </table>
              <? if(mysql_num_rows($resultado) <= 0){?>
         <h1 style="text-align:center;" class="danger">No hay galerias capturados por el momento</h1>
         <?php }?>
            </div>
          </div>
         </div>
        </div>
                   

					<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

					<script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>

					<script type="text/javascript">

						function refreshNoticia(array_data){

							if(array_data[0] == ""){

								var rows = $("#tbnotificaciones").children().find('tr');

								var numrows = rows.size();

								$("#tbnoticias").createAppend(

									'tr',{id:'row' + String(numrows)},[

										'td',{className:'new_row', align:'center', valign:'middle'},[

											'a',{href:'admin.si.departamentos.php?opc=UPD&id=' + String(array_data[1]) + '&rowId=row' + String(numrows), onclick: 'return GB_showCenter("Departamento - Editar", this.href, 550, 625);'},'<img src="imagen/editar.gif" border="0" />'

										],

													
										'td',{className:'new_row', align:'center'},array_data[2],

										'td',{className:'new_row', align:'center'},array_data[3],

										'td',{className:'new_row', align:'center'},array_data[4],
										'td',{className:'new_row', align:'center', valign:'middle'},'<img src="imagen/' + array_data[5] + '" border="0" />',
										'td',{className:'new_row', align:'center', valign:'middle'},'<img src="imagen/' + array_data[6] + '" border="0" />',
										
										

									]

								);

							}

							else{

								var row = $("#" + String(array_data[0])).children();

								row.get(0).innerHTML = '<a href="admin.si.departamentos.php?opc=UPD&id=' + String(array_data[1]) + '&rowId=' + array_data[0] + '" onclick="return GB_showCenter(\'Departamento - Detalle\', this.href, 550, 625);"><img src="imagen/editar.gif" border="0" /></a>';

								row.get(0).className = 'new_row';

								row.get(1).innerHTML = array_data[2];

								row.get(1).className = 'new_row';

								row.get(2).innerHTML = array_data[3];

								row.get(2).className = 'new_row';
								
								row.get(3).innerHTML = array_data[4];

								row.get(3).className = 'new_row';
								
								row.get(4).innerHTML = '<img src="imagen/'+array_data[5]+'" border="0" />';

								row.get(4).className = 'new_row';
								row.get(5).innerHTML = '<img src="imagen/'+array_data[6]+'" border="0" />';

								row.get(5).className = 'new_row';

							

							}

							GB_hide();

						}
						
						  

					</script>
<?php footer(); ?>