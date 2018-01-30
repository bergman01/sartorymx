<?php



error_reporting(0);



include_once('lib/conexion.php');



session_start();


if(isset($_SESSION['servicios_user'])){



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

function cabezal(){?>



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
.span5 {
    width: 63.17094% !important;
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



<?php }



function slider(){

    ?>

    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>

    <!-- use jssor.slider.debug.js instead for debug -->

    <script>

        jQuery(document).ready(function ($) {

            

            var jssor_1_SlideoTransitions = [

              [{b:5500,d:3000,o:-1,r:240,e:{r:2}}],

              [{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],

              [{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],

              [{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],

              [{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],

              [{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],

              [{b:10000,d:2000,x:-379,e:{x:7}}],

              [{b:10000,d:2000,x:-379,e:{x:7}}],

              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]

            ];

            

            var jssor_1_options = {

              $AutoPlay: true,

              $SlideDuration: 800,

              $SlideEasing: $Jease$.$OutQuint,

              $CaptionSliderOptions: {

                $Class: $JssorCaptionSlideo$,

                $Transitions: jssor_1_SlideoTransitions

              },

              $ArrowNavigatorOptions: {

                $Class: $JssorArrowNavigator$

              },

              $BulletNavigatorOptions: {

                $Class: $JssorBulletNavigator$

              }

            };

            

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            

            //responsive code begin

            //you can remove responsive code if you don't want the slider scales while window resizing

            function ScaleSlider() {

                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;

                if (refSize) {

                    refSize = Math.min(refSize, 1920);

                    jssor_1_slider.$ScaleWidth(refSize);

                }

                else {

                    window.setTimeout(ScaleSlider, 30);

                }

            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);

            $(window).bind("resize", ScaleSlider);

            $(window).bind("orientationchange", ScaleSlider);

            //responsive code end

        });

    </script>



    <style>

        

        /* jssor slider bullet navigator skin 05 css */

        /*

        .jssorb05 div           (normal)

        .jssorb05 div:hover     (normal mouseover)

        .jssorb05 .av           (active)

        .jssorb05 .av:hover     (active mouseover)

        .jssorb05 .dn           (mousedown)

        */

        .jssorb05 {

            position: absolute;

        }

        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {

            position: absolute;

            /* size of bullet elment */

            width: 16px;

            height: 16px;

            background: url('img/b05.png') no-repeat;

            overflow: hidden;

            cursor: pointer;

        }

        .jssorb05 div { background-position: -7px -7px; }

        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }

        .jssorb05 .av { background-position: -67px -7px; }

        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }



        /* jssor slider arrow navigator skin 22 css */

        /*

        .jssora22l                  (normal)

        .jssora22r                  (normal)

        .jssora22l:hover            (normal mouseover)

        .jssora22r:hover            (normal mouseover)

        .jssora22l.jssora22ldn      (mousedown)

        .jssora22r.jssora22rdn      (mousedown)

        */

        .jssora22l, .jssora22r {

            display: block;

            position: absolute;

            /* size of arrow element */

            width: 40px;

            height: 58px;

            cursor: pointer;

            background: url('img/a22.png') center center no-repeat;

            overflow: hidden;

        }

        .jssora22l { background-position: -10px -31px; }

        .jssora22r { background-position: -70px -31px; }

        .jssora22l:hover { background-position: -130px -31px; }

        .jssora22r:hover { background-position: -190px -31px; }

        .jssora22l.jssora22ldn { background-position: -250px -31px; }

        .jssora22r.jssora22rdn { background-position: -310px -31px; }

       

    </style>

    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 100%; overflow: hidden; visibility: hidden;margin-bottom: -19px;">

        <!-- Loading Screen -->

        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">

            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>

            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>

        </div>

        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 100%; overflow: hidden;">

       

       <?php 

         include_once("conexion.php");

       $link=conectarse();

                        $query="select * from banners where estatus=1 order by orden asc";

            $resultado=mysql_query($query, $link);

            if($resultado !=0){

            while($row=mysql_fetch_array($resultado)){ 

      $imagen=$row['imagen'];

      $nombre_categoria=$row[1];

      $archivo=$row[2];

      ?>

            <div data-p="225.00" style="display: none;">

                <a href="<?php echo $row['url'];?>" target="_blank" ><img data-u="image" src="banners/<?php echo $imagen;?>" /></a>

            </div>

            

            <?php }

        }

        ?>

           

        </div>

        <!-- Bullet Navigator -->

        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">

            <!-- bullet navigator item prototype -->

            <div data-u="prototype" style="width:16px;height:16px;"></div>

        </div>

        <!-- Arrow Navigator -->

        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>

        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>

    </div><br/>

           

<?php

}

function slider_division($id){

    ?>

    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>

    <!-- use jssor.slider.debug.js instead for debug -->

    <script>

        jQuery(document).ready(function ($) {

            

            var jssor_1_SlideoTransitions = [

              [{b:5500,d:3000,o:-1,r:240,e:{r:2}}],

              [{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],

              [{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],

              [{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],

              [{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],

              [{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],

              [{b:10000,d:2000,x:-379,e:{x:7}}],

              [{b:10000,d:2000,x:-379,e:{x:7}}],

              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]

            ];

            

            var jssor_1_options = {

              $AutoPlay: true,

              $SlideDuration: 800,

              $SlideEasing: $Jease$.$OutQuint,

              $CaptionSliderOptions: {

                $Class: $JssorCaptionSlideo$,

                $Transitions: jssor_1_SlideoTransitions

              },

              $ArrowNavigatorOptions: {

                $Class: $JssorArrowNavigator$

              },

              $BulletNavigatorOptions: {

                $Class: $JssorBulletNavigator$

              }

            };

            

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            

            //responsive code begin

            //you can remove responsive code if you don't want the slider scales while window resizing

            function ScaleSlider() {

                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;

                if (refSize) {

                    refSize = Math.min(refSize, 1920);

                    jssor_1_slider.$ScaleWidth(refSize);

                }

                else {

                    window.setTimeout(ScaleSlider, 30);

                }

            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);

            $(window).bind("resize", ScaleSlider);

            $(window).bind("orientationchange", ScaleSlider);

            //responsive code end

        });

    </script>



    <style>

        

        /* jssor slider bullet navigator skin 05 css */

        /*

        .jssorb05 div           (normal)

        .jssorb05 div:hover     (normal mouseover)

        .jssorb05 .av           (active)

        .jssorb05 .av:hover     (active mouseover)

        .jssorb05 .dn           (mousedown)

        */

        .jssorb05 {

            position: absolute;

        }

        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {

            position: absolute;

            /* size of bullet elment */

            width: 16px;

            height: 16px;

            background: url('img/b05.png') no-repeat;

            overflow: hidden;

            cursor: pointer;

        }

        .jssorb05 div { background-position: -7px -7px; }

        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }

        .jssorb05 .av { background-position: -67px -7px; }

        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }



        /* jssor slider arrow navigator skin 22 css */

        /*

        .jssora22l                  (normal)

        .jssora22r                  (normal)

        .jssora22l:hover            (normal mouseover)

        .jssora22r:hover            (normal mouseover)

        .jssora22l.jssora22ldn      (mousedown)

        .jssora22r.jssora22rdn      (mousedown)

        */

        .jssora22l, .jssora22r {

            display: block;

            position: absolute;

            /* size of arrow element */

            width: 40px;

            height: 58px;

            cursor: pointer;

            background: url('img/a22.png') center center no-repeat;

            overflow: hidden;

        }

        .jssora22l { background-position: -10px -31px; }

        .jssora22r { background-position: -70px -31px; }

        .jssora22l:hover { background-position: -130px -31px; }

        .jssora22r:hover { background-position: -190px -31px; }

        .jssora22l.jssora22ldn { background-position: -250px -31px; }

        .jssora22r.jssora22rdn { background-position: -310px -31px; }

       

    </style>

    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 100%; overflow: hidden; visibility: hidden;margin-bottom: -19px;">

        <!-- Loading Screen -->

        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">

            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>

            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>

        </div>

        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 100%; overflow: hidden;">

       

       <?php 

         include_once("conexion.php");

       $link=conectarse();

                        $query="select * from banners_division where estatus=1 and id_division = $id order by orden asc";

            $resultado=mysql_query($query, $link);

            if($resultado !=0){

            while($row=mysql_fetch_array($resultado)){ 

      $imagen=$row['imagen'];

      $nombre_categoria=$row[1];

      $archivo=$row[2];

      ?>

            <div data-p="225.00" style="display: none;">

                <a href="<?php echo $row['url'];?>" target="_blank" ><img data-u="image" src="banners/<?php echo $imagen;?>" /></a>

            </div>

            

            <?php }

        }

        ?>

           

        </div>

        <!-- Bullet Navigator -->

        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">

            <!-- bullet navigator item prototype -->

            <div data-u="prototype" style="width:16px;height:16px;"></div>

        </div>

        <!-- Arrow Navigator -->

        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>

        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>

    </div><br/>

           

<?php

}


function footer()



{



	?>



<footer class="footer">



	<div class="container">



		<div class="row-fluid">



			<div class="span7">



			<form name="frmlogout" id="frmlogout" action="user.login.php" method="post"><input type="hidden" name="status" id="status" value="loggedout" /></form>



				<div class="row-fluid">



					



					<div class="span5">



						<div class="social-buttons">



						



							<a href="https://www.facebook.com/sartorymx" target="_blank">



								<img src="img/social-fb.png" alt="Síguenos en Facebook">



							</a>



							<a href="https://twitter.com/sartory_mx" target="_blank">



								<img src="img/social-tw.png" alt="Síguenos en Twitter">



							</a> 
                            <a href="https://www.instagram.com/sartory.mx/"> <img src="img/social-ins.png" alt="Síguenos en instagram" /></a>
								Todos los derechos reservados. Copyright © 2018. | <a href="contacto.php"> Información de Contacto </a>
						</div>



					</div>



				</div>



				<div class="row-fluid">



					<div class="span12">



						<div class="footer-copy">
							<!--<span>
								Todos los derechos reservados. Copyright © 2018. 
							</span>-->



						</div>



					</div>



				</div>



			</div>



			



		</div>



	</div>



</footer>	</div>


<!--<script src="//code.tidio.co/sgby1uudlawajpdzs2yvfszlkk18egw2.js"></script>-->
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css">



<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

	<script type="text/javascript">



	function ppOpen(panel, width){



		jQuery.prettyPhoto.close();



		setTimeout(function() {



			jQuery.fn.prettyPhoto({social_tools: false, deeplinking: false, show_title: false, default_width: width, theme:'pp_kalypso'});



			jQuery.prettyPhoto.open(panel);



		}, 300);



	} // function to open different panel within the panel



	



	jQuery(document).ready(function($) {



		jQuery("a[data-rel^='prettyPhoto'], .prettyphoto_link").prettyPhoto({theme:'pp_kalypso',social_tools:false, deeplinking:false});



		jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme:'pp_kalypso'});



		jQuery("a[data-rel^='prettyPhoto[login_panel]']").prettyPhoto({theme:'pp_kalypso', default_width:800, social_tools:false, deeplinking:false});



		



		jQuery(".prettyPhoto_transparent").click(function(e){



			e.preventDefault();



			jQuery.fn.prettyPhoto({social_tools: false, deeplinking: false, show_title: false, default_width: 980, theme:'pp_kalypso transparent', opacity: 0.95});



			jQuery.prettyPhoto.open($(this).attr('href'),'','');



		});



		



	});



	</script>

<script type="text/javascript" src="js/bootstrap.min.js"></script><!-- Bootstrap Framework -->

</body></html>



<?php 



}



?>