<?php 



error_reporting();



include_once("lib/template.php");



	







	$membership = new loginActions();







	$membership->confirm_Member2();

//	include_once("librerias/rutas.php");



$link=conectarse_servicios();

if($_POST){

	$bienvenida=$_POST['bienvenida'];

	$pie=$_POST['pie'];

   $tranx="update mensaje set bienvenida='". $bienvenida."',pie='".$pie."' where id_mensaje=1;";					

   $rtranx=mysql_query($tranx, $link);

$idreg = mysql_insert_id($link);





}



	cabezal(); ?>



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



<?	







   body();?>



   <div id="page-wrapper">







        <div class="row">



          <div class="col-sm-8 col-md-6 col-lg-10 col-xs-14">



            <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE BANNERS</h2>



          </div>



        </div>















		<div class="row">



          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-14">



            <div class="row">



  	          <div class="col-sm-8 col-md-6 col-lg-2 col-xs-6"><h1>Banners</h1></div>



              <div class="col-sm-4 col-md-6 col-lg-10 col-xs-2" align="right"><h2><a href="admin.si.banners.php?opc=ADD&id=0" class="btn btn-success">Agregar Banner</a></h2></div>



            </div>



            <div class="table-responsive">



              <table class="table table-bordered table-hover table-striped tablesorter">



                <thead>



                  <tr>



                  	<th style="background-color: #0A0145;color: #ffffff;"></th>



                    <th style="background-color: #0A0145;color: #ffffff;">Nombre</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Imagen</th>



                    <th style="background-color: #0A0145;color: #ffffff;">Publicado</th>



                    <th style="background-color: #0A0145;color: #ffffff;"></th>

                    <th style="background-color: #0A0145;color: #ffffff;"></th>



                  </tr>



                </thead>



                <tbody>



                <?



							$link=conectarse_servicios();



							$query="SELECT * FROM banners order by id_banner desc;";



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



										$class='danger';



									}







								?>

								<form action="agregar_ordenbaner.php" method="post">



                  <input type="hidden" name="idcat[]" value="<?php echo $row['id_banner'];?>">



                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">



                    <td><a href="admin.si.banners.php?<? echo "id=".$row['id_banner']."&opc=UPD"; ?>&rowId=row<? echo $icont; ?>"><img src="img/editar.gif" border="0"/></a></td>



                    <td><? echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></td>



                    <td><a href="../banners/<?php echo $row['imagen']?>" target="_blank">Ver Imagen</a></td>



                    <td><img src="img/<? echo $imagen; ?>" border="0" /></td>

                    <td><input  type="number" min="00" max="9999" name="orden[]" value="<?php echo $row['orden'];?>" style="width: 45px !important" size="5"></td>



                    <td><a href="eliminar_banners.php?id=<?php echo $row['id_banner']; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>



                  </tr>



                  <? }







							}







							?>

							<td><button type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Guardar">Actualizar Orden</button></td>



							</form>



                            



                </tbody>



              </table>



              <? if(mysql_num_rows($resultado) <= 0){?>



         <h1 style="text-align:center;" class="danger">No hay Banners capturadas por el momento</h1>



         <?php }?>



            </div>



          </div>



         </div>



        </div>



        <div id="page-wrapper">



        <div class="row">

          <div class="col-sm-8 col-md-6 col-lg-10 col-xs-14">

            <h2 style="color:#FE0000;text-align: left;">PERSONALIZADOR DE MENSAJES</h2>

          </div>

        </div>







		<div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-14">

            <div class="row">

  	          <div class="col-sm-8 col-md-6 col-lg-2 col-xs-6"><h1></h1></div>

              <div class="col-sm-4 col-md-6 col-lg-10 col-xs-2" align="right"></div>

            </div>

            <div class="table-responsive">

             <form action="" method="post">

              <table class="table table-bordered table-hover table-striped tablesorter">

                <thead>

                  <tr>

                  <?

							$link=conectarse_servicios();

							$query1="SELECT * FROM mensaje;";

							$resultado1=mysql_query($query1, $link);

							

							if(mysql_num_rows($resultado1)>0){



								while($row1 = mysql_fetch_array($resultado1)){

									$bienvenida=$row1[1];

									$pie=$row1[2];



								} 

								}?>

                  	<th style="background-color: #0A0145;color: #ffffff;width: 56px">Bienvenida</th>

                  	<td style="width: 150px;"><textarea class="form-control" name="bienvenida"  style="width: 500px !important"> <?php echo $bienvenida;?></textarea></td>

                    <td  style="width: 100px;"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></td>

                    </tr>

                    <th style="background-color: #0A0145;color: #ffffff;">Pie de Pagina</th>

                    <td><textarea class="form-control" name="pie"  style="width: 500px !important"> <?php echo $pie;?></textarea></td>

                    <td><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></td>

                    

                  </tr>

                </thead>

              </table>

              </form>

             

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