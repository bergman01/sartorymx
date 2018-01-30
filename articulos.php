<?php
error_reporting(0);

include_once("lib/template.php");
include_once 'lib/login.action.php';
session_start();

$mayoreo = $_SESSION['mayoreo'];
if(isset($_SESSION['servicios_user'])){

$usuario='<a href="admin/"><i class="fa fa-user"> '.$_SESSION['servicios_user'].' </i></a>';
$log='<a href="#" onclick="document.frmlogout.submit();" style="color:#FE0000"><i class="fa fa-power-off"></i> Cerrar Sesión</a>';
$ver=1;
}else{

$usuario='<a href="user.login.php" style="color:#69AE1D">
            			<i class="fa fa-user"> INICIAR SESION </i>
					</a>';
$log='<a href="registro.php" style="color:#69AE1D">
    					<i class="fa fa-user"> REGISTRO </i>
					</a>';
$ver=2;
}
$hora=$_GET['h'];
$fecha=$_GET['f'];

$us=$_GET['us'];

$cc = $_GET['cc'];

$link=conectarse();
$id=$_GET['id'];
$idmega = $_GET['idm'];
$idd = $_GET['idd'];
if($id !=''){
$query="select * from categorias where id_categoria like'$id';";
$resultado=mysql_query($query, $link);
while($row=mysql_fetch_array($resultado)){ 
$categorias=$row['categoria'];
}
}
if($idmega != ''){
$query="select * from mega_categorias where mega_categoria_id like'$idmega';";
$resultado=mysql_query($query, $link);
while($row=mysql_fetch_array($resultado)){ 
$categorias=$row['mega_categoria_nombre'];
}
}

$queri = "select division_nombre from divisiones where division_id = $idd;";
$resultado = mysql_query($queri,$link);
while ($row=mysql_fetch_array($resultado)) {
	$nombre_division = $row[0];
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
    .img-rounded2 {
  border-radius: 50px;
}
   .img-rounded3 {
  border-radius: 10px;
}
.t-title.light {
    color: #FFFFFF;
    font-size: 28px;
    margin: 15px 0 0;
    font-weight: :200;
    text-align: center;
}
.content-about-us {
    background-color: #0B0146;
    color: #FFFFFF;
    padding-bottom: 10px;
}
    .product-list-item .details p.desc {
    font-size: 12px;
    font-style: italic;
    color: #939393;
    line-height: 1.3;
    padding-top: 30px !important;
}
.product-list-item .details p.desc {
    font-size: 12px;
    font-style: italic;
    color: #939393;
    line-height: 1.3;
    padding-top :30px !important;
}
a.azul:hover {
    color: #0b0146 !important;
} 
a.rojo:hover {
    color: #e20505 !important;
}
</style>
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
				<li> | </li>
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
<div class="container">
	<section id="content">

			<div class="container">
				<div id="mainbody">
					<div class="row">
						<div class="span12">
							<div class="row">
							<?php
							$id=$_GET['id'];
							$idmega = $_GET['idm'];
							$hora=$_GET['h'];
							$fecha=$_GET['f'];
							$idmega = $_GET['idm'];
							if($id != ''){
										$query1="select categoria from categorias where id_categoria=$id;";
										$resultado1=mysql_query($query1, $link);		
							  }
							  if($idmega != ''){
										$query1="select mega_categoria_nombre from mega_categorias where mega_categoria_id=$idmega;";
										$resultado1=mysql_query($query1, $link);		
							  }

							  while($row1=mysql_fetch_array($resultado1)){ 
							      $categorias=$row1[0];
			?>
					<div id="boligrafos-plastico" class="span12"><h2 style="border-bottom: 1px solid #111111;"><a href="index.php?h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $us;?>&idcat=<?php echo $id;?>&cc=<?php echo $cc;?>">INICIO</a> <spam style="color: #FE0000"> > </spam> <a href="javascript:history.back(1)"><?php echo $nombre_division;?></a> <spam style="color: #FE0000"> > </spam><?php echo html_entity_decode($categorias,ENT_QUOTES);?></h2><div style="color: #999;"></p></div></div>

					<div id="boligrafos-plastico" class="span12"><div style="color: #999;text-aling:rigth;">
					<form name="form" method="post" action="">
                    <?php if(isset($_SESSION['servicios_user'])){?>
                    Proveedor: <select name="proveedor" >
                    	<option value="0">Todos los Proveedores</option>
                    	<?php

		$proveedor = $_POST['proveedor'];

		$query="SELECT id_proveedor,nombre FROM proveedores";
        $resultado=mysql_query($query, $link);
		while($row=mysql_fetch_array($resultado)){
			?>

	     <option  value="<? echo html_entity_decode($row[0], ENT_QUOTES); ?>" <?php if($proveedor == $row[0]){ echo 'selected="selected"';}?>  ><?php echo html_entity_decode($row[1], ENT_QUOTES); ?></option>

         <?php } ?></select> <?php }?>Ordenar por: <select name="ordenar" onchange="this.form.submit()">
    	<option value="0">-- Seleccionar --</option>
        <option value="1">Nombre del producto</option>
		<option value="2">Menor a Mayor Precio</option>
		<option value="3">Mayor a Menor Precio</option>
		<option value="4">Mas nuevo</option>
		<option value="5">Codigo de producto</option>
	</select>
					</form></div>
					<?php
					} 

					$id=$_GET['id'];
					$idmega=$_GET['idm'];
					$hora=$_GET['h'];
					$fecha=$_GET['f'];

					$us=$_GET['us'];

					$cc = $_GET['cc'];
					$ordenar=$_POST['ordenar'];
					$proveedor = $_POST['proveedor'];
					$mayor=$_POST['mayor'];
					//$query="select * from articulos where estatus=1 and categoria =$id order by ROUND(precio_venta,2) asc;";
					 if($id != ''){
					 	$query_filtro = 'select filtro from categorias where id_categoria ='.$id.';';
					$resultado_filtro=mysql_query($query_filtro, $link);
			        while($row_filtro=mysql_fetch_array($resultado_filtro)){
			        	$filtro = $row_filtro['filtro'];
			        } 
					if($filtro != ''){
						$query = "SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) order by $filtro;";

					}else{
					$query = "SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) order by fecha_creacion desc,ROUND(precio_venta,2) asc;";
						}

					if($proveedor !='0'){
						if($ordenar == '1'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) and id_proveedor = $proveedor order by nombre asc;";
						}
						if($ordenar == '2'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) and id_proveedor = $proveedor order by ROUND(precio_venta,2) asc;";
						}
						if($ordenar == '3'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) and id_proveedor = $proveedor order by ROUND(precio_venta,2) desc;";
						}
						if($ordenar == '4'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) and id_proveedor = $proveedor order by fecha_creacion desc;";
						}
						if($ordenar == '5'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) and id_proveedor = $proveedor order by codigo asc;";
						}
						
					}else{
										if($ordenar == '1'){
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria)  order by nombre asc;";
										}
										if ($ordenar == '2') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) order by ROUND(precio_venta,2) asc;";
										}
							            if ($ordenar == '3') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) order by ROUND(precio_venta,2) desc;";
										}
					                    if ($ordenar == '4') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) order by fecha_creacion desc;";
										}
					                    if ($ordenar == '5') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$id', categoria) order by codigo asc;";
										}
						}
					 }

					 if($idmega != ''){
					 	$query_filtro = 'select filtro from mega_categorias where mega_categoria_id ='.$idmega.';';
					$resultado_filtro=mysql_query($query_filtro, $link);
			        while($row_filtro=mysql_fetch_array($resultado_filtro)){
			        	$filtro = $row_filtro['filtro'];
			        } 
					if($filtro != ''){
						$query = "SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) order by $filtro;";

					}else{
					$query = "SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) order by fecha_creacion desc,ROUND(precio_venta,2) asc;";
						}

					if($proveedor !='0'){
						if($ordenar == '1'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) and id_proveedor = $proveedor order by nombre asc;";
						}
						if($ordenar == '2'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) and id_proveedor = $proveedor order by ROUND(precio_venta,2) asc;";
						}
						if($ordenar == '3'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) and id_proveedor = $proveedor order by ROUND(precio_venta,2) desc;";
						}
						if($ordenar == '4'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) and id_proveedor = $proveedor order by fecha_creacion desc;";
						}
						if($ordenar == '5'){
							$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) and id_proveedor = $proveedor order by codigo asc;";
						}
						
					}else{
										if($ordenar == '1'){
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria)  order by nombre asc;";
										}
										if ($ordenar == '2') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) order by ROUND(precio_venta,2) asc;";
										}
							            if ($ordenar == '3') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) order by ROUND(precio_venta,2) desc;";
										}
					                    if ($ordenar == '4') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) order by fecha_creacion desc;";
										}
					                    if ($ordenar == '5') {
											$query="SELECT * FROM articulos WHERE estatus=1 and FIND_IN_SET('$idmega', mega_categoria) order by codigo asc;";
										}
						}
					 }


			$resultado=mysql_query($query, $link);
			while($row=mysql_fetch_array($resultado)){ 

      $id_articulo=$row['id_articulo'];
      $codigo=html_entity_decode($row['codigo'], ENT_QUOTES);
      $categoria=$row['categoria'];
      $nombre=html_entity_decode($row['nombre'],ENT_QUOTES);
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
											<span class="hidden">5</span><a href="detalle.php?id=<?php echo $id_articulo;?>&h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $us;?>&idcat=<?php echo $categoria;?>&cc=<?php echo $cc;?>" data-id="5">
												<img src="articulos/<?php echo $imagen; ?>" alt="<?php echo $nombre;?>" style="height: 250px;">
											</a>
										</div>
										<div class="details fixclear">
											<h3 style="height:30px; text-align:left;">
											<a href="detalle.php?id=<?php echo $id_articulo;?>&h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $us;?>&idcat=<?php echo $id;?>&cc=<?php echo $cc;?>"><?php echo $nombre;?><br/><?php echo $codigo;?></a>
											<?php
											$query2="select * from proveedores where estatus=1 and id_proveedor=$ppp;";
			                                $resultado2=mysql_query($query2, $link);
			                                while($row2=mysql_fetch_array($resultado2)){
			                                	$proveedor=$row2['codigo'];
			                                }
											?>
											<!--<br/><?php echo $proveedor?><br/>-->
                                                <?php if($precio_venta == 0){?>

											<br/><spam style="color: #FE0000">Favor de Cotizar Precio</span>

											<?php }else{?>
											<?php if(isset($_SESSION['servicios_user'])){?>
											<?php if($mayoreo == ''){?>
											<br/><spam style="color: #FE0000" >$ <?php echo $precio_venta;?> + IVA</span>
											<?php }else{ $mayoreod='0.'.$mayoreo; ?>
											<br/><strike style="color: #bbb7b7"><spam style="color: #bbb7b7" >$ <?php echo $precio_venta;?> + IVA</span></strike>
											<br/><spam style="color: #FE0000" >$ <?php echo round(($precio_venta*$mayoreod),2);?> + IVA</span>	

											<?php }}}?>

												<br/><?php if($agotado==1){

    											?>
                                                <spam style="color: #FE0000">AGOTADO</spam>
												<?php } ?>
											</h3><br/>
											<p class="desc"><?php echo $nombre;?>
											</p>
											<div class="actions">
												<a href="detalle.php?id=<?php echo $id_articulo;?>&idcat=<?php echo $id;?>">DETALLE PRODUCTO</a>
											</div>
											<div class="price">
												<span>&nbsp;</span>
												<!--<small>$199</small>-->
											</div>
										</div>
									</div>
								</div>
                    								<?php } ?>
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
						<h1 class="t-title light text-left">Sartory | Promocionales</h1>
						<p>
							SARTORY es una empresa de diseño, marketing y comercialización que ofrece soluciones novedosas y estrategias comerciales para su producto o negocio a través de la creación de su imagen corporativa, artículos promocionales y desarrollo web.
						</p>
					</div>
				</div>
			</div>
		</div>
		</div>
<?php
footer();
?>