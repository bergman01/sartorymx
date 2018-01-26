<?php

error_reporting(0);

include_once("lib/template.php");

$link=conectarse();

$id_categoria=$_GET['id'];



if($_POST){

$nombre = $_POST['nombre'];

$asunto = $_POST['asunto'];

$email = $_POST['email'];

$telefono = $_POST['telefono'];

$text = $_POST['mensaje'];



//Librerías para el envío de mail

include_once('lib/PHPMailer/class.phpmailer.php');

include_once('lib/PHPMailer/class.smtp.php');

 

//Recibir todos los parámetros del formulario

$para1 = 'bergman.pereira.novelo@gmail.com';

$para = 'itzimna@hotmail.com';

$asunto = $_POST['asunto'];

$mensaje = '<h2>'.$nombre.'</h2><h3>'.$email.'</h3><h3>'.$telefono.'</h3><h3>'.$text.'</h3>';

$archivo = $imagen;

 

//Este bloque es importante

$mail = new PHPMailer();

$mail->IsSMTP();

//$mail->SMTPAuth = true;

$mail->SMTPSecure = "tsl";

$mail->Host = "localhost";

$mail->Port = 25;

 

//Nuestra cuenta

//$mail->Username ='bergman.pereira.novelo@gmail.com';

//$mail->Password = 'vladberg01'; //Su password

 

//Agregar destinatario

$mail->SetFrom("noreply@sartory.mx", "SARTORY Contacto");
$mail->AddAddress("itzimna@hotmail.com", "Ventas Sartory");
$mail->AddBCC("bergman.pereira.novelo@gmail.com","Contacto");


$mail->Subject = $asunto;

$mail->Body = $mensaje;

//Para adjuntar archivo

$mail->AddAttachment($archivo, $archivo);

$mail->MsgHTML($mensaje);

  

//Avisar si fue enviado o no y dirigir al index

if($mail->Send())

{

    echo'<script type="text/javascript">

            alert("Enviado Correctamente");            

         </script>';

}

else{

    echo'<script type="text/javascript">

            alert("NO ENVIADO, intentar de nuevo");

         </script>';

}

 }

?>
<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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

    <div class="mid-header">

        <div class="container">

            <div class="row-fluid">

                <div class="span3">

                    <h1 class="main-logo">

                        <a href="index.php">

                            <img src="img/SARTORYlogo3.jpg" alt="Sartory">

                            

                        </a>

                    </h1>

                </div>

                <div class="span9">

                    <ul class="top-menu">

                    <li class="with-margin"><a class="azul" href="index.php"><h3 >REGRESAR</h3></a></li>

                    </ul>

                </div>

            </div>

            </div>

</header>

<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>



    <!-- Bootstrap and Font Awesome css -->

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    



    <!-- Css animations  -->

    <link href="css/animate.css" rel="stylesheet">



    <!-- Theme stylesheet, if possible do not edit this stylesheet -->

    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">



    <!-- Custom stylesheet - for your changes -->

    <link href="css/custom.css" rel="stylesheet">

 <div id="content">

            <div class="container" id="contact">



                <section>



                    <div class="row">

                    

                        <div class="col-md-12">

                            <section>

                                <div class="heading">

                                    <h2>ESTAMOS AQUÍ PARA AYUDARTE</h2>

                                </div>



                                <p class="lead"></p>

                            </section>

                        </div>

                    </div>



                </section>



                <section>



                    <div class="row">

                        <div class="col-md-4">

                            <div class="box-simple">

                                <div class="icon">

                                    <i class="fa fa-map-marker"></i>

                                </div>

                                <h3>Dirección</h3>

                                <p>Calle 52 Num.353-F x Calle 25 

                                    <br>Y Av. Pérez Ponce

                                    <br>Colonia Itzimná, Mérida Yucatán <strong>CP 97100</strong>

                                </p>

                            </div>

                            <!-- /.box-simple -->

                        </div>





                        <div class="col-md-4">



                            <div class="box-simple">

                                <div class="icon">

                                    <i class="fa fa-phone"></i>

                                </div>

                                <h3>Call center</h3>

                                <p class="text-muted">Contáctenos en el Celular y Whatsapp.</p>

                                <p><strong>(999)357-18-63</strong><!--<br/><strong>(999) 927 5857</strong>-->

                                </p>

                            </div>

                            <!-- /.box-simple -->



                        </div>



                        <div class="col-md-4">



                            <div class="box-simple">

                                <div class="icon">

                                    <i class="fa fa-envelope"></i>

                                </div>

                                <h3>Correo Electrónico</h3>

                                <p class="text-muted">Envíenos sus dudas o sugerencias.</p>

                                <ul class="list-style-none">

                                    <li><strong><a href="mailto:itzimna@hotmail.com">itzimna@hotmail.com</a></strong>

                                    </li>

                                </ul>

                            </div>

                            <!-- /.box-simple -->

                        </div>

                    </div>



                </section>



                <section>



                    <div class="row text-center">



                        <div class="col-md-12">

                            <div class="heading">

                                <h2>Formulario de contacto</h2>

                            </div>

                        </div>

                        <form action="" method="post">



                        <div class="col-md-8 col-md-offset-2">

                            <form>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label for="firstname">Nombre</label>

                                            <input type="text" class="form-control" id="firstname" name="nombre">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label for="email">Email</label>

                                            <input name="email" type="text" class="form-control" id="email">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label for="subject">Asunto</label>

                                            <input type="text" class="form-control" id="subject" name="asunto">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label for="subject">Telefono</label>

                                            <input type="text" name="telefono" class="form-control" id="subject">

                                        </div>

                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">

                                            <label for="message">Mensaje</label>

                                            <textarea id="message" class="form-control" name="mensaje"></textarea>

                                        </div>

                                    </div>



                                    <div class="col-sm-12 text-center">

                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Enviar mensaje</button>



                                    </div>

                                </div>

                                <!-- /.row -->

                            </form>







                        </div>

                    </div>

                    <!-- /.row -->



                </section>





            </div>

            <!-- /#contact.container -->

        </div>

        <!-- /#content -->



        <div >

<iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses-419!2smx!4v1459366708478!6m8!1m7!1sIcCv71PwdT3TN8_n2De2hw!2m2!1d20.98847962515664!2d-89.61162794786173!3f292.7263583008603!4f0!5f0.7820865974627469" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>

<!-- *** GET IT ***

_________________________________________________________ -->



        <div id="get-it">

            <div class="container">

                <div class="col-md-8 col-sm-12">

                    

                </div>

                <div class="col-md-4 col-sm-12">

                    

                </div>

            </div>

        </div>

<?php 

footer();

?>