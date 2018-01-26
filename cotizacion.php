<?php

include_once("lib/template.php");
require_once('lib/login.action.php');
session_start();

if(isset($_SESSION['servicios_user'])){

//$usuario=$_SESSION['servicios_user'];
$usuario='<a href="admin/"><i class="fa fa-user"> '.$_SESSION['servicios_user'].' </i></a>';

$log='<a href="#" onclick="document.frmlogout.submit();" style="color:#FE0000"><i class="fa fa-power-off"></i> Cerrar Sesión</a>';

}

else{

$usuario='<a href="user.login.php" style="color:#69AE1D;font-size:16px !important">

            			<i class="fa fa-user"> INICIAR SESION </i>

					</a>';

$log='<a href="registro.php" style="color:#69AE1D;font-size:16px !important">

    					<i class="fa fa-user"> REGISTRO </i>

					</a>';

}
	$membership = new loginAction();
  
	$membership->confirm_Member();
	$link=conectarse();
	if($_POST){

		$unidad=$_POST['unidad'];
		$tipo=$_POST['tipo'];
		$color=$_POST['color'];
    $precio_venta =$_POST['precio_venta'];
		$id=$_POST['id'];
		if($tipo!=''){
			$tranx="update cotizacion set personalizado=".$tipo." where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);
		}

		if($color!=''){
			$tranx="update cotizacion set color='".$color."'  where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);}

if($unidad!=''){$tranx="update cotizacion set unidad=". $unidad."  where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);}

if($precio_venta!=''){$tranx="update cotizacion set precio_venta=". $precio_venta."  where idcotizacion=".$id.";";          
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);}

	if($unidad!='' && $color!='' && $tipo!='' && $precio_venta !=''){
	$tranx="update cotizacion set unidad=". $unidad.",personalizado=".$tipo.",color='".$color."',precio_venta='".$precio_venta."' where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);}	
}



  function Formatear($cadena) {
   
   $cadena = str_replace("á", "&aacute;", $cadena);
   $cadena = str_replace("é", "&eacute;", $cadena);
   $cadena = str_replace("í", "&iacute;", $cadena);
   $cadena = str_replace("ó", "&oacute;", $cadena);
   $cadena = str_replace("ú", "&uacute;", $cadena);
   $cadena = str_replace("Á", "&Aacute;", $cadena);
   $cadena = str_replace("É", "&Eacute;", $cadena);
   $cadena = str_replace("Í", "&Iacute;", $cadena);
   $cadena = str_replace("Ó", "&Oacute;", $cadena);
   $cadena = str_replace("Ú", "&Uacute;", $cadena);
   $cadena = str_replace("Ñ", "&Ntilde;", $cadena);
   $cadena = str_replace("ñ", "&ntilde;", $cadena);
   $cadena = str_replace("Ú", " &Uuml;", $cadena);
   $cadena = str_replace("ú", "&uuml;", $cadena);
   return $cadena;
}

?>
<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="Variedad de regalos y artículos promocionales diferentes para dar a conocer tu marca o negocio; Contamos con productos para todas las necesidades y presupuestos. Promocionales económicos">
<meta name="keywords" content="sartory, regalos, obsequios, artículos promocionales, articulos promocionales, artículos, promocionales, sartory publicidad, Santiago alonso, Santiago Antonio alonso, Santiago Antonio Alonso Menendez, Santiago Antonio Alonso Menéndez, promocionales en mexico, promocionales ciudad de mexico, promocionales ciudad de México, promocionales monterrey, promocionales distrito federal, guadalajara, monterrey, ciudad de mexico, ciudad de méxico, distrito federal, df, promocionales precios, promocionales ecológicos, promocionales ecologicos, ecológicos, ecologicos, promocionales para empresas, promocionales novedosos, articulos promocionales económicos, promocionales cancun, económicos, economicos, catalogo, catálogo, categorías, categorias, termos, vasos, cilindros, tazas, accesorios, smartphone, tablets, audio, bocinas, computo, usb, agendas, agendas 2018, carpetas, calendarios, calendarios 2018,libretas, llaveros, bolígrafos, boligrafos, oficina, portarretratos, relojes, niños, antistress, anti-stress, antiestres, antiestress, anti-estrés, anti-estress, salud, belleza, hogar, viaje, paraguas, impermeables, gorras, sombreros, playeras, chamarras, chalecos, herramientas, deportes, entretenimiento, bar, hieleras, loncheras, bolsas, mochilas, portafolios, maletas, impulsa, premier, Distribuidor, marcas, distribuidor de promocionales, promocionales en Mérida, promocionales en merida, promocionales en Yucatan, promocionales en Yucatán, tazas sublimadas, gorras bordadas, playeras en serigrafía, playeras en serigrafía, botones publicitarios, fotobones, pines publicitarios, artículos regionales, tazas personalizadas, playeras personalizadas, playeras con tu marca, playeras con mi marca, uniformes, uniformes en merida, uniformes en merida yucatan, uniformes bordados, playeras con serigrafía, playeras serigrafiadas, tazas con serigrafía, tazas serigrafiadas, reconocimientos, reconocimientos en metal, reconocimientos de madera, reconocimientos de cristal, reconocimientos de metal, reconocimientos sublimados, eventos, impresos, tarjetas de presentación, tarjetas de negocios, promociones, activaciones, expos, ferias, todo para tu expo, promocionales baratos, promocionales económicos, promocionales económicos, promocionales de calidad, promocionales diferentes."/>
<meta name="category" content="Sartory"/>
<meta name="author" content="SARTORY PROMOCIONALES | http://www.sartory.mx"/>

	<title>Sartory | Promocionales</title>
<link rel="shortcut icon" href="img/favico.png" type="image/x-icon">
<link rel="icon" href="img/favico.png" type="image/x-icon">

	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">

	<link rel="stylesheet" href="css/template.css" type="text/css">

	

	<!-- UNCOMMENT BELOW IF YOU WANT RESPONSIVE LAYOUT FOR TABLET with device width -->

	 <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--<link rel="stylesheet" href="css/responsive-tablet.css" type="text/css" />-->

	

	<!-- Delete only if you're planning to use responsive for table with meta viewport device-width=1  -->

	<link rel="stylesheet" href="css/responsive.css" type="text/css">


	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style type="text/css">

.iosSlider {

    width: 100%;

    background: url(loader_dark.gif) no-repeat center center;

    height: 370px !important; }



    .img-rounded2 {

  border-radius: 50px;

}

   .img-rounded3 {

  border-radius: 10px;

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
<style type="text/css">
	select {
    width: 65px;
    border: 1px solid #cccccc;
    background-color: #ffffff;
}
.btn-flat2 {
    background: #0B0146;
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.8);
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    position: relative;
    border: 0;
    }
</style>

<div class="row-fluid" style="margin-bottom:5px;">
								
								<div class="span12">
									<div class="tabbable tabs_style4">
									<div class="tab-pane" id="shop-tab3" style="padding: 10px 15px 15px;">
												<hr>
												<h2 class="" style="text-align: center;color: #787878">Solicitud de Compra</h2>
												<!--<div class="fb-comments" data-href="http://www.impressline.com.mx/detalle.php?id_categoria=1&id=5" data-num-posts="5" data-width="875"></div>-->
											<div class="table-responsive">
											
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                  	<th></th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Unidades</th>
                    <th>Precio</th>
                    <th>Perzonalizado</th>
                    <th>Color y/o Comentarios</th>
                    <th>Estatus</th>
                    <th>Fecha de Captura</th>
                    <td><u><a href="elimina_todo.php?id=<?php echo $_SESSION['servicios_user'];?>">Eliminar todos</a></u></td>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?
							$link=conectarse_servicios();
							$usuario=$_SESSION['servicios_user'];
							$query="Select * from cotizacion where usuario='$usuario' and estatus=0 and fecha=CURDATE();";
							$resultado=mysql_query($query, $link);
							//echo $resultado;

							$icont=0;
							$class='success';
						
							if(mysql_num_rows($resultado)>0){

								while($row = mysql_fetch_array($resultado)){ 
									$tipo=html_entity_decode($row['persona'], ENT_QUOTES);
									$idss=$row['id_articulo'];
                                    $idcot=$row['idcotizacion'];

									$icont++;
									if($class=='success'){
								$class='active';
								}else{
									$class='success';
								}

									$laclase=($icont%2==0?"fila_par":"fila_impar");

									$imagen='no_publicado.gif';
									

									if($row['estatus']==0){

										$imagen='publicado.gif';
										$tip="Capturado ";

									}
									if($row['estatus'] == 2){
										$imagen='publicado.gif';
										$tip='Enviado ';
									}

									if($row['estatus'] == 1){
										$imagen='publicado.gif';
										$tip="Pendiente Enviar ";
									}


									
									if($imagen=='no_publicado.gif'){
										$class='danger';

										
									}

								?>
                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                  <form method="post" action="">
                  <input type="hidden" name="id" value="<?php echo $row['idcotizacion'];?>">
                    <td><? echo $icont; ?></td>
                    <td><? echo html_entity_decode($row['codigo'], ENT_QUOTES); ?></td>
                    <td><u><a href="detalle.php?id=<?php echo $row['id_articulo'];?>" target="_blank"><?php echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></a></u></td>
                    <td><input type="text" name="unidad" value="<?php echo $row['unidad'];?>" style="width: 37px !important"></td>
											<td><input type="text" name="precio_venta" value="<?php echo ROUND($row['precio_venta'],2);?>" style="width: 25px !important"></td>
                                            <td><?php echo $tipo;?></td>
											<td><input type="text" name="color" value="<?php echo $row['color'];?>" /></td>
											<td><?php echo $tip;?><img src="img/<?php echo $imagen;?>"></td>
											<td><?php echo $row['fecha'];?></td>
											<td><a href="eliminar_coti.php?id=<?php echo $row[0]; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Articulo"  style=" :pointer;"  /></a></td>
											<td><input type="submit" value="Actualizar"></td></form>
                  </tr>
                  <? }

							}

							?>
                            
                </tbody>
              </table>
              <? if(mysql_num_rows($resultado) <= 0){?>
         <h1 style="text-align:center;" class="danger">No hay Cotizaciones pendientes por el momento ir a <a href="index.php" style="color: #2f96b4;">Inicio</a></h1>
         <?php }?>
            </div>
													
													
                                                   
                                                    <form action="envia_cotizacion.php" method="post">
                                                    <?php
                                                    $query="Select * from cotizacion where usuario='$usuario' and estatus=0 and fecha=CURDATE();";
    						$resultado=mysql_query($query, $link);
							//echo $resultado;

							$icont=0;
							$class='success';
						
							if(mysql_num_rows($resultado)>0){

								while($row = mysql_fetch_array($resultado)){ 
									$tipo=html_entity_decode($row['persona'], ENT_QUOTES);
									$idss=$row['id_articulo'];
                                    $idcot=$row['idcotizacion'];
?>
                                                    <input type="hidden" name="coti[]" value="<?php echo $idcot;?>"/>
                                                    <?     							} } ?>
                                                    <?php
                                                    if(isset($_SESSION['admin_user'])){?>
                                                    <select class="form-control" name="id_cliente" id="proveedor" style="float: left;width: 150px" class="required">



                                     <option value="">Seleccionar Cliente</option>



      <?php

    $query="SELECT id_clientes,destinatario FROM clientes order by destinatario asc";

    $resultado=mysql_query($query, $link);

    while($row=mysql_fetch_array($resultado)){

      ?>



       <option  value="<? echo $row[0]; ?>" ?><?php echo $row[1]; ?> </option>



         <?php } ?>



         </select><a href="admin/clientes.si.php?opc=ADD&id=0" class="btn btn-success" style="position: absolute;margin-left: 27px;">Agregar cliente</a><br/><br/><br/><?php }?>
                                                    <label><input class="checkbox" name="publicar" id="publicar" type="checkbox" checked="checked" /> Enviar copia de cotización a mi email</label><br/>
													<a href="javascript:window.history.go(-1);"><label class="btn btn-flat2">Agregar mas Producto</label></a>&nbsp;&nbsp;&nbsp;<button class="btn btn-flat" type="submit">Solicitar Cotización</button>
												</form> 
											</div>
										</div>
									</div>
								</div>
								
<?footer();
?>