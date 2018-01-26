
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
	
	$link=conectarse();

	

	if($_POST && !empty($_POST["opc"])){

		$opcion=$_POST["opc"];

	}

	else{

		$opcion=$_GET["opc"];

	}
$nombre='';
$codigo='';

	
	if($opcion=='UPD'){

		$idreg=intval($_GET["id"]);

		$query="SELECT nombre,apellido_paterno,apellido_materno,usuario,estatus,telefono,email,puesto,permisos,updated_by FROM usuarios where id='$idreg' limit 1;";

		$resultado=mysql_query($query, $link);

		if(mysql_num_rows($resultado)>0){

			$row = mysql_fetch_row($resultado);

			$nombre = Sanitize($row[0], 'hlSafest'); 

			$apellido = Sanitize($row[1], 'hlSafest');
			$apellido2  = Sanitize($row[2], 'hlSafest');
			$usuario=Sanitize($row[3], 'hlSafest'); 
			$publicar = $row[4] ;
			$telefono = Sanitize($row[5], 'hlSafest'); 
			$email = Sanitize($row[6], 'hlSafest'); 
			$puesto = Sanitize($row[7], 'hlSafest'); 
			$permisos = $row[8];
			$pass = $row[9];

		}

	}

	else{

		if($opcion=='SAVE'){

			$idreg=intval($_POST["id"]);

			$nombre = htmlentities(Formatear($_POST["nombre"]));

			$apellido = htmlentities(Formatear($_POST["apellido"]));
			$apellido2 = htmlentities(Formatear($_POST["apellido2"]));
			$usuario = htmlentities(Formatear($_POST["usuario"]));
			$pass = htmlentities(Formatear($_POST["pass"]));
			$permisos = implode(',',$_POST['permisos']);
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $puesto = $_POST['puesto'];
		
			$codigo=$_POST['codigo'];

			$publicar=0;

			if ($_POST["publicar"]=='on'){

				$publicar=1;

			}
			
			$urlfile=$HTTP_POST_FILES["filefoto"];
			$target_path = "../banners/";
            $target_path = $target_path . basename( $_FILES['filefoto']['name']);
            

			if(!empty($_FILES['filefoto']['name'])){

				if(move_uploaded_file($_FILES['filefoto']['tmp_name'], $target_path)) {
				

					$foto=$_FILES['filefoto']['name'];

					mysql_query("BEGIN");

					if($idreg!=0){
						//echo $foto;

						 $tranx="update proveedores set nombre='$titulo',estatus='$publicar'where id_proveedor=$idreg";

						$ca = 'MODIFICAR NOTIFICACIÓN';

						$rtranx=mysql_query($tranx, $link);

					}

					else{

						$tranx="insert into usuarios (nombre,apellido_paterno,apellido_materno,usuario,password,updated_by,estatus,telefono,email,puesto,permisos)  values('$nombre', '$apellido','$apellido2','$usuario',MD5('$pass'),'$pass',$publicar,'$telefono','$email','$puesto','$permisos')";

						$rtranx=mysql_query($tranx, $link);

						$idreg = mysql_insert_id($link);
						

					}
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

				}

				else{

						$estatus="ERROR";

				}

			}

			else{

				mysql_query("BEGIN");

				if($idreg!=0){
					//echo $foto=$_POST["hiurl"];

					 $tranx="update usuarios set nombre='$nombre',apellido_paterno='$apellido',apellido_materno='$apellido2',usuario='$usuario',password=MD5('$pass'),updated_by='$pass',estatus=$publicar,permisos='$permisos',telefono='$telefono',email='$email',puesto='$puesto' where id=$idreg";
                    
								

					$ca = 'MODIFICAR NOTIFiCACIÓN';

					$rtranx=mysql_query($tranx, $link);

					$foto=Formatear($_POST["hiurl"]);

					$error1 = mysql_error(); //Bitácora

					$query1 = $tranx; //Bitácora

				}else{

					$tranx="insert into usuarios (nombre,apellido_paterno,apellido_materno,usuario,password,updated_by,estatus,telefono,email,puesto,permisos)  values('$nombre', '$apellido','$apellido2','$usuario',MD5('$pass'),'$pass',$publicar,'$telefono','$email','$puesto','$permisos')";

						  

					$ca = 'ALTA DE NOTIFICACIÓN';	  

					$rtranx=mysql_query($tranx, $link);

					$idreg = mysql_insert_id($link);

				}

				

				if(!$rtranx) 

				{

					mysql_query("ROLLBACK");

					$estatus="ERROR";

				}

				else{

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
   extensiones_permitidas = new Array(".pdf"); 
   mierror = "";

	var msgError = "";

	if($("#usuario").val() == ''){

		msgError = msgError + "- Usuario .\n";

	}

	if($("#pass").val() == ''){

		msgError = msgError + "- Password .\n";

	}

	if(msgError != ""){

		alert("Por favor, escriba información en los siguientes campos:\n"+msgError);

		return false;

	}

	$("#opc").val("SAVE");

	$("#form").submit();

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
            <h2 style="color:#FE0000;padding-left: 150px">ADMINISTRADOR DE USUARIOS</h2>
            
          </div>
        </div>
        
            <div class="row" >
             <div class="col-lg-8">
            <div class="row">
  	          
              </div>
              <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="niceform">

	<fieldset>

	<? if(isset($estatus) && $estatus == "OK"){ ?>

	<div id="msgContainer" class="saved">Se ha guardado correctamente la 

informaci&oacute;n. <a href="usuarios.php" onClick="actualizarLista();">Ver lista 

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
        	<td><label>Nombres</label></td>
            <td><input required class="form-control" placeholder="Nombre" type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Apellidos Paterno</label></td>
            <td><input required  class="form-control" placeholder="Apellidos" type="text" id="apellidos" name="apellido" value="<?php echo $apellido; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Apellidos Materno</label></td>
            <td><input required  class="form-control" placeholder="Apellidos" type="text" id="apellidos" name="apellido2" value="<?php echo $apellido2; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Usuario</label></td>
            <td><input required  class="form-control" placeholder="usuario" type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Contraseña</label></td>
            <td><input required  class="form-control" placeholder="Contraseña" type="text" id="pass" name="pass" value="<?php echo $pass; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Telefono</label></td>
            <td><input required  class="form-control" placeholder="Telefono" type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Email</label></td>
            <td><input required  class="form-control" placeholder="Email" type="text" id="email" name="email" value="<?php echo $email; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Puesto</label></td>
            <td><input required  class="form-control" placeholder="Puesto" type="text" id="puesto" name="puesto" value="<?php echo $puesto; ?>"/></td>
        </tr>
        <tr>
			<td><label>Secciones:</label></td>
			<td>
			<ul>
				<li><input type="checkbox" name="permisos[]"  value="1" <? $busca = explode(',', $permisos); if (in_array(1,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Usuarios</li>
				<li><input type="checkbox" name="permisos[]"  value="2" <? $busca = explode(',', $permisos); if (in_array(2,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Artículos</li>
				<li><input type="checkbox" name="permisos[]"  value="3" <? $busca = explode(',', $permisos); if (in_array(3,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Listas de Precios</li>
				<li><input type="checkbox" name="permisos[]"  value="4" <? $busca = explode(',', $permisos); if (in_array(4,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Cotizaciones</li>
				<li><input type="checkbox" name="permisos[]"  value="5" <? $busca = explode(',', $permisos); if (in_array(5,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Banners</li>
				<li><input type="checkbox" name="permisos[]"  value="6" <? $busca = explode(',', $permisos); if (in_array(6,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Categorias</li>
				<li><input type="checkbox" name="permisos[]"  value="7" <? $busca = explode(',', $permisos); if (in_array(7,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Proveedores</li>
				<li><input type="checkbox" name="permisos[]"  value="13" <? $busca = explode(',', $permisos); if (in_array(13,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Clientes</li>
				<li><input type="checkbox" name="permisos[]"  value="8" <? $busca = explode(',', $permisos); if (in_array(8,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Catálogos PDF</li>
				<li><input type="checkbox" name="permisos[]"  value="9" <? $busca = explode(',', $permisos); if (in_array(9,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Personalización</li>
				<li><input type="checkbox" name="permisos[]"  value="10" <? $busca = explode(',', $permisos); if (in_array(10,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Tags</li>
				<li><input type="checkbox" name="permisos[]"  value="11" <? $busca = explode(',', $permisos); if (in_array(11,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Cambio Categoria</li>
				<li><input type="checkbox" name="permisos[]"  value="12" <? $busca = explode(',', $permisos); if (in_array(12,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Eliminación</li>
				<li><input type="checkbox" name="permisos[]"  value="14" <? $busca = explode(',', $permisos); if (in_array(14,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Mega Categorias</li>
				<li><input type="checkbox" name="permisos[]"  value="15" <? $busca = explode(',', $permisos); if (in_array(15,$busca)==TRUE) { echo 'checked="checked"'; } ?>>Ventas</li>
				<li><input type="checkbox" name="permisos[]"  value="16" <? $busca = explode(',', $permisos); if (in_array(16,$busca)==TRUE) { echo 'checked="checked"'; } ?>>No concretadas</li>
			</ul>
			</td>
		</tr>
        <tr>
        	<td><label>Publicar:</label></td>
            <td><input class="checkbox" name="publicar" id="publicar" type="checkbox" <? if ($publicar==1) { echo 'checked="checked"'; } ?>/></td>
        </tr> 
    </table>
    </div>
   </fieldset>
                <?php if($opcion=="UPD"){?>
   
    <div class="modal-footer">
                    <a href="usuarios.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>
                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>
                </div>
                <?php } ?>
                <?php if($opcion!="UPD"){?>
    <div class="modal-footer">
                    <a href="usuarios.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>
                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>
                </div>
                <?php } ?>
    </form>
        </div>
        </div>
        </div>
              
    
<?php footer(); ?>
    