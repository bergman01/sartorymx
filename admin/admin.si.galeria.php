<?php

error_reporting(0);

	require_once 'lib/login.action.php';

	$membership = new loginActions();

	$membership->confirm_Member2(); 

	include_once("lib/template.php");

	include_once("lib/files.admin.php");

	include_once("lib/sanitize/sanitize.php");
$link=conectarse();
	

//$ruta_files='../galeria/';
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
	}if($("#producto").val() == ''){
		msgError = msgError + "- Producto.\n";
	}
	if($("#proveedor").val() == ''){
		msgError = msgError + "- Proveedor.\n";
	}if(msgError != ""){
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

  	          <div class="col-md-6"><h2 style="color:#FE0000">Archivos Galeria</h2></div>

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
	<input type="hidden" id="opc" name="opc" value="" />

    

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
        </div>
        </div>
        </div><?php footer(); ?>