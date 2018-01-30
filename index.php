<?php

session_start();

include_once ("lib/template.php"); 

$link=conectarse();

if(isset($_SESSION['servicios_user'])){

$usuario='<a href="admin/"><i class="fa fa-user"> '.$_SESSION['servicios_user'].' </i></a>';

$log='<a href="#" onclick="document.frmlogout.submit();" style="color:#FE0000"><i class="fa fa-power-off"></i> Cerrar Sesión</a>';

}else{

$usuario='<a href="user.login.php" style="color:#69AE1D">

        				<i class="fa fa-user"> INICIAR SESION </i>

					</a>';

$log='<a href="registro.php" style="color:#69AE1D">

    					<i class="fa fa-user"> REGISTRO </i>

					</a>';

}

$hora=$_GET['h'];

$fecha =$_GET['f'];

$us=$_GET['us'];

$cc = $_GET['cc'];

?>

<!DOCTYPE html><html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Sartory | Promocionales</title><meta charset="utf-8">

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

    height: 370px !important; }

    #ber { 

  font: 100% sans-serif !important; 

}

</style>

<link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body class="">

<div id="page_wrapper">

<link rel="stylesheet" href="css/site2.css" type="text/css">

<style>

.t-title.light {

color: #FFFFFF;

font-size: 28px;

margin: 15px 0 0;

font-weight: 200;

text-align: center;

}

.content-about-us2 {

background-color: #0B0146;

color: #FFFFFF;

/*padding-bottom: 10px;*/

}

.content-about-us {

background-color: #e20505;

color: #FFFFFF;

padding-bottom: 0px;

}

a.azul:hover {

    color: #0b0146 !important;

}

a.azul1:hover {

    color: #0b0146 !important;

}  

a.rojo:hover {

    color: #e20505 !important;

}



</style>

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

	<div class="mid-header" style="padding-bottom: -1px;">

		<div class="container">

			<div class="row-fluid">

				<div class="span3">

					<h1 class="main-logo">

						<a href="index.php">

							<img src="img/SARTORYlogo_.jpg" alt="Sartory">

							

						</a>

					</h1>

				</div>

				<div class="span9" style="/*margin-top: -30px;*/">

					<ul class="top-menu">
						<?php if(!isset($_SESSION['servicios_user'])){?>

                    <li class="with-margin"><a class="rojo" href="registro.php"><h3>REGISTRO</h3></a></li>

                    <li class="with-margin2" style="color: #ED1C24"> | </li>

						<li class="with-margin" style="margin-right: -25px;">

							<a class="azul" href="contacto.php"><h3>CONTACTO</h3></a>

						</li>

						<br/><li class="with-margin" style="margin-top: -10px;"><a class="azul1" href="cotizacion.php"><img src="img/123.jpg" alt="Cotizador" style="width: 50px;"></a></li>

						<li class="with-margin" style="margin-top: -10px;"><div class="search-content" style="width: 97%;margin-left: 6%;">

								<form action="busqueda.php" method="post">

									<input name="buscar" maxlength="50" type="text" size="45" placeholder="¿Qué estás buscando?" style="width: 88%;">

									<input type="hidden" name="hora" value="<?php echo $hora;?>">

									<input type="hidden" name="fecha" value="<?php echo $fecha;?>">

									<input type="hidden" name="us" value="<?php echo $us;?>">

									<input type="hidden" name="cc" value="<?php echo $cc;?>">

									<button type="submit" title="Buscar">

										<img src="img/lupa-busqueda.png" alt="Buscar">

									</button>

								</form>

							</div></li>
							<?php }else{?>
							<br/>
							<br/>
							<br/>
							<li class="with-margin" style="margin-top: -10px;"><a class="azul1" href="cotizacion.php"><img src="img/123.jpg" alt="Cotizador" style="width: 50px;"></a></li>

						<li class="with-margin" style="margin-top: -10px;"><div class="search-content" style="width: 97%;margin-left: 6%;">

								<form action="busqueda.php" method="post">

									<input name="buscar" maxlength="50" type="text" size="45" placeholder="¿Qué estás buscando?" style="width: 88%;">

									<input type="hidden" name="hora" value="<?php echo $hora;?>">

									<input type="hidden" name="fecha" value="<?php echo $fecha;?>">

									<input type="hidden" name="us" value="<?php echo $us;?>">

									<input type="hidden" name="cc" value="<?php echo $cc;?>">

									<button type="submit" title="Buscar">

										<img src="img/lupa-busqueda.png" alt="Buscar">

									</button>

								</form>

							</div></li>
							<?php } ?>

					</ul>

				</div>

			</div>

			</div>

</header>

<?php slider(); ?>



<?php



			$query="select id_mensaje,bienvenida from mensaje";



			$resultado=mysql_query($query, $link);



			while($row=mysql_fetch_array($resultado)){ 



				$bienvenida=$row[1];

				}?>



			 <div class="content-about-us">



    		<div class="container">



				<div class="row-fluid">



					<div class="span12" style="/*height: 50px;*/">



						<b class="t-title light text-left"><?php echo $bienvenida;?></b>						



						<p>

						</p>

					</div>

				</div>

			</div>

		</div>

	<div class="container">

			<div class="row-fluid" >

            

				<div class="span12">

					<div class="breadcrumb text-center" style="text-aling:center">

						Escoge una División:

					</div>

				</div>

			</div>



			<div class="row-fluid">

			<?php 

			

			$query="select division_id,division_nombre,division_imagen,link from divisiones where division_estatus=1 order by division_orden asc";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_categoria=$row[0];

      $nombre_categoria=$row[1];

      $archivo=$row[2];
      $lin = $row[3];

			?>


	<div class="span70">

					<table class="s-square">

						<tbody><tr>

							<td>

								<a <?php if($lin==1){ ?> href="#" <?php }else{ ?> href="categorias.php?idm=<?php echo $id_categoria;?>&h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $us;?>&cc=<?php echo $cc;?>"<?php } ?> >

									<img src="divisiones/<?php echo $archivo; ?>" alt="<?php echo $nombre_categoria;?>" style="display: block !important;">

								</a>

							</td>

						

							

					</tbody></table>



				</div>

				    <?php

        }

        ?>

								<!--<div class="o-line strong"></div>-->

			</div>

			<!-- inicio-->

			<div class="row-fluid">

			<?php 

			

			$query="select id_categoria,categoria,imagen from categorias where estatus=1 and portada=1 order by orden asc";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_categoria=$row[0];

      $nombre_categoria=$row[1];

      $archivo=$row[2];



			?>



	<div class="span70">

					<table class="s-square">

						<tbody><tr>

							<td>

								<a href="articulos.php?id=<?php echo $id_categoria;?>&h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $us;?>&cc=<?php echo $cc;?>">

									<img src="categorias/<?php echo $archivo; ?>" alt="Boligrafos">

								</a>

							</td>

						

							

					</tbody></table>



				</div>

				    <?php

        }

        ?>

								<!--<div class="o-line strong"></div>-->

			</div> 

			<!-- fin -->

			</div>

		</div>

		

		<div class="content-about-us2">

			<div class="container">

				<div class="row-fluid">

					<div class="span12">

						<h2 class="t-title light text-left">Sartory | Promocionales</h2>



<?



						$query="select id_mensaje,pie from mensaje";



			$resultado=mysql_query($query, $link);



			while($row=mysql_fetch_array($resultado)){ 



				$pie=$row[1];

				}?>



						<p style="text-align: center;font-size: 18px">



							<?php echo $pie;?>



						</p>



								</div>

				</div>

			</div>

		</div>

		 <script src="js/bootstrap.min.js"></script>

<?php

footer();

?>