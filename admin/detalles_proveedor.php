
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
	
    function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=10;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}
$codigo=generaPass();
 //echo $v;   
	$link=conectarse();

	

	if($_POST && !empty($_POST["opc"])){

		$opcion=$_POST["opc"];

	}

	else{

		$opcion=$_GET["opc"];

	}
	$user=$_SESSION['admin_user'];


$nombre='';
$codigo=generaPass();

	
	if($opcion=='UPD'){

		$idreg=intval($_GET["id"]);

		$query="SELECT nombre,codigo,estatus,proveedor_nombre,proveedor_telefono,proveedor_direccion,proveedor_contacto,proveedor_email,proveedor_web,proveedor_cliente FROM proveedores where id_proveedor='$idreg' limit 1";

		$resultado=mysql_query($query, $link);

		if(mysql_num_rows($resultado)>0){

			$row = mysql_fetch_row($resultado);

			$titulo = Sanitize($row[0], 'hlSafest'); 

			$codigo = $row[1];
			
			$publicar = $row[2] ;
			$proveedor_nombre = $row[3];
			$proveedor_telefono = $row[4];
			$proveedor_direccion = $row[5];
			$proveedor_contacto = $row[6];
			$proveedor_email = $row[7];
			$proveedor_web = $row[8];
			$proveedor_cliente = $row[9];	

		}

	}

	else{

		if($opcion=='SAVE'){

			$idreg=intval($_POST["id"]);

			$titulo = htmlentities(Formatear($_POST["nombre"])); 

			$codigo=$_POST['codigo'];

			$publicar=0;

			if ($_POST["publicar"]=='on'){

				$publicar=1;

			}
			$proveedor_nombre = $_POST['proveedor_nombre'];
			$proveedor_telefono = $_POST['proveedor_telefono'];
			$proveedor_direccion = $_POST['proveedor_direccion'];
			$proveedor_contacto = $_POST['proveedor_contacto'];
			$proveedor_email = $_POST['proveedor_email'];
			$proveedor_web = $_POST['proveedor_web'];
			$proveedor_cliente = $_POST['proveedor_cliente'];
			
			$urlfile=$HTTP_POST_FILES["filefoto"];
			$target_path = "../banners/";
            $target_path = $target_path . basename( $_FILES['filefoto']['name']);

			if(!empty($_FILES['filefoto']['name'])){

				if(move_uploaded_file($_FILES['filefoto']['tmp_name'], $target_path)) {
				

					$foto=$_FILES['filefoto']['name'];

					mysql_query("BEGIN");

					if($idreg!=0){
						//echo $foto;

						 $tranx="update proveedores set nombre='$titulo',estatus='$publicar',proveedor_nombre='$proveedor_nombre',proveedor_telefono='$proveedor_telefono',proveedor_direccion='$proveedor_direccion',proveedor_contacto='$proveedor_contacto',proveedor_email='$proveedor_email',proveedor_web='$proveedor_web',proveedor_cliente='$proveedor_cliente' where id_proveedor=$idreg";

						$ca = 'MODIFICAR NOTIFICACIÓN';

						$rtranx=mysql_query($tranx, $link);

					}

					else{

						$tranx="insert into proveedores (nombre,codigo,estatus,proveedor_nombre,proveedor_telefono,proveedor_direccion,proveedor_contacto,proveedor_email,proveedor_web,proveedor_cliente)  values('$titulo', '$codigo',$publicar,'$proveedor_nombre','$proveedor_telefono','$proveedor_direccion','$proveedor_contacto','$proveedor_email','$proveedor_web','$proveedor_cliente')";

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

					 $tranx="update proveedores set nombre='$titulo',estatus='$publicar',proveedor_nombre='$proveedor_nombre',proveedor_telefono='$proveedor_telefono',proveedor_direccion='$proveedor_direccion',proveedor_contacto='$proveedor_contacto',proveedor_email='$proveedor_email',proveedor_web='$proveedor_web',proveedor_cliente='$proveedor_cliente' where id_proveedor=$idreg";

								

					$ca = 'MODIFICAR NOTIFiCACIÓN';

					$rtranx=mysql_query($tranx, $link);

					$foto=Formatear($_POST["hiurl"]);

					$error1 = mysql_error(); //Bitácora

					$query1 = $tranx; //Bitácora

				}else{

					$tranx="insert into proveedores (nombre,codigo,estatus,proveedor_nombre,proveedor_telefono,proveedor_direccion,proveedor_contacto,proveedor_email,proveedor_web,proveedor_cliente)  values('$titulo', '$codigo',$publicar,'$proveedor_nombre','$proveedor_telefono','$proveedor_direccion','$proveedor_contacto','$proveedor_email','$proveedor_web','$proveedor_cliente')";

						  

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

	if($("#nombre").val() == ''){

		msgError = msgError + "- Titulo .\n";

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
  	          <div class="col-md-6"><h2>Detalles Proveedor</h2></div>
              </div>
              <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="niceform">

	<fieldset>

	<? if(isset($estatus) && $estatus == "OK" && $user!='admin'){ ?>

	<div id="msgContainer" class="saved">Se ha guardado correctamente la 

informaci&oacute;n. <a href="filtro_proveedores.php" onClick="actualizarLista();">Ver lista 

Actualizada.</a></div>

	<? }
	if(isset($estatus) && $estatus == "OK" && $user=='admin'){ ?>

	<div id="msgContainer" class="saved">Se ha guardado correctamente la 

informaci&oacute;n. <a href="filtro_proveedores.php" onClick="actualizarLista();">Ver lista 

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
    
        <?php $busca = explode(',', $permiso); if (in_array(99,$busca)==TRUE) {  ?>
        <tr>
        	<td><label>Nombre del Proveedor</label></td>
        	<td><input class="form-control" placeholder="Nombre del Proveedor" type="text"  name="proveedor_nombre" value="<?php echo $proveedor_nombre; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Telefono</label></td>
        	<td><input class="form-control" placeholder="Telefono del Proveedor" type="text" name="proveedor_telefono" value="<?php echo $proveedor_telefono; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Dirección</label></td>
        	<td><input class="form-control" placeholder="Dirección del Proveedor" type="text" name="proveedor_direccion" value="<?php echo $proveedor_direccion; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Nombre del Contacto</label></td>
        	<td><input class="form-control" placeholder="Contacto del Proveedor" type="text" name="proveedor_contacto" value="<?php echo $proveedor_contacto; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Email del Contacto</label></td>
        	<td><input class="form-control" placeholder="Email del Contacto" type="text" name="proveedor_email" value="<?php echo $proveedor_email; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Sitio Web</label></td>
        	<td><input class="form-control" placeholder="Sitio Web Proveedor" type="text" name="proveedor_web" value="<?php echo $proveedor_web; ?>"/></td>
        </tr>
        <tr>
        	<td><label>Numero de Cliente</label></td>
        	<td><input class="form-control" placeholder="Numero de Cliente" type="text" name="proveedor_cliente" value="<?php echo $proveedor_cliente; ?>"/></td>
        </tr>
        <?php }?>
        
        
    </table>
    </div>
   </fieldset>
                <?php if($opcion=="UPD"){?>
   
    <div class="modal-footer">
                    <a href="filtro_proveedores.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>
                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>
                </div>
                <?php } ?>
                <?php if($opcion!="UPD" && $user=='admin'){?>
    <div class="modal-footer">
                    <a href="filtro_proveedores.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>
                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>
                </div>
                <?php } ?>
                <?php if($opcion!="UPD" && $user!='admin'){?>
    <div class="modal-footer">
                    <a href="filtro_proveedores.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>
                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>
                </div>
                <?php } ?>
    </form>

               
        </div>
        </div>
        </div>
              
    
<?php footer(); ?>
    