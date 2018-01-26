

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
	}else{
		$opcion=$_GET["opc"];
	}

	$user=$_SESSION['admin_user'];

	if($opcion=='UPD'){

		$idreg=intval($_GET["id"]);
		$query="SELECT destinatario,empresa,contacto_empresa,email,celular,nota,nombres,apellidos,extension,telefono_empresa,mayoreo from clientes where id_clientes='$idreg' limit 1";
		$resultado=mysql_query($query, $link);



		if(mysql_num_rows($resultado)>0){



			$row = mysql_fetch_row($resultado);



			$empresa = $row[1];

            $contacto_empresa = $row[2];

            $email_empresa = $row[3];

            $celular_empresa = $row[4];

            $destinatario = $row[0];
            $nota = $row[5];
            $nombres = $row[6];
            $apellidos=$row[7];
            $extension = $row[8];
            $telefono_empresa = $row[9];
            $mayoreo=$row[10];

		}

	}

	else{



		if($opcion=='SAVE'){



			$idreg=intval($_POST["id"]);



			$empresa = strtoupper($_POST['empresa']);

            $contacto_empresa = strtoupper($_POST['contacto_empresa']);

            $email_empresa = $_POST['email_empresa'];

            $celular_empresa = $_POST['celular_empresa'];
            $nombres = strtoupper($_POST['nombres']);
            $apellidos = strtoupper($_POST['apellidos']);

            $destinatario = $nombres.' '.$apellidos;
            $nota = strtoupper($_POST['nota']);
            $telefono_empresa=$_POST['telefono_empresa'];
            $extension = $_POST['extension'];
            $mayoreo = $_POST['mayoreo'];

			

			$urlfile=$HTTP_POST_FILES["filefoto"];

			$target_path = "../banners/";

            $target_path = $target_path . basename( $_FILES['filefoto']['name']);



			if(!empty($_FILES['filefoto']['name'])){



				if(move_uploaded_file($_FILES['filefoto']['tmp_name'], $target_path)) {

				

					$foto=$_FILES['filefoto']['name'];



					mysql_query("BEGIN");



					if($idreg!=0){

						//echo $foto;

						 $tranx="update clientes set destinatario='$destinatario',empresa='$empresa',contacto_empresa='$contacto_empresa',email='$email_empresa',celular='$celular_empresa',nota='$nota',nombres='$nombres',apellidos='$apellidos',telefono_empresa='$telefono_empresa',extension='$extension',mayoreo='$mayoreo' where id_clientes =$idreg";

						$ca = 'MODIFICAR NOTIFICACIÓN';



						$rtranx=mysql_query($tranx, $link);



					}



					else{



						$tranx="insert into clientes(destinatario,empresa,contacto_empresa,email,celular,nota,nombres,apellidos,telefono_empresa,extension,mayoreo) values('$destinatario','$empresa','$contacto_empresa','$email_empresa','$celular_empresa','$nota','$nombres','$apellidos','$telefono_empresa','$extension','$mayoreo');";



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



					 $tranx="update clientes set destinatario='$destinatario',empresa='$empresa',contacto_empresa='$contacto_empresa',email='$email_empresa',celular='$celular_empresa',nota='$nota',nombres='$nombres',apellidos='$apellidos',telefono_empresa='$telefono_empresa',extension='$extension',mayoreo='$mayoreo' where id_clientes =$idreg";

					 $tranx_registro = "update registro set mayoreo='$mayoreo' where nombres='$nombres' and apellidos='$apellidos' and email='$email_empresa'";
					 $rtranx_registro=mysql_query($tranx_registro, $link);



					$ca = 'MODIFICAR NOTIFiCACIÓN';



					$rtranx=mysql_query($tranx, $link);



					$foto=Formatear($_POST["hiurl"]);



					$error1 = mysql_error(); //Bitácora



					$query1 = $tranx; //Bitácora



				}else{



					$tranx="insert into clientes(destinatario,empresa,contacto_empresa,email,celular,created_by,created_date,nota,nombres,apellidos,telefono_empresa,extension,mayoreo) values('$destinatario','$empresa','$contacto_empresa','$email_empresa','$celular_empresa','$user',NOW(),'$nota','$nombres','$apellidos','$telefono_empresa','$extension','$mayoreo');";



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



	if($("#destinatario").val() == ''){



		msgError = msgError + "- Destinatario .\n";



	}

	if($("#empresa").val() == ''){



		msgError = msgError + "- Empresa .\n";



	}

	if($("#email_empresa").val() == ''){



		msgError = msgError + "- Email del Contacto .\n";



	}

	if($("#celular_empresa").val() == ''){



		msgError = msgError + "- Celular del Contacto .\n";



	}

	if($("#contacto_empresa").val() == ''){



		msgError = msgError + "- Nombre del Contacto .\n";



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

  	          <div class="col-md-6"><h2>Nuevo Cliente</h2></div>

              </div>

              <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="niceform">



	<fieldset>



	<? if(isset($estatus) && $estatus == "OK" && $user!='admin'){ ?>



	<div id="msgContainer" class="saved">Se ha guardado correctamente la 



informaci&oacute;n. <a href="filtro_clientes.php" onClick="actualizarLista();">Ver lista 



Actualizada.</a></div>



	<? }

	if(isset($estatus) && $estatus == "OK" && $user=='admin'){ ?>



	<div id="msgContainer" class="saved">Se ha guardado correctamente la 



informaci&oacute;n. <a href="filtro_clientess.php" onClick="actualizarLista();">Ver lista 



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

    	

        	

        <tr><td>Cliente: </td><td><input type="text" placeholder="Nombres" name="nombres" id="dstinatario" value="<?php echo $nombres;?>" style="width: 50%" class="form-control" ><input type="text" name="apellidos" id="dstinatario" value="<?php echo $apellidos;?>" placeholder="Apellidos" style="width: 50%;margin-top: -34px;margin-left: 50%;" class="form-control" ></td></tr>



                            <tr><td>Empresa: </td><td><input type="text" name="empresa" id="epresa" value="<?php echo $empresa;?>"  style="width: 100%" class="form-control" ></td></tr>

                            <tr><td>Puesto: </td><td><input type="text" name="contacto_empresa" id="cotacto_empresa" value="<?php echo $contacto_empresa;?>"  style="width: 100%" class="form-control" ></td></tr>

                            <tr><td>Email: </td><td><input type="email" name="email_empresa" id="email_mpresa" value="<?php echo $email_empresa;?>"  style="width: 100%" class="form-control" ></td></tr>
                            <tr><td>Telefono fijo: </td><td><input type="text" name="telefono_empresa" id="cellar_empresa" value="<?php echo $telefono_empresa;?>" style="width: 70%" class="form-control" ><input type="text" name="extension" id="cellar_empresa" value="<?php echo $extension;?>" style="width: 20%;margin-top: -34px;margin-left: 75%;" class="form-control" placeholder='Extención' ></td></tr>

                            <tr><td>Celular: </td><td><input type="text" name="celular_empresa" id="cellar_empresa" value="<?php echo $celular_empresa;?>" style="width: 100%" class="form-control" ></td></tr>
                            <tr><td>Nota: </td><td><textarea name="nota" class="form-control"><?php echo $nota;?></textarea></td></tr>
                            <tr><td>Descuento por mayoreo</td><td><input type="number" min="0" max="99" value="<?php echo $mayoreo;?>" name="mayoreo" class="form-control"></td></tr>

        

        

    </table>

    </div>

   </fieldset>

                <?php if($opcion=="UPD"){?>

   

    <div class="modal-footer">

                    <a href="filtro_clientes.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>

                </div>

                <?php } ?>

                <?php if($opcion!="UPD" && $user=='admin'){?>

    <div class="modal-footer">

                    <a href="filtro_clientes.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>

                </div>

                <?php } ?>

                <?php if($opcion!="UPD" && $user!='admin'){?>

    <div class="modal-footer">

                    <a href="filtro_clientes.php" onclick="return confirmar('¿Est&aacute; seguro que desea salir,no se guardara el registro?')"><button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button></a>

                    <button type="button" class="btn btn-primary" name="guardar" id="guardar" value="Guardar" onclick="admRegistroupd(this.form.value);">Guardar</button>

                </div>

                <?php } ?>

    </form>



               

        </div>

        </div>

        </div>

              

    

<?php footer(); ?>

    