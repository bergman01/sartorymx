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







//<![CDATA[



function marcar_desmarcar(){



var marca = document.getElementById('marcar');



var cb = document.getElementsByName('seleccion[]');



for (i=0; i<cb.length; i++){



if(marca.checked == true){



cb[i].checked = true



}else{



cb[i].checked = false;



}



}



 



}



//]]>



</script>



<?	







   body();?>



   <div id="page-wrapper">







        <div class="row">



          <div class="col-sm-12 col-md-8 col-lg-10 col-xs-16">



          <h2 style="color:#FE0000;text-align: left;">ADMINISTRADOR DE USUARIOS</h2>



          </div>



        </div>

		<div class="row">



          <div class="col-sm-12 col-md-12 col-lg-10 col-xs-12">



            <div class="row">

            

            	<div class="col-sm-12 col-md-6 col-lg-4 col-xs-4"><h1>Usuarios Administradores</h1></div>

            <div class="col-sm-12 col-md-6 col-lg-4 col-xs-4" align="right"><h2><a href="admin.si.usuarios.php?opc=ADD&id=0" class="btn btn-success">Agregar Usuario administrador</a></h2></div>

        </div>

        <div class="table-responsive"> 

            



              <table class="table table-bordered table-hover table-striped tablesorter">



                <thead>

                  <tr>

                  	<th style="background-color: #0A0145;color: #ffffff;">#</th>

                  	<th style="background-color: #0A0145;color: #ffffff;">Usuario</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Contraseña</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Estatus</th>

                    <th style="background-color: #0A0145;color: #ffffff;"># Visitas</th>

                    <th style="background-color: #0A0145;color: #ffffff;">Ultimo acceso</th>

                    <th style="background-color: #0A0145;color: #ffffff;"></th>

                  </tr>

                </thead>

                <tbody>



                <?



							$link=conectarse_servicios();



							$query="SELECT * FROM usuarios ;";

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

                  <td><? echo $icont; ?></td>

                  



                  <td><a href="admin.si.usuarios.php?id=<?php echo $row['id'];?>&opc=UPD"><?php echo $row['usuario'];?></a></td>



                    <td><?php echo $row['updated_by'];?></td>



                    <td><img src="img/<?php echo $imagen; ?>"></td>

                    <td><?php echo $row['visitas'];?></td>

                    <td><?php echo date("d/m/Y H:m:s", strtotime($row['ultimo_inicio']));?></td>



                    <td><a href="eliminar_usuarios.php?id=<?php echo $row[0]; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>



                  </tr>



                  <? }







							}







							?>



                            



                </tbody>



              </table>



              <? if(mysql_num_rows($resultado) <= 0){?>



         <h1 style="text-align:center;" class="danger">No hay Usuarios capturados por el momento</h1>



         <?php }?>



            </div>

          </div>

         </div>



<?php footer(); ?>