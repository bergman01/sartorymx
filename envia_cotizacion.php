<?php
session_start();
include_once("lib/template.php");

require_once('lib/login.action.php');



	$membership = new loginAction();

  

	$membership->confirm_Member();

	$link=conectarse_servicios();
	function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=5;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}
$codigo=generaPass();
	$query1= "select * from cotizacion where codigo_cotizacion = '$codigo'";
	$rtranxx = mysql_query($quey1,$link);
				if(mysql_num_rows($rtranxx)>0){
				$codigo_cotizacion = generaPass();
				}else{
				$codigo_cotizacion = $codigo;
				}

   if(isset($_SESSION['servicios_user'])){
$usuario='<a href="admin/"><i class="fa fa-user"> '.$_SESSION['servicios_user'].' </i></a>';

if(isset($_SESSION['email_user'])){
	$user_session = $_SESSION['email_user'];
}else{
$user_session = $_SESSION['servicios_user'];
}

$log='<a href="#" onclick="document.frmlogout.submit();" style="color:#FE0000"><i class="fa fa-power-off"></i> Cerrar Sesión</a>';
}else{
$usuario='<a href="user.login.php" style="color:#69AE1D">
        				<i class="fa fa-user"> INICIAR SESION </i>
					</a>';
$log='<a href="registro.php" style="color:#69AE1D">
    					<i class="fa fa-user"> REGISTRO </i>
					</a>';
}

    $coti=implode(',',$_POST['coti']);
    if($_POST["publicar"]=='on'){
    	$publicar = 1;
    }

    $id_cliente = $_POST['id_cliente'];

    $query_cliente= "select destinatario,empresa,contacto_empresa,email,celular from clientes where id_clientes = $id_cliente;";
    $resultado_cliente=mysql_query($query_cliente, $link);
    if(mysql_num_rows($resultado_cliente) > 0){
    	while($row_cliente = mysql_fetch_array($resultado_cliente)) {
    		$des = $row_cliente[0];
    		$empre = $row_cliente[1];
    		$contemp = $row_cliente[2];
    		$emailemp = $row_cliente[3];
    		$celemp = $row_cliente[4];
    	}
    }

    $hora=date('H:i:s');

    $tranx="update cotizacion set estatus=2,hora='$hora',codigo_cotizacion=$codigo_cotizacion,destinatario='$des',empresa2='$empre',contacto_empresa='$contemp',email_empresa='$emailemp',celular_empresa='$celemp',empresa='$empre',cotizado_por='".$_SESSION['servicios_user']."' where idcotizacion IN (".$coti.");";                   

   $rtranx=mysql_query($tranx, $link);

$idreg = mysql_insert_id($link);

$mensaje= "<h1>Datos de Contacto</h1><br/>";

$query="Select * from registro where email='$user_session';";

              $resultado=mysql_query($query, $link);

              //echo $resultado;



              $icont=0;

              $class='success';

            

              if(mysql_num_rows($resultado)>0){



                while($row = mysql_fetch_array($resultado)){ 

                  $nombre=html_entity_decode($row['nombres'], ENT_QUOTES);

                  $apellidos=html_entity_decode($row['apellidos'], ENT_QUOTES);

                  $email=$row['email'];

                  $telefono=$row['telefono'];

                }

              }

$mensaje.= "<strong>Nombre Completo: </strong>".$nombre." ".$apellidos."<br/>";

$mensaje.="<strong>Email: <strong>".$email."<br/>";

$mensaje.="<strong>Telefono: </strong>".$telefono."<br/>";

$mensaje.="<h2>Articulos Solicitados</h2><br/>"; 



$mensaje.='<table class="table table-bordered table-hover table-striped tablesorter" style="border:1px">

                <thead>

                  <tr>

                  	<th></th>

                    <th>Codigo</th>

                    <th>Nombre</th>

                    <th>Precio Venta</th>

                    <th>Unidades</th>

                    <th>Perzonalizado</th>

                    <th>Color</th>

                    <th>Precio</th>

                    

                  </tr>

                </thead>

                <tbody>';

$query="Select * from cotizacion where usuario='".$_SESSION['servicios_user']."' and estatus=2 and fecha=CURDATE();";

							$resultado=mysql_query($query, $link);

							//echo $resultado;



							$icont=0;

							$class='success';

						

							if(mysql_num_rows($resultado)>0){



								while($row = mysql_fetch_array($resultado)){ 

                                    $precio= round($row['precio_venta'],2);

$unidad=$row['unidad'];

$multiplica= $unidad*$precio;



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





$mensaje.='<tr class="'.$class .'" id="row'. $icont .'">';

$mensaje.='<td>'.$icont.'</td>';

$mensaje.='<td>'.html_entity_decode($row['codigo'], ENT_QUOTES).'</td>';

$mensaje.='<td>'.html_entity_decode($row['nombre'], ENT_QUOTES).'</td>';

$mensaje.='<td>'.round($row['precio_venta'],2).'</td>';

$mensaje.='<td>'.$row['unidad'].'</td>';

$mensaje.='<td>'.html_entity_decode($row['persona'], ENT_QUOTES).'</td>';

$mensaje.='<td>'.$row['color'].'</td>';

$mensaje.='<td>'.$multiplica.'</td>';

}

}

$mensaje.='</tr></table>';

//Librerías para el envío de mail

include_once('lib/PHPMailer/class.phpmailer.php');

include_once('lib/PHPMailer/class.smtp.php');



//Este bloque es importante

$correo = new PHPMailer();

 

$correo->IsSMTP();

 

//$correo->SMTPAuth = true;

 

//$correo->SMTPSecure = 'tls';

 

$correo->Host = "localhost";

 

//$correo->Port = 25;



$correo->Charset = "UTF-8";

$correo->SetFrom("noreply@sartory.mx", "SARTORY Cotizaciones-".$user_session."");
$correo->AddAddress("santiago@sartory.mx", "Ventas Sartory");
$correo->AddBCC("bergman.pereira.novelo@gmail.com","Cotizaciones");
if($publicar == 1){
$correo->AddBCC("".$user_session."","Cotizacion Solicitada");
}

$correo->Subject = "Cotizacion de ".$user_session;



$correo->Body = $mensaje;

//Para adjuntar archivo

//$mail->AddAttachment($archivo, $archivo);

$correo->MsgHTML($mensaje);

  

//Avisar si fue enviado o no y dirigir al index

if($correo->Send())

{

    

    echo'<script type="text/javascript">

            alert("ENVIADO CORRECTAMENTE");            

         </script>';

}

else{

    echo'<script type="text/javascript">

            alert("NO ENVIADO, intentar de nuevo");

         </script>';

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
padding-bottom: 10px;
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
			</div>
			</div>
</header>

 <div id="content">

            <div class="container" id="contact">



                <section>



                    <div class="row">

                    

                        <div class="col-md-12">

                            <section>

                                <div class="heading" style="text-align: center;">

                                    <h2 style="color:red">MENSAJE ENVIADO EXITOSAMENTE.</h2>

                                    <h3>En breve recibirá respuesta sobre su cotización, artículos y colores sujetos a disponibilidad.</h3>

                                    <br/><a href="index.php" style="color:#2f96b4;">MENU PRINCIPAL</a>

                                

                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



                                <p class="lead"></p>

                            </section>

                        </div>

                    </div>



                </section>



               </div>

               </div>



	</div>
	<?php
footer();
?>






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





<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body></html>

