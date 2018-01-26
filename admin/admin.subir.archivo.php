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

	if($_POST){

	$ruta_files='docs/';



	$target_path = "docs/";



    $target_path = $target_path . basename( $_FILES['filefoto']['name']); 



$target_path = "docs/";



$target_path = $target_path . basename( $_FILES['filefoto']['name']); 



if(move_uploaded_file($_FILES['filefoto']['tmp_name'], $target_path)) 



{ 



$estatus="OK";



}else{



$estatus="ERROR";



} 



}



cabezal(); ?>

            <script src="subir_jquery.js"></script>

<script src="subir_javascript.js"></script>

<link rel="stylesheet" type="text/css" href="subir_style.css" />

<link rel="stylesheet" type="text/css" href="pacifico.css" />





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

	if($("#titulo").val() == ''){

		msgError = msgError + "- Titulo .\n";

	}



	if($("#descripcion").val() == ''){



		msgError = msgError + "- Descripcion.\n";

	}



	if($("#departamento").val() == ''){



		msgError = msgError + "- Departamento.\n";

	}

	var dt=$("#cbmes").val()+"/"+$("#cbdia").val()+"/"+$("#cbanio").val();







	if (isDate(dt)==false){







		msgError = msgError + "- Fecha no válida.\n";



	}

	if(msgError != ""){







		alert("Por favor, escriba información en los siguientes campos:\n"+msgError);







		return false;

	}



	$("#opc").val("SAVE");

	$("#form").submit();



}



function admRegistro(archivo) { 



   extensiones_permitidas = new Array(".pdf",".docx",".pptx",".ppsx",".xlsx",".doc",".ppt",".pps",".xlx",".jpg",".png",".gif");



   mierror = "";







	var msgError = "";



		if($("#filefoto").val() == ''){



			msgError = msgError + "- Archivo .\n";



		}

	/*if($("#piefoto").val() == ''){



		msgError = msgError + "- Pie de Foto.\n";



	}*/



	// para validar la fecha mm/dd/yyyy

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







}div.saved{

	background:#99FF99;

	border-top:1px solid #339900;

	border-bottom:1px solid #339900;

}div.error{

	background:#FFCCCC;

	border-top:1px solid #FF3366;

	border-bottom:1px solid #FF3366;

}

.s-square {

	border: 0;

	margin: 0;

	padding: 0;

	width: 100%;

}

.span70 {

	margin: 0;

	min-height: 200px;

	width: 14.28571428571429%;

}

.o-line {

	background-color: #EBEBEB;

	height: 1px;

	float: left;

	margin-bottom: 20px;

	width: 100%;

}



.o-line.strong {

	background-color: #DEDEDE;

	height: 2px;

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
  margin-left: 71px;
  white-space: nowrap;

}

#double li  { width:21.5%;} <span class="code-comment">/* 2 col */</span>

#triple li  { width:33.333%; } <span class="code-comment">/* 3 col */</span>

#quad li    { width:25%; } <span class="code-comment">/* 4 col */</span>

#six li     { width:16.666%; } <span class="code-comment">/* 6 col */</span>

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>

        	$(document).ready(function(){

				$("#frmArchivo").submit(function(){

      				     				

      				var datos = new FormData();

      				datos.append('archivo',$('#archivo')[0].files[0]);

									

      				$.ajax({

      					type:"post",

      					dataType:"json",

      					url:"importar_articulos.php",      					

      					contentType:false,

						data:datos,

						processData:false,

						cache:false

      				}).done(function(respuesta){      					

      					alert(respuesta.mensaje);      					

      				});

      				return false;

      			});

      		});



      		$(document).ready(function(){

				$("#frmprecios").submit(function(){

      				     				

      				var datos = new FormData();

      				datos.append('archivo',$('#archivo')[0].files[0]);

									

      				$.ajax({

      					type:"post",

      					dataType:"json",

      					url:"importar_precios.php",      					

      					contentType:false,

						data:datos,

						processData:false,

						cache:false

      				}).done(function(respuesta){      					

      					alert(respuesta.mensaje);      					

      				});

      				return false;

      			});

      		});



      		$(document).ready(function(){

				$("#frmimagen").submit(function(){

      				     				

      				var datos = new FormData();

      				datos.append('archivo',$('#archivo')[0].files[0]);

									

      				$.ajax({

      					type:"post",

      					dataType:"json",

      					url:"importar_imagen.php",      					

      					contentType:false,

						data:datos,

						processData:false,

						cache:false

      				}).done(function(respuesta){      					

      					alert(respuesta.mensaje);      					

      				});

      				return false;

      			});

      		});

        </script>   



<?php body(); ?>

 <div id="page-wrapper" >

            <div class="row" >

             <div class="col-sm-8 col-md-9 col-lg-12 col-xs-12">

            <div class="row">

  	         <form action="" method="post"> 

             <h2>Generador de Cat&aacutelogos PDF</h2>

             <table class="table table-bordered table-hover table-striped tablesorter">

            	<tr>



            		<td><strong>Categoria</strong><ul id='double'>



      <?php



    include_once("lib/conexion.php");



    $link=conectarse();



    



    $query="SELECT id_categoria,categoria FROM categorias where estatus = 1 order by categoria asc";

        $resultado=mysql_query($query, $link);

    while($row=mysql_fetch_array($resultado)){

      ?>



       <li id="li"><input type="checkbox" name="categoria[]" id="categoria"  value="<?php echo $row[0];?>" <? $busca = explode(',', $categoria); if (in_array($row[0],$busca)==TRUE) { echo 'checked="checked"'; } ?>> <?php echo html_entity_decode($row[1],ENT_QUOTES);?></li>



         <?php } ?></ul></td></tr>

         <tr><td><strong>Proveedor  </strong><ul id='double'>



      <?php



    include_once("lib/conexion.php");



    $link=conectarse();



    



    $query="SELECT id_proveedor,nombre FROM proveedores where estatus = 1 order by nombre asc";

        $resultado=mysql_query($query, $link);

    while($row=mysql_fetch_array($resultado)){

      ?>



       <li id="li"><input type="checkbox" name="proveedor[]" id="categoria"  value="<?php echo $row[0];?>" <? $busca = explode(',', $categoria); if (in_array($row[0],$busca)==TRUE) { echo 'checked="checked"'; } ?>> <?php echo html_entity_decode($row[1],ENT_QUOTES);?></li>



         <?php } ?></ul></td></tr>

         <tr><td><strong>Ordenar por:  </strong><select name="ordenar" class="form-control">



      <option value="0">-- Seleccionar --</option>



        <option value="1">Nombre del producto</option>



    <option value="2">Menor a Mayor Precio</option>



    <option value="3">Mayor a Menor Precio</option>

    <option value="4">codigo y Precio Menor</option>

    <option value="5">codigo y Nombre</option>



  </select></td></tr>

         <tr><td><br/><input type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Generar PDF"></td>

            	</tr>

            </table>

            </form>

        </div>

        </div>

        </div>

        <?php if($_POST){?>

        <input type="button" value="Imprimir" onclick="javascript:imprSelec('muestra')" class="btn btn-primary"  />

<div id="muestra">

<link rel="stylesheet" type="text/css" href="contenido.css" media="print" /> 

<style type="text/css">



    ul.col3 

{ 

padding-right: : 0px !important; 

padding-left: : 0px !important; 

float: left !important; 

padding-bottom: : 0px !important; 

margin: : 15px 0px !important; 

width: : 100% !important; 

padding-top: : 0px !important; 

list-style-type: : none  !important;

} 



ul.col3 li 

{ 

padding-right: : 2px !important; 

display: : inline !important; 

padding-left: : 2px !important; 

float: : left !important; 

padding-bottom: 2px !important; 

width: : 30% !important; 

padding-top: : 2px  !important;

}

table.centrada { 



margin-right:auto; 



margin-left:auto; 



} 



</style>

<?php

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacutebado");



$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");



$fex="<br\><br\><br\><br\><br\>M&eacute;rida, Yucat&aacute;n a ".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

?>

<table class="centrada">



    <tr>



        <td></td>



        <td colspan="3" style="text-align: center;"><img src="img/LOGO_SARTORY.png" width="50%" heigth="50%" alt="Logo sartory"  title="Sartory | Promocionales"/><br/><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><?php echo '<br/><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\>'.$fex;?></td>



    </tr>



    </table>

<br/><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\>

    <table class="centrada" ><tr>



    



                            

                            <?php

                            include_once("lib/conexion.php"); 



                            $link=conectarse();



                            $categoria = implode(',',$_POST["categoria"]);



                            $etiqueta= $_POST['etiqueta'];



                            $proveedor=implode(',',$_POST["proveedor"]);

                            $ordenar = $_POST['ordenar'];

                            if($ordenar == 0){

                              $orden='order by nombre asc';

                            }

                            if($ordenar == 1){

                              $orden='order by nombre asc';

                            }

                            if($ordenar == 2){

                              $orden='order by ROUND(precio_venta,2) asc';                              

                            }

                            if($ordenar == 3){

                              $orden='order by ROUND(precio_venta,2) desc';                              

                            }

                            if($ordenar == 4){

                              $orden='order by codigo asc,round(precio_venta,2) asc';                              

                            }

                            if($ordenar == 5){

                              $orden='order by codigo asc,nombre asc';                              

                            }



                            



                            //$proveedor=1;



                            if($categoria != ''){

                            $query="Select * from articulos where categoria in (".$categoria.") and estatus=1 ".$orden.";";

                        }

                        if($proveedor != ''){

                             $query="Select * from articulos where id_proveedor in (".$proveedor.") and estatus=1 ".$orden.";";

                        }

                        if($categoria != '' && $proveedor != ''){

                             $query="Select * from articulos where categoria in(".$categoria.") and id_proveedor in(".$proveedor.") and estatus=1 ".$orden.";";

                        }

                            //$query="Select * from cotizacion where usuario='$usuario' and estatus=2 and fecha='$fecha';";



                           $resultado=mysql_query($query, $link);

                           $columna=1;



            while($row=mysql_fetch_array($resultado)){



                $id_articulo=$row['id_articulo'];



                $unidad=$row['unidad'];



                $color=$row['color'];



                $nombre=html_entity_decode($row['nombre'],ENT_QUOTES);



                $codigo=$row['codigo'];



                $precio_venta=$row['precio_venta'];



                $personalizacion=utf8_decode($row['persona']);



                $precio_persona=$row['precio_persona'];

                $nota_personalizacion = $row['notas_personalizacion'];

                $imagen=$row['imagen'];

                if ($columna<=3) // Si es la primer columna abro una fila 

   { ?>

      

      <td style="text-align: center;">

            <img src="../articulos/<?php echo $imagen;?>" height="150" width="150"><br/>

            <h6><?php echo $nombre;?><br/>

            <?php echo $codigo;?><br/><span style="color: #FE0000">$<?php echo round($precio_venta,2);?></span></h6>

            </td>

      <?php $columna++;  // Incremento el contador 

   } 



            ?> <?php if ($columna==4) // Si es diferente a 1 es porque ya despleguó la 2da columna 

   { ?></tr>

       

      <?php $columna=1;   // Vuelvo al valor original el contador 

   } }

                                                    ?></table>

                                                    <table class="centrada"><tr><td colspan="3" style="text-align: center;"><h4>* PRECIOS ANTES DE IVA SIN PERSONALIZAR</h4></td></tr></table>

                                                    <table class="centrada"><tr><td class="centrada"><div aling="center"><img src="img/pie.png" style="text-align:center;width: 635px"/></div></td></tr></table></div>

<script type="text/javascript">

function imprSelec(muestra)

{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');

ventimp.document.write(ficha.innerHTML);

ventimp.document.close();ventimp.print();ventimp.close();}

</script><?php }?>

            </div>

            </div>

        </div>







              



    



<?php footer(); ?>



    