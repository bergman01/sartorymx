

<?php

error_reporting(0);
	require_once 'lib/login.action.php';
	$membership = new loginActions();
	$membership->confirm_Member2(); 
	include_once("lib/template.php");
	include_once("lib/files.admin.php");
  //include_once("lib/util.php");
	//include_once("lib/sql.injection.php");
	include_once("lib/sanitize/sanitize.php");


function porcentaje($venta,$porciento,$decimales){

return number_format($venta*$porciento/100 ,$decimales);
}
	$link=conectarse();
	$ruta_files='../articulos/';	



	if($_POST && !empty($_POST["opc"])){
		$opcion=$_POST["opc"];



	}
	else{

		$opcion=$_GET["opc"];
	}

	$user=$_SESSION['admin_user'];



	$titulo='';
	$categoria='';
	$producto='';
	$venta='';
	$proveedor='';
	$publicar='';
	$foto='';
	$utilidad = 30;
	$idreg=0;

	if($opcion=='UPD'){



		$idreg=intval($_GET["id"]);
		$query="SELECT codigo,categoria,nombre,precio_venta,id_proveedor,imagen,estatus,descripcion,personalizado,tags,costos,utilidad,agotado,existencia,showroom,mega_categoria FROM articulos where id_articulo=$idreg limit 1";
		$resultado=mysql_query($query, $link);
		if(mysql_num_rows($resultado)>0){



			$row = mysql_fetch_row($resultado);
			$titulo = Sanitize($row[0], 'hlSafest'); 
			$categoria = Sanitize($row[1], 'hlSafest');
			$producto = Sanitize($row[2],'hlSafest');
			$venta = Sanitize($row[3],'hlSafest');
			$proveedor = Sanitize($row[4],'hlSafest');
			$foto = $row[5];
    		$publicar = $row[6] ;
			$descripcion = Sanitize($row[7],'hlSafest');
			$tipo = $row[8];
			$tags=$row[9];
			$costo=$row[10];
			$utilidad =$row[11];
			$agotado =$row[12];
			$existencia = $row[13];
			$showroom = $row[14];
			$mega_categoria = $row[15];
		}
	}else{
		if($opcion=='SAVE'){
			$idreg=intval($_POST["id"]);
			$titulo = htmlentities(Formatear($_POST["titulo"]));
			$categoria = implode(',',$_POST["categoria"]);
			$producto = htmlentities(Formatear($_POST["producto"]));
			$venta = htmlentities(Formatear($_POST["venta"]));
			$proveedor = htmlentities(Formatear($_POST["proveedor"]));
			$descripcion = htmlentities(Formatear($_POST['descripcion']));
			$tipo=implode(',',$_POST['tipo']);
			$tag=implode(',',$_POST['tags']);
			$costo = htmlentities(Formatear($_POST['costo']));
			$utilidad = htmlentities(Formatear($_POST['utilidad']));

			if($venta != '0'){
				$costos=porcentaje($venta,$utilidad,2);
				$costo = $venta - $costos;
			}

			if($costo != ''){
				$ppv=100-$utilidad;
				$ppv='.'.$ppv;
				$venta=$costo / $ppv;
			}
			$publicar=0;
			$agotado=0;
			$showroom=0;
			$existencia = htmlentities(Formatear($_POST['existencia']));



			if ($_POST["publicar"]=='on'){



				$publicar=1;



			}
			if($_POST["agotado"]=='on'){
				$agotado=1;
			}
			if($_POST["showroom"]=='on'){
				$showroom=1;
			}
			$mega_categoria = implode(',',$_POST["mega_categoria"]);



			$urlfile=$HTTP_POST_FILES["filefoto"];
			$target_path = "../articulos/";
            $target_path = $target_path . basename( $_FILES['filefoto']['name']);
			if(!empty($_FILES['filefoto']['name'])){
				if(move_uploaded_file($_FILES['filefoto']['tmp_name'], $target_path)) {
				
					$foto=$_FILES['filefoto']['name'];



					mysql_query("BEGIN");



					if($idreg!=0){

						//echo $foto;



						 $tranx="update articulos set codigo='$titulo',categoria='$categoria',nombre='$producto',precio_venta='$venta',id_proveedor=$proveedor,imagen='$foto',estatus='$publicar', descripcion='$descripcion',personalizado='$tipo',tags='$tag',costos='$costo',utilidad='$utilidad',agotado='$agotado',existencia='$existencia',showroom='$showroom',mega_categoria = '$mega_categoria' where id_articulo=$idreg";			



						$ca = 'MODIFICAR NOTIFICACIÓN';



						$rtranx=mysql_query($tranx, $link);



					}else{



						$tranx="insert into articulos (codigo,categoria,nombre,precio_venta,id_proveedor,fecha_creacion,imagen,estatus,descripcion,personalizado,tags,costos,utilidad,agotado,existencia,showroom,mega_categoria) values('$titulo','$categoria','$producto','$venta',$proveedor,CURDATE(),'$foto',$publicar,'$descripcion','$tipo','$tag','$costo','$utilidad',$agotado,'$existencia',$showroom,'$mega_categoria')";



						$rtranx=mysql_query($tranx, $link);



						$idreg = mysql_insert_id($link);

						



					}

					if(!$rtranx) 



					{



						mysql_query("ROLLBACK");



						//deleteFiles($ruta_files.$HTTP_POST_FILES["filefoto"]['name']);



						$estatus="ERROR";



					}else{



						mysql_query("COMMIT");



						$estatus="OK";



					}



				}else{



						$estatus="ERROR";



				}



			}else{



				mysql_query("BEGIN");



				if($idreg!=0){

					//echo $foto=$_POST["hiurl"];



					$tranx="update articulos set codigo='$titulo',categoria='$categoria',nombre='$producto',precio_venta='$venta',id_proveedor=$proveedor,estatus='$publicar', descripcion='$descripcion',personalizado='$tipo',tags='$tag',costos='$costo',utilidad='$utilidad',agotado='$agotado',existencia='$existencia',showroom='$showroom',mega_categoria='$mega_categoria' where id_articulo=$idreg";							



					$ca = 'MODIFICAR NOTIFiCACIÓN';



					$rtranx=mysql_query($tranx, $link);



					$foto=Formatear($_POST["hiurl"]);



					$error1 = mysql_error(); //Bitácora



					$query1 = $tranx; //Bitácora



				}else{



					$tranx="insert into articulos (codigo,categoria,nombre,precio_venta,id_proveedor,fecha_creacion,estatus,descripcion,personalizado,tags,costos,utilidad,agotado,existencia,showroom,mega_categoria) values('$titulo','$categoria','$producto','$venta',$proveedor,CURDATE(),$publicar,'$descripcion','$tipo','$tag','$costo','$utilidad',$agotado,'$existencia',$showroom,'$mega_categoria')";
					$ca = 'ALTA DE NOTIFICACIÓN';	  



					$rtranx=mysql_query($tranx, $link);



					$idreg = mysql_insert_id($link);



				}



				



				if(!$rtranx){



					mysql_query("ROLLBACK");



					$estatus="ERROR";



				}else{



					mysql_query("COMMIT");



					$estatus="OK";



				}



			}



		}



	}



cabezal(); ?>

<script language="javascript" src="js/datevalid.js" type="text/javascript"></script>
<script language="javascript" src="js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script language="javascript">
function confirmar ( mensaje ) { 
return confirm( mensaje ); 
} 



function admRegistroupd() { 
   extensiones_permitidas = new Array(".jpg",".png"); 
   mierror = "";
	var msgError = "";
	if($("#titulo").val() == ''){
		msgError = msgError + "- Codigo.\n";
	}

	if($("#categoria").val() == ''){
		msgError = msgError + "- Categoria.\n";
	}

	if($("#producto").val() == ''){
		msgError = msgError + "- Producto.\n";
	}

	if($("#proveedor").val() == ''){
		msgError = msgError + "- Proveedor.\n";
	}

	if(msgError != ""){
		alert("Por favor, escriba información en los siguientes campos:\n"+msgError);
		return false;
	}
	$("#opc").val("SAVE");
	$("#form").submit();
}



function admRegistro(archivo) { 

   extensiones_permitidas = new Array(".jpg",".png");
   mierror = "";
	var msgError = "";
	if($("#titulo").val() == ''){
		msgError = msgError + "- Codigo.\n";
	}

	if($("#categoria").val() == ''){
		msgError = msgError + "- Categoria.\n";
	}

	

	if($("#producto").val() == ''){
		msgError = msgError + "- Producto.\n";
	}

	if($("#proveedor").val() == ''){
		msgError = msgError + "- Proveedor.\n";
	}



	if($("#hiurl").val() == ''){
		if($("#filefoto").val() == ''){
			msgError = msgError + "- Archivo .\n";
		}
	}

	if(msgError != ""){
		alert("Por favor, escriba información en los siguientes campos:\n"+msgError);
		return false;
	}

	if (!archivo) { 

      //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 

      	mierror = "No has seleccionado ningún archivo"; 

   }else{ 

      //recupero la extensión de este nombre de archivo 

      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 

      //alert (extension); 

      //compruebo si la extensión está entre las permitidas 

      permitida = false; 

      for (var i = 0; i < extensiones_permitidas.length; i++) { 

         if (extensiones_permitidas[i] == extension) { 

         permitida = true; 

         break; 

         } 

      } 

      if (!permitida) { 

         mierror = "Comprueba la extension de los archivos a subir. \nSolo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 

      	}else{ 

         	 //submito! 

         alert ("Todo correcto...guardando  la informacion"); 

        $("#opc").val("SAVE");



	    $("#form").submit();

         return 1; 

      	} 

   } 

   //si estoy aqui es que no se ha podido submitir 

   alert (mierror); 
   return 0;
}


function actualizarLista(){
	var array_data = new Array();
	array_data[0] = $("#idRow").val();
	array_data[1] = $("#id").val();
	array_data[2] = '<? echo $titulo; ?>';
	array_data[3] = '<? echo $departamento; ?>';
	array_data[4] = '<? if ($publicar=='S'){echo 'publicado.gif';} else{echo 'no_publicado.gif';} ?>';
	array_data[5] = 'delete.gif';
	parent.parent.refreshNoticia(array_data);
}



function ocultaMensaje(){

	try{
		//$('#msgContainer').css('display','none');
		$('#msgContainer').html('&nbsp;');
		$('#msgContainer').attr('className','');

	}
	catch(error){
	}

}



$(document).ready(function(){
	$('input[type="text"]').change(ocultaMensaje);
	$('select').change(ocultaMensaje);
	$('input[type="checkbox"]').click(ocultaMensaje);
});

</script>
<script type="text/javascript" src="lib/tiny_mce/tiny_mce_src.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		elements : "txtcontenido",
		language : 'es',
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "formatselect,fontselect,fontsizeselect,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor",
		theme_advanced_buttons2 : "bold,italic,underline,strikethrough,|,cut,copy,paste,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,media,cleanup",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,advhr",
		//theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		// Example content CSS (should be your site CSS)
		content_css : "lib/tiny_mce/css/content.css",
		// Drop lists for link/image/media/template dialogs
		//template_external_list_url : "script/tiny_mce/lists/template_list.js",
		//external_link_list_url : "script/tiny_mce/lists/link_list.js",

		//external_image_list_url : "script/tiny_mce/lists/image_list.js",
		//media_external_list_url : "script/tiny_mce/lists/media_list.js",
		//template_external_list_url : "script/tiny_mce/lists/template_list.js",
		external_link_list_url : "listado.archivos.php?t=jslink",
		external_image_list_url : "listado.archivos.php?t=jsimg",
		media_external_list_url : "listado.archivos.php?t=jsmedia",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!--[if !IE]>-->
<!--<![endif]-->
<!--[if IE]>
<link href="script/niceforms/niceforms-default-ie.css" type="text/css" rel="stylesheet" />
<![endif]-->
<style>



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
ul{
  
  margin-bottom:20px;
  border-top:1px solid #ccc;
}
#li{
  line-height:1.5em;
  border-bottom:1px solid #ccc;
  float:left;
  display:inline;
}
#double li  { width:50%;} <span class="code-comment">/* 2 col */</span>
#triple li  { width:33.333%; } <span class="code-comment">/* 3 col */</span>
#quad li    { width:25%; } <span class="code-comment">/* 4 col */</span>
#six li     { width:16.666%; } <span class="code-comment">/* 6 col */</span>
</style>

<?php body(); ?>



 <div id="page-wrapper" >



        <div class="row">

          <div class="col-lg-8">

            <h1>Panel de Control <small>Administrador</small></h1>

            <br/>

          </div>

        </div>

        

            <div class="row" >

             <div class="col-lg-8">

            <div class="row">

  	          <div class="col-md-6"><h2 style="color:#FE0000">Nuevo Articulo</h2></div>

              </div>

              <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="niceform">



	<fieldset>



	<? if(isset($estatus) && $estatus == "OK" && $user!='admin'){ ?>



	<div id="msgContainer" class="saved">Se ha guardado correctamente la 



informaci&oacute;n. <a href="filtro_articulos.php" onClick="actualizarLista();">Ver lista 



Actualizada.</a></div>



	<? } 



	 if(isset($estatus) && $estatus == "OK" && $user=='admin'){ ?>



	<div id="msgContainer" class="saved">Se ha guardado correctamente la 



informaci&oacute;n. <a href="filtro_articulos.php" onClick="actualizarLista();">Ver lista 



Actualizada.</a></div>



	<? }



	   if(isset($estatus) && $estatus == "ERROR"){	?>



	<div id="msgContainer" class="error">Ocurrio un error al intentar guardar la 



informacion. Por favor Intenta de Nuevo.</div>



	<? } ?>



	<? if(!isset($estatus)){ ?><div>&nbsp;</div><? } ?>



	<input type="hidden" id="id" name="id" value="<? echo $idreg; ?>" />



	<input type="hidden" id="idRow" name="idRow" value="<? echo $_GET["rowId"]; ?>" />



	<input type="hidden" id="opc" name="opc" value="" />

    

    </br>





    <div class="table-responsive">

              <table class="table table-bordered table-hover table-striped tablesorter" align="center">

    	

        	

        <tr>

        	<td><label>Código</label></td>

            <td><input class="form-control" placeholder="Codigo del Articulo" type="text" id="titulo" name="titulo" value="<?php echo html_entity_decode($titulo, ENT_QUOTES); ?>"/></td>

        </tr>

        <tr>

        	<td><label>Mega Categoría</label></td>

            <td><ul id='double'>

   		<?php

		include_once("lib/conexion.php");

		$link=conectarse();

		

		$query="SELECT mega_categoria_id,mega_categoria_nombre FROM mega_categorias where mega_categoria_estatus = 1 order by mega_categoria_nombre asc";

		

        $resultado=mysql_query($query, $link);



		while($row=mysql_fetch_array($resultado)){



			?>

	     <li id="li"><input type="checkbox" name="mega_categoria[]" id="mega_categoria"  value="<?php echo $row[0];?>" <? $busca = explode(',', $mega_categoria); if (in_array($row[0],$busca)==TRUE) { echo 'checked="checked"'; } ?>> <?php echo html_entity_decode($row[1],ENT_QUOTES);?></li>


         <?php } ?></ul></td>

        </tr>

        <tr>

        	<td><label>Categoría</label></td>

            <td><ul id='double'>

   		<?php

		include_once("lib/conexion.php");

		$link=conectarse();

		

		$query="SELECT id_categoria,categoria FROM categorias where estatus = 1 order by categoria asc";

		

        $resultado=mysql_query($query, $link);



		while($row=mysql_fetch_array($resultado)){



			?>

	     <li id="li"><input type="checkbox" name="categoria[]" id="categoria"  value="<?php echo $row[0];?>" <? $busca = explode(',', $categoria); if (in_array($row[0],$busca)==TRUE) { echo 'checked="checked"'; } ?>> <?php echo html_entity_decode($row[1],ENT_QUOTES);?></li>


         <?php } ?></ul></td>

        </tr>

        <tr>

        	<td><label>Producto</label></td>

            <td><input class="form-control" placeholder="Producto" type="text" id="producto" name="producto" value="<?php echo html_entity_decode($producto, ENT_QUOTES); ?>"/></td>

        </tr>

        <tr>

        	<td><label>Precio de Venta</label></td>

            <td><?php echo round($venta,2); ?><input class="form-control" placeholder="Precio de Venta" type="hidden" id="venta" name="venta" value="0"/></td>

        </tr>
        <tr>

        	<td><label>Costo</label></td>

            <td><input class="form-control" placeholder="costo" type="text" id="venta" name="costo" value="<?php echo $costo; ?>"/></td>

        </tr>
        <tr>

        	<td><label>Utilidad</label></td>

            <td><select class="form-control" id="venta" name="utilidad">
            <?php
            for($i=5;$i<=100;$i+=5){ ?>
            <option value="<?php echo $i;?>" <?php if($i == $utilidad){ echo 'selected="selected"';}?>  ><?php echo $i;?></option>
            <?php }?>
                
            </select></td>

        </tr>

        <tr>

        	<td><label>Proveedor</label></td>

            <td><select class="form-control" name="proveedor" id="proveedor">

                                     <option value="">Seleccionar Proveedor</option>

   		<?php

		include_once("lib/conexion.php");

		$link=conectarse();

		

		$query="SELECT id_proveedor,nombre FROM proveedores";

		

        $resultado=mysql_query($query, $link);



		while($row=mysql_fetch_array($resultado)){



			?>

	     <option  value="<? echo html_entity_decode($row[0], ENT_QUOTES); ?>" <?php if($proveedor == $row[0]){ echo 'selected="selected"';}?>  ><?php echo html_entity_decode($row[1], ENT_QUOTES); ?></option>

         <?php } ?>

         </select></td>

        </tr>

        <tr>

        	<td>Detalle</td>

        	<td><textarea class="form-control" rows="3" id="descripcion" name="descripcion" /><?php echo html_entity_decode($descripcion, ENT_QUOTES); ?></textarea></td>

        </tr>

        <tr>

        	<td>tipo Personalización<input type="hidden" name="opcion1" value="1"> </td>

            		<td><ul>

   		<?php

		$link=conectarse();

		

		$query9="SELECT * FROM personalizacion where estatus = 1";

		

        $resultado9=mysql_query($query9, $link);



		while($row9=mysql_fetch_array($resultado9)){



			?>

	     <li><input type="checkbox" name="tipo[]"  value="<?php echo $row9[0];?>" <? $busca = explode(',', $tipo); if (in_array($row9[0],$busca)==TRUE) { echo 'checked="checked"'; } ?> <?php if($row9[0] == 3 || $row9[0] == 8 ){echo 'checked="checked"';}?> > <?php echo html_entity_decode($row9[1],ENT_QUOTES);?></li>

         <?php } ?>

         </ul></td>

        </tr>
         <tr>

        	<td>Etiquetas<input type="hidden" name="opcion1" value="1"> </td>

            		<td><ul>

   		<?php

		$link=conectarse();

		

		$query8="SELECT * FROM tags where estatus = 1";

		

        $resultado8=mysql_query($query8, $link);



		while($row8=mysql_fetch_array($resultado8)){



			?>

	     <li><input type="checkbox" name="tags[]"  value="<?php echo $row8[0];?>" <?$busca = explode(',', $tags); if (in_array($row8[0],$busca)==TRUE) { echo 'checked="checked"'; } ?>> <?php echo html_entity_decode($row8[1],ENT_QUOTES);?></li>

         <?php } ?>

         </ul></td>

        </tr>

        <tr>

        	<td><label>Archivo Relacionado</label></td>

            

            <td>

           <input class="form-control" name="filefoto" id="filefoto" type="file" size="55" accept=".jpg,.png"/></dd>



	  <? if (!empty($foto)){ ?>



		  <br /> Archivo Anexo: <img src="img/script.png" border="0" /> <? echo $foto ?> [<a href="<? echo $ruta_files.$foto ?>" target="_blank">Ver archivo</a>]



	  <? } ?>





	  <input type="hidden" id="hiurl" name="hiurl" value="<? echo $foto ?>"  /></td>

        </tr>

       

         <tr>

         <td><label>Publicar:</label></td>

            <td><input class="checkbox" name="publicar" id="publicar" type="checkbox" checked="checked" <? if ($publicar==1) { echo 'checked="checked"'; } ?>/></td>

        </tr>
        <td><label>Agotado:</label></td>

            <td><input class="checkbox" name="agotado" id="agotado" type="checkbox" <? if ($agotado==1) { echo 'checked="checked"'; } ?>/></td>

        </tr>
        <tr>
        	<td><label>Existencia</label></td>
        	<td><input class="form-control" type="text" name="existencia" value="<?php if($existencia != ''){ echo $existencia; }else{ echo 'Solicitar';}?>"></td>
        </tr>
        <tr>
        	<td><label>ShowRoom</label></td>
        	<td><input class="checkbox" type="checkbox" name="showroom" <? if ($showroom==1) { echo 'checked="checked"'; } ?>></td>
        </tr>

    </table>

    </div>

   </fieldset>

   <?php if($opcion=="UPD"){?>

   
    <div class="modal-footer">

                    <a href="filtro_articulos.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.filefoto.value);">Guardar</button>

                </div>

                <?php } ?>

                <?php if($opcion!="UPD"&& $user=='admin'){?>

    <div class="modal-footer">

                    <a href="filtro_articulos.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistro(this.form.filefoto.value);">Guardar</button>

                </div> 

                <?php } ?>

<?php if($opcion!="UPD" && $user!='admin'){?>

    <div class="modal-footer">

                    <a href="filtro_articulos.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistro(this.form.filefoto.value);">Guardar</button>

                </div>

                <?php } ?>

    </form>

    

<script language="javascript">



$("#departamento").val("<? echo $departamento; ?>");



</script>

               

        </div>

        </div>

        </div>

              

    

<?php footer(); ?>

    