<?php
include_once("lib/template.php");
$link=conectarse();
?>

<!DOCTYPE html>

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Sartory | Promocionales</title>

	

	<meta charset="utf-8">

	

	<meta name="description" content="SARTORY es una empresa de diseño, marketing y comercialización que ofrece soluciones novedosas y estrategias comerciales para su producto o negocio. Esta alianza es el resultado estratégico de la fusión de 2 empresas con años de experiencia en el Sureste de México: IDEAS PUBLICIDAD y COMERCIALIZADORA FAUR.">

	<meta name="keywords" content="Sartory publicidad, agencia de publicidad, desarrollo de sitios web, uniformes, desarrollo de productos, diseño de productos, artículos promocionales, publicidad, imagen corporativa, diseño, marca, logo, impresión digital, artículos publicitarios, logotipo, promoción, artículos publicitarios para empresas, regalos promocionales, artículos de oficina, servicio de diseño, proyecto publicitario, diseño de sitio web, artículos promocionales Mérida, promocionales económicos, artículos publicitarios merida yucatan, productos merchandising, productos publicitarios, catálogo de productos, , diseño web, diseño htm, diseño en flash, diseño gráfico, logo design, cms, php, seo, e-commerce, impresión, alojamiento web, fotografía, tarjetas de presentación, lonas publicitarias, lonas publicitarias, rotulación vehicular,  trípticos, dípticos, volantes, flyers, folletos, publicidad en papel para tortillas, artículos promocionales personalizados, publicidad en medios, productos de control de público"/>



<meta name="category" content="Sartory"/>

<meta name="author" content="Sartory | http://www.sartory.mx"/>

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



    .img-rounded2 {

  border-radius: 50px;

}

   .img-rounded3 {

  border-radius: 10px;

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
<section id="content" >
<div class="container">



				<div id="mainbody">

					<div class="row-fluid" style="margin-bottom: 15px;">

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

											<br/><?php echo $proveedor?></span>

											
											<br/>
											<a href="javascript:window.open('admin/admin.si.articulos.php?id=<?php echo $id_articulo;?>&opc=UPD&rowId=row1','','width=800,left=50,top=50,toolbar=yes');void 0" target="_blank"><img src ="img/tutoriales.png" style="width: 20px;height: 20px;"/>Editar</a>

																					</h5>
										<h2 class="small_desc">

										<?php if($descripcion ==''){

											echo $nombre;
										}

										else{

											echo $descripcion;

										}

										?>

										</h2>

										

										<p class="price">

											<h5 style="color: #FE0000"><strong>$</strong> <span id="span_clave"><?php echo $precio_venta;?> + IVA</span> </h5>
											<?php if($agotado==1){?>
											<h5 style="color: #FE0000"><strong><span id="span_clave">AGOTADO</span></strong>  </h5>

											<li>PRECIOS MÁS IVA.</li>

											<li>NO INCLUYE PERSONALIZACIÓN.</li>

											<li>PRECIOS SUJETOS A CAMBIO SIN PREVIO AVISO.</li>

											<li>SE APLICAN RESTRICCIONES.</li>

										</p> <?php }?>

															<input type="hidden" value="articulos/<?php echo $imagen;?>" name="action" />

															<input type="hidden" value="<?php echo $id;?>" name="id_articulo" />

															<input type="hidden" value="<?php echo $nombre;?>" name="nombre_articulo" />

															<input type="hidden" value="<?php echo $codigo;?>" name="codigo_articulo" />

															<input type="hidden" value="<?php echo $hora;?>" name="hora" />

															<input type="hidden" value="<?php echo $fecha;?>" name="fecha" />

															<input type="hidden" value="<?php echo $us;?>" name="us">

																					

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
		</body>