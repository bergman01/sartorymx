<?php

error_reporting(0);

include_once("lib/template.php");

$link=conectarse();

$id_categoria=$_GET['id'];

session_start();
if(isset($_SESSION['permiso'])){
	$permisos = $_SESSION['permiso'];
}
if(isset($_SESSION['servicios_user'])){

$usuario='<a href="admin/"><i class="fa fa-user"> '.$_SESSION['servicios_user'].' </i></a>';
$log='<a href="#" onclick="document.frmlogout.submit();" style="color:#FE0000"><i class="fa fa-power-off"></i> Cerrar Sesión</a>';

$ver=1;

}

else{

$usuario='<a href="user.login.php" style="color:#69AE1D">

            			<i class="fa fa-user"> INICIAR SESION </i>

					</a>';

$log='<a href="registro.php" style="color:#69AE1D">

    					<i class="fa fa-user"> REGISTRO </i>

					</a>';

$ver=2;

}



if($_POST){

//Recibir todos los parámetros del formulario



$imagen=$_POST['action'];

$para = 'bergman.pereira.novelo@gmail.com';

$asunto = 'Cotización';

$unidades = $_POST['unidades'];

$color = $_POST['color'];

$personalizado = $_POST['personalizado'];

$codigo_articulo = $_POST['codigo_articulo'];

$nombre_articulo = $_POST['nombre_articulo'];

$nombre = $_POST['nombre'];

$email = $_POST['email'];

$comentario = $_POST['comentario'];

$mensaje = "Solicitud de Cotización <br/>";

$mensaje.="<strong>Nombre: </strong>".$nombre."<br/>";

$mensaje.="<strong>Correo de Contacto: </strong>".$email."<br/>";

$mensaje.="<strong>Articulo </strong>".$nombre_articulo."<br/> <strong>Codigo </strong>".$codigo_articulo."<br/>";

$mensaje.="<strong>Cantidad: </strong>".$unidades." Unidades"."<br/>";

$mensaje.="<strong>color </strong>".$color."<br/>";

$mensaje.= "<strong>Tipo de Perzonalizado</strong> ".$personalizado."<br/>";

$mensaje.= "<strong>Comentario</strong> ".$comentario."</br>";



$archivo = $imagen;

 

//Librerías para el envío de mail

include_once('lib/PHPMailer/class.phpmailer.php');

include_once('lib/PHPMailer/class.smtp.php');

 



//Este bloque es importante

$correo = new PHPMailer();

 

$correo->IsSMTP();

 

$correo->SMTPAuth = true;

 

$correo->SMTPSecure = 'tls';

 

$correo->Host = "smtp.gmail.com";

 

$correo->Port = 587;



$correo->Charset = "UTF-8";

 

$correo->Username   = "bergman.pereira.novelo@gmail.com";

 

$correo->Password   = "vladberg01";

 

$correo->SetFrom("noreply@sartory.com.mx", "Sistema de Cotizaciones");

 

$correo->AddReplyTo("noreply@sartory.com.mx","Webmaster");

 

$correo->AddAddress("bergman.pereira.novelo@gmail.com", "Ventas Sartory");

 

$correo->Subject = "Cotización";

 

$correo->MsgHTML($mensaje);

 

$correo->AddAttachment($archivo,$archivo);

 

if($correo->Send()) {

  

  echo "Mensaje enviado con exito.";

}

 }

 $ids=$_GET['id'];
 $categoria = $_GET['idcat'];

 $query="select a.nombre,a.categoria,c.id_categoria,c.categoria from articulos a,categorias c

 where a.estatus=1 and a.id_articulo=$ids and a.categoria = c.id_categoria";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $nombre_producto=html_entity_decode($row[0], ENT_QUOTES);

      $id_cate=$row[1];

      $idc=$row[2];

      $cat=$row[3];

  }





?>

<!DOCTYPE html>

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Sartory | Promocionales</title>

	

	<meta charset="utf-8">
<meta name="description" content="Variedad de regalos y artículos promocionales diferentes para dar a conocer tu marca o negocio; Contamos con productos para todas las necesidades y presupuestos. Promocionales económicos">
<meta name="keywords" content="sartory, regalos, obsequios, artículos promocionales, articulos promocionales, artículos, promocionales, sartory publicidad, Santiago alonso, Santiago Antonio alonso, Santiago Antonio Alonso Menendez, Santiago Antonio Alonso Menéndez, promocionales en mexico, promocionales ciudad de mexico, promocionales ciudad de México, promocionales monterrey, promocionales distrito federal, guadalajara, monterrey, ciudad de mexico, ciudad de méxico, distrito federal, df, promocionales precios, promocionales ecológicos, promocionales ecologicos, ecológicos, ecologicos, promocionales para empresas, promocionales novedosos, articulos promocionales económicos, promocionales cancun, económicos, economicos, catalogo, catálogo, categorías, categorias, termos, vasos, cilindros, tazas, accesorios, smartphone, tablets, audio, bocinas, computo, usb, agendas, agendas 2018, carpetas, calendarios, calendarios 2018,libretas, llaveros, bolígrafos, boligrafos, oficina, portarretratos, relojes, niños, antistress, anti-stress, antiestres, antiestress, anti-estrés, anti-estress, salud, belleza, hogar, viaje, paraguas, impermeables, gorras, sombreros, playeras, chamarras, chalecos, herramientas, deportes, entretenimiento, bar, hieleras, loncheras, bolsas, mochilas, portafolios, maletas, impulsa, premier, Distribuidor, marcas, distribuidor de promocionales, promocionales en Mérida, promocionales en merida, promocionales en Yucatan, promocionales en Yucatán, tazas sublimadas, gorras bordadas, playeras en serigrafía, playeras en serigrafía, botones publicitarios, fotobones, pines publicitarios, artículos regionales, tazas personalizadas, playeras personalizadas, playeras con tu marca, playeras con mi marca, uniformes, uniformes en merida, uniformes en merida yucatan, uniformes bordados, playeras con serigrafía, playeras serigrafiadas, tazas con serigrafía, tazas serigrafiadas, reconocimientos, reconocimientos en metal, reconocimientos de madera, reconocimientos de cristal, reconocimientos de metal, reconocimientos sublimados, eventos, impresos, tarjetas de presentación, tarjetas de negocios, promociones, activaciones, expos, ferias, todo para tu expo, promocionales baratos, promocionales económicos, promocionales económicos, promocionales de calidad, promocionales diferentes."/>
<meta name="category" content="Sartory"/>
<meta name="author" content="SARTORY PROMOCIONALES | http://www.sartory.mx"/>

<meta name="reply-to" content="ventas@sartory.mx"/>

<meta name="resource-type" content="document"/>

<META name="robots" content="INDEX,FOLLOW"/> 

<meta name="revisit-after" content="1 day"/>

<link rel="shortcut icon" href="img/favico.png" type="image/x-icon">
<link rel="icon" href="img/favico.png" type="image/x-icon"> 

	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/template.css" type="text/css">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/responsive.css" type="text/css">

<script src="js/jquery-1.8.2.min.js"></script>

    <style type="text/css">

.iosSlider {

    width: 100%;

    background: url(loader_dark.gif) no-repeat center center;

    height: 370px !important; 
}



 .img-rounded2{

  border-radius: 50px;

}

   .img-rounded3 {

  border-radius: 10px;

}
a.azuls:hover {
    color: #0b0146 !important;
} 
a.rojos:hover {
    color: #e20505 !important;
}

    </style>

	<script type="text/javascript">

function agregar() {

	campo = '<tr><td><label>CANTIDAD: <span id="span_clave"><input type="number" min="00" max="9999" name="unidades[]" style="width: 45px !important" size="5"></label></span></label></td><td><label> COLOR: <span id="span_clave"><input type="text" name="color[]" width="10px" size="5"></span></label></td></tr>';

	$("#cantidades").append(campo);

}

</script>


	<link rel="stylesheet" href="css/style.css" type="text/css">

	
</head>



<body class="">





	<div id="page_wrapper">
<link rel="stylesheet" href="css/site2.css" type="text/css">



<header id="header" class="style2">

	<div class="top-header">

		<div class="container">

			<ul>

				<li style="font-size: 18px;font-family: sans-serif;font: bold;">

					<?php echo $usuario;?>

				</li>

				<li>

					|

				</li>

				<li style="font-size: 18px;font-family: sans-serif;font: bold;">

					<?php echo $log;?>

				</li>

			</ul>

		</div>

	</div>

	<div class="mid-header" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row-fluid">
				<div class="span3">
					<h1 class="main-logo">
						<a href="index.php">
							<img src="img/SARTORYlogo_.jpg" alt="Sartory">
							
						</a>
					</h1>
				</div>
				<div class="span9" style="margin-top: -30px;">
					<ul class="top-menu">
					<li class="with-margin"><a class="azul" href="index.php"><h3 >INICIO</h3></a></li>
                    <li class="with-margin2" style="color: #ED1C24"> | </li>
                    <li class="with-margin"><a class="rojo" href="registro.php"><h3>REGISTRO</h3></a></li>
                    <li class="with-margin2" style="color: #ED1C24"> | </li>
						<li class="with-margin" style="margin-right: -25px;">
							<a class="azul" href="contacto.php"><h3>CONTACTO</h3></a>
						</li>
						<br/><li class="with-margin" style="margin-top: -10px;"><a class="azul1" href="cotizacion.php"><h3>COTIZADOR</h3></a></li>
						<li class="with-margin" style="margin-top: -10px;"><div class="search-content" style="width: 97%;margin-left: 6%;">
								<form action="busqueda.php" method="post">
									<input name="buscar" maxlength="50" type="text" size="45" placeholder="¿Qué estás buscando?" style="width: 88%;">
									<button type="submit" title="Buscar">
										<img src="img/lupa-busqueda.png" alt="Buscar">
									</button>
								</form>
							</div></li>
					</ul>
				</div>
			</div>
			</div>

</header>	



<script type="text/javascript">

	

	function confirmar ( mensaje ) { 

return confirm( mensaje ); 

} 

</script>

<h3 style="border-bottom: 1px solid #111111;">

<a href="index.php">CATEGORIA</a><spam style="color: #FE0000"> > </spam><a href="articulos.php?id=<?php echo $categoria;?>"><?php echo html_entity_decode($cat,ENT_QUOTES);?></a> <spam style="color: #FE0000"> > </spam> <?php echo $nombre_producto;?> </h3>



<section id="content" >



			<div class="container">



				<div id="mainbody">

					<div class="row-fluid" style="margin-bottom: 15px;">

						<!--<div class="span3">-->

						<div class="span2">

							<div id="sidebar" class="sidebar-left">

								<div class="widget">

									<h4 class="title">ETIQUETAS:</h4>

									<ul class="menu">

									<?php 

			$query="select idtag,tag,estatus from tags where estatus=1 order by tag asc";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_categoria=$row[0];

      $nombre_categoria=html_entity_decode($row[1], ENT_QUOTES);

			?>

										

										<li><a href="tags.php?id=<?php echo $id_categoria;?>"><?php echo $nombre_categoria;?></a></li>

										<?php }?>

										</ul>

								</div>

								

							</div>

						</div>

						<?php 

						$id=$_GET['id'];

						$hora=$_GET['h'];

			$query="select * from articulos where estatus=1 and id_articulo=$id;";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_articulo=$row['id_articulo'];

      $codigo=$row['codigo'];

      $categoria=$row['categoria'];

      $nombre=html_entity_decode($row['nombre'], ENT_QUOTES);

      $imagen=$row['imagen'];

      $precio=$row['precio_venta'];

      $precio_venta=round($precio,2);

      $visible=$row['precio_publicado'];

      $descripcion=html_entity_decode($row['descripcion'], ENT_QUOTES);

      $persona=$row['personalizado'];

      $ppp=$row['id_proveedor'];
      $tag=$row['tags'];
      $agotado=$row['agotado'];



			?>		

						<div class="span10">

							<div class="row-fluid product-page">

								<div class="span4">

									<div class="product-gallery">

										<div class="big_image">

											

																						<a href="articulos/<?php echo $imagen;?>" rel="prettyPhoto[pp_gal]">

												<img class="width300" src="articulos/<?php echo $imagen;?>" alt="<?php echo $nombre;?>">

											</a>

										</div>


																			

									</div>
									<div class="hidden-xs">
								<h5 class="title-step">Galería</h5>
								<div class="carousel-box" style="overflow-x: auto;">
								<?php 
								$query_galeria="select * from galeria where id_articulo=$id;";

			$resultado_galeria=mysql_query($query_galeria, $link);

			while($galeria=mysql_fetch_array($resultado_galeria)){ 

								?>
									<div class="li-colores color_0" style="/*display: none;*/">
											<a class="contenedor-vista border-light  fancy_box" data-href="galeria/<?php echo $galeria['archivo'];?>" data-fancybox-group="gallery-detail" href="galeria/<?php echo $galeria['archivo'];?>" rel="prettyPhoto[pp_gal]">
												<img class="width48" src="galeria/<?php echo $galeria['archivo'];?>" alt="<?php echo $nombre;?>" >
											</a>
										</div>
										<?php 
									}
									?>
										</div>
										</div>
									<br/><br/><br/><br/><br/><br/><br/><br/><br/>Etiquetas:<?php
									
									$query9="select * from tags where idtag in (".$tag.");";

			$resultado9=mysql_query($query9, $link);

			while($row9=mysql_fetch_array($resultado9)){ 
				$nombre_tag=html_entity_decode($row9[1],ENT_QUOTES);

									?>
									 <?php echo $nombre_tag. ' - ';?>
									<?php }?>

								</div>



								

								<div class="span8">

									<div class="main-data">

										<div id="print_me">

										<h1 class="name" id="p_nombre"><?php echo $nombre;?></h1>

										<h5>

											<strong>Clave:</strong> <span id="span_clave"><?php echo $codigo;?></span>

											<?php

											$query="select * from proveedores where estatus=1 and id_proveedor=$ppp;";

			                                $resultado=mysql_query($query, $link);

			                                while($row=mysql_fetch_array($resultado)){

			                                	$proveedor=$row['nombre'];



			                                }

											?>

											<? $busca = explode(',', $permisos); if (in_array(7,$busca)==TRUE && in_array(2,$busca)==TRUE) {?><br/><span id="span_clave"><?php echo $proveedor?></span>
											<br/>
											<a href="javascript:window.open('admin/admin.si.articulos.php?id=<?php echo $id_articulo;?>&opc=UPD&rowId=row1','','width=800,left=50,top=50,toolbar=yes');void 0" target="_blank"><img src ="img/tutoriales.png" style="width: 20px;height: 20px;"/> EDITAR</a> | <a href="javascript:window.open('admin/filtro_galerias.php?id=<?php echo $id_articulo;?>&opc=UPD&rowId=row1','','width=800,left=50,top=50,toolbar=yes');void 0" target="_blank"><img src ="img/add_list_256.png" style="width: 20px;height: 20px;"/> Agregar Galeria</a>
											<?php }?></h5>

										<h2 class="small_desc">

										<?php if($descripcion ==''){

											echo $nombre;

																					

										}

										else{

											echo $descripcion;

										}

										?>

										</h2>



										<!--<p>

											// 

										</p>-->

										<?php if($visible ==1 && $ver == 1){ ?>

										<p class="price">
										<?php if($precio_venta == 0){?>

											<h5 style="color: #FE0000"><strong></strong> <span id="span_clave">Favor de Cotizar Precio</span> </h5>
											<?php }else{?>
											<h5 style="color: #FE0000"><strong>$</strong> <span id="span_clave"><?php echo $precio_venta;?> + IVA</span> </h5>
											<?php }?>
											<?php if($agotado==1){?>
											<h5 style="color: #FE0000"><strong><span id="span_clave">AGOTADO</span></strong>  </h5>
											<?php }?>

											<li>PRECIOS MÁS IVA.</li>

											<li>NO INCLUYE PERSONALIZACIÓN.</li>

											<li>PRECIOS SUJETOS A CAMBIO SIN PREVIO AVISO.</li>

											<li>SE APLICAN RESTRICCIONES.</li>

										</p> <?php }?>



											<?php

											if($hora!=''){?>

											<form  method="post" action="agrega_cotizacion3.php">

											<?php

										}else{ 

											?>



											<form  method="post" action="agrega_cotizacion2.php">

											<?php }

											$id=$_GET['id'];

											$hora = $_GET['h'];

											$fecha = $_GET['f'];

											$us=$_GET['us'];

											?>



															<input type="hidden" value="articulos/<?php echo $imagen;?>" name="action" />

															<input type="hidden" value="<?php echo $id;?>" name="id_articulo" />

															<input type="hidden" value="<?php echo $nombre;?>" name="nombre_articulo" />

															<input type="hidden" value="<?php echo $codigo;?>" name="codigo_articulo" />

															<input type="hidden" value="<?php echo $hora;?>" name="hora" />

															<input type="hidden" value="<?php echo $fecha;?>" name="fecha" />

															<input type="hidden" value="<?php echo $us;?>" name="us">

													<h5 class="title-step">Personaliza tu Cotización</h5>

													<table>

										

										

										<tr>

										<td>

										

											<label>CANTIDAD: <span id="span_clave"><input type="number"  step="0.01" min="00" max="9999" name="unidades[]" style="width: 45px !important" size="5" >

											</span></label></td>

											<td>

											<label> COLOR: <span id="span_clave"><input type="text" name="color[]" width="10px" size="5"></span></label> 

											</td>

											<td><span><a href="#" onclick="agregar();"><img src="img/add_list_256.png" width="20px" height="20px" /> Agregar</a></span></td>

											</tr>

											<div id="cantidades"></div>







											<tr>

											<td>

												<label>PERSONALIZACIÓN: </label>

											</td>

											<td><select name="tipo" style="width: 220px">

											<option value="No aplica">---Seleccionar Personalizado---</option>

												<?php

                     echo $query2="select * from personalizacion where idpersonalizacion in(".$persona.");";

									$resultado2=mysql_query($query2, $link);

									if(mysql_num_rows($resultado2)>0){



								while($row2 = mysql_fetch_array($resultado2)){

												?>

												 <option  value=" <?php echo html_entity_decode($row2[1], ENT_QUOTES); ?>"><?php echo html_entity_decode($row2[1], ENT_QUOTES); ?>

												 </option>

											<?php } } ?></select></td>

											</tr>

											<tr>

											<tr><td>

											

											<label for="comment">COMENTARIOS:</label></td>

                                            

													<td><textarea name="comentario" class="span12" style="resize: none;"></textarea></td>

													</tr></table>

                                                    <h6>Artículo sujeto a disponibilidad.</h6>

                                                    <br/><br/>

													<small>Este artículo se agregará a la solicitud de cotización.</small><br/>

                                                    <button class="btn btn-flat" type="submit" onclick="return confirmar('Articulo agregado al cotizador')">Enviar a Cotizador</button>

												</form>									

										</div><!-- PRINT_ME -->

										

										<div style="height: 25px;"></div>

																				<div class="row-fluid to_cart">

											<div class="quantitiy" style="margin-bottom:0px; padding-bottom:0px;">

																						</div>

											<div class="clear"></div>

											

											<div class="clear"></div>

											<div style="height: 5px;"></div>

											<div style="height: 5px;"></div>

										</div>

									</div>

								</div>

							</div>

							

							<div style="height: 25px;"></div>

							

							<div class="row-fluid" style="margin-bottom:5px;">

								

								<div class="span12">

									<div class="tabbable tabs_style4">

									<div class="tab-pane" id="shop-tab3" style="padding: 10px 15px 15px;">

												<hr>

												<!--<div class="fb-comments" data-href="http://www.impressline.com.mx/detalle.php?id_categoria=1&id=5" data-num-posts="5" data-width="875"></div>-->

											

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>	

					</div>

					<?php }?>

					<hr class="bs-docs-separator">

				</div>

				<div class="row-fluid margin-bottom">

					

				</div>

			</div>

		</section>

<?php

footer();

?>