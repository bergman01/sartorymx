<?php

include_once("lib/template.php");

$link=conectarse();

session_start();

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

'<script src="js/jquery-1.8.2.min.js"></script>

    <style type="text/css">

.iosSlider {

    width: 100%;

    background: url(loader_dark.gif) no-repeat center center;

    height: 370px !important; 



    </style>
	<link rel="stylesheet" href="css/style.css" type="text/css">

    <style>

    .product-list-item .details p.desc {

    font-size: 12px;

    font-style: italic;

    color: #939393;

    line-height: 1.3;

    padding-top: 15px;

}

a.azul:hover {
    color: #0b0146 !important;
} 
a.rojo:hover {
    color: #e20505 !important;
}

    </style>
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

<div class="container">

<section id="content">

			<div class="container">

				<div id="mainbody">

					<div class="row">

						<div class="span12">

							<div class="row">

							<?php

							$busca=$_POST['buscar'];
			                if($busca == ''){
				             $busca = $_GET['buscar'];
			                 }
							$hora=$_POST['hora'];
                            $fecha =$_POST['fecha'];
                            $us=$_POST['us'];
                            $cc = $_POST['cc'];

			?>			

					<div id="boligrafos-plastico" class="span12"><h2 style="border-bottom: 1px solid #111111;"><a href="index.php">INICIO </a> <spam style="color: #FE0000"> > </spam> <?php echo $buscar;?></h2><div style="color: #999;">Un promocional útil e idóneo para cualquier campaña promocional.<p></p></div></div>	

					<?php

					 

					/*$busca=$_POST['buscar'];
					$cadena_de_texto = $busca;
                    $cadena_buscada1   = '#';
                    $posicion_coincidencia1 = strpos($cadena_de_texto, $cadena_buscada1);
                       $cadena_buscada   = '*';
                    $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);

                    if ($posicion_coincidencia1 === false) {
                    	$query="select * from articulos where  (codigo like '%$busca%' or nombre like '%$busca%') and estatus =1  order by ROUND(precio_venta,2) asc;";
                    } else {
            
                      $resultado1 = substr($busca, 1);
                     
                      $query="select * from articulos where  id_proveedor=$resultado1 and estatus =1  order by ROUND(precio_venta,2) asc;";
            }
                    $busca=$_POST['buscar'];
					$cadena_de_texto = $busca;
                    $cadena_buscada   = '*';
                    $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                    if ($posicion_coincidencia === false) {
                    	$query="select * from articulos where  (codigo like '%$busca%' or nombre like '%$busca%') and estatus =1  order by ROUND(precio_venta,2) asc;";
   
    } else {
            
                       $resultado = substr($busca, 1);
                       $query3="select * from tags where tag like '%$resultado%';";

			$resultado3=mysql_query($query3, $link);

			while($row3=mysql_fetch_array($resultado3)){ 
				$idtag=$row3['idtag'];
			}
                     
                     $query="select * from articulos where  tags like '%$idtag%' and estatus =1  order by ROUND(precio_venta,2) asc;";
                  
            }*/
			//$query="select * from articulos where  (codigo like '%$busca%' or nombre like '%$busca%') and estatus =1  order by ROUND(precio_venta,2) asc;";
			$busca=$_POST['buscar'];
			if($busca == ''){
				$busca = $_GET['buscar'];
			}
            $cadena_de_texto = $busca;
            $cadena_buscada1   = '#';
            $cadena_buscada   = '*';
            $posicion_coincidencia1 = strpos($cadena_de_texto, $cadena_buscada1);
            $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
            if($busca !=''){
	if($posicion_coincidencia1 === false){

		$query="select * from articulos where  (codigo like '%$busca%' or nombre like '%$busca%') and estatus =1  order by ROUND(precio_venta,2) asc;";

	} 
	else {
		$buscar=substr($busca, 1);
		$query="select * from articulos where  id_proveedor=$buscar and estatus =1  order by ROUND(precio_venta,2) asc;";
		
	}
	if($posicion_coincidencia=== false){

	}else{
		$buscar=substr($busca, 1);
		$tag="select * from tags where tag like '%$buscar%';";

			$tagr=mysql_query($tag, $link);

			while($row3=mysql_fetch_array($tagr)){ 
				$idtag=$row3['idtag'];
			}
                     
                     $query="select * from articulos where  tags like '%$idtag%' and estatus =1  order by ROUND(precio_venta,2) asc;";
	}
}

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_articulo=$row['id_articulo'];

      $codigo=html_entity_decode($row['codigo'], ENT_QUOTES);

      $categoria=$row['categoria'];

      $nombre=$row['nombre'];

      $imagen=$row['imagen'];

      $precio_publicado=$row['precio_publicado'];

      $precio=$row['precio_venta'];

      $precio_venta=round($precio,2);

      $ppp=$row['id_proveedor'];
      $agotado=$row['agotado'];



			?>							<div class="span3">

									<div class="product-list-item" id="bol-01-16-jeringa" style="height: 397px;">

										<span class="hover"></span>

										<div class="image">

											<span class="hidden">5</span><a href="detalle.php?id=<?php echo $id_articulo;?>&h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $us;?>&idcat=Busqueda&cc=<?php echo $cc;?>" data-id="5">

												<img src="articulos/<?php echo $imagen; ?>" alt="<?php echo $nombre;?>" style="height: 250px;">

											</a>

										</div>

										<div class="details fixclear">

											<h3 style="height:30px; text-align:left;">

											<a href="detalle.php?id=<?php echo $id_articulo;?>"><?php echo $nombre;?><br/><?php echo $codigo;?></a>

    											<?php if($precio_venta == 0){?>
											<br/><spam style="color: #FE0000">Favor de Cotizar Precio</span>
											<?php }else{?>

											<?php if(isset($_SESSION['servicios_user'])){?>



											<br/><spam style="color: #FE0000" >$ <?php echo $precio_venta;?> + IVA</span>



											<?php }}?>
												<br/><?php if($agotado==1){

    											?>

                                                <spam style="color: #FE0000">AGOTADO</spam>

												

												<?php } ?>

											</h3><br/>

											<p class="desc"><?php echo $nombre;?></p>

                                            <div class="actions">

												<a href="detalle.php?id=<?php echo $id_articulo;?>">DETALLE PRODUCTO</a>

											</div>

											<div class="price">

												<span>&nbsp;</span>

												<!--<small>$199</small>-->

											</div>

										</div>

									</div>

								</div>

                    								<?php }

                    							



                    								?>

                    							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		

				<div class="content-about-us">

			<div class="container">

				<div class="row-fluid">

					<div class="span12">

						<h1 class="t-title light text-left">Los mejores Productos Promocionales</h1>

						

						<p>

							Son artículos promocionales que Sartory ofrece en una gran variedad

							de estilos y funciones para cualquier campaña publicitaria. Además pueden funcionar como

							una herramienta de marketing con increíbles resultados. El regalar productos promocionales

							útiles, como los bolígrafos, con la marca de su empresa, negocio o información lo ayudará

							a promover su marca en el mercado.

						</p>					</div>

				</div>

			</div>

		</div>
		</div>

<?php

footer();

?>