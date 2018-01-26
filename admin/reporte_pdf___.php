<?php

include_once("lib/conexion.php"); 

require_once("lib/dompdf/dompdf_config.inc.php");

$link=conectarse();
 $cotizado=1;
 $cambio=implode(',',$_POST['seleccion']);

 $destinatario=$_POST['destinatario'];

$empresa=$_POST['empresa'];
$contacto_empresa=$_POST['contacto_empresa'];
$email_empresa=$_POST['email_empresa'];
$celular_empresa=$_POST['celular_empresa'];

$saludo=$_POST['saludo'];

$condicion=$_POST['condicion'];

$despedida=$_POST['despedida'];

$cotizo=$_POST['cotizo'];

$nota=$_POST['nota'];

$puesto=$_POST['puesto'];

$telefono=$_POST['telefono'];

$email=$_POST['email'];

$tranx2="update cotizacion set envio=$cotizado,destinatario='$destinatario',empresa2='$empresa',contacto_empresa='$contacto_empresa',email_empresa='$email_empresa',celular_empresa='$celular_empresa',saludo='$saludo',despedida='$despedida',cotizado_por2='$cotizo',puesto='$puesto',celular='$celular',email='$email',condiciones='$condicion',notas='$nota' where idcotizacion IN (".$cambio.");";

$rtranx2=mysql_query($tranx2, $link);                 

                    if(!$rtranx2){



                        mysql_query("ROLLBACK");

                        $estatus="ERROR"; }



                    else{



                        mysql_query("COMMIT");



                        $estatus="OK";



                    }

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fex="M&eacute;rida, Yucat&aacute;n a ".utf8_decode($dias[date('w')])." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

$hora=$_POST['hora'];

$destinatario=utf8_decode($_POST['destinatario']);

$empresa=utf8_decode($_POST['empresa']);
$contacto_empresa=utf8_decode($_POST['contacto_empresa']);
$email_empresa=utf8_decode($_POST['email_empresa']);
$celular_empresa=utf8_decode($_POST['celular_empresa']);

$saludo=utf8_decode($_POST['saludo']);

$condicion=utf8_decode($_POST['condicion']);

$despedida=utf8_decode($_POST['despedida']);

$cotizo=utf8_decode($_POST['cotizo']);

$nota=utf8_decode($_POST['nota']);

$puesto=utf8_decode($_POST['puesto']);

$telefono=utf8_decode($_POST['telefono']);

$email=utf8_decode($_POST['email']);
$codigoHTML='



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Documento sin título</title>

<style>

body {

    font-family: "Helvetica";

    font-size:11px;

}

table.centrada { 

margin-right:auto; 

margin-left:auto; 

} 

table.datos{

font-size:12px;

}



</style>

</head>



<body>

<table class="centrada">

    <tr>

        <td></td>

        <td><img src="img/LOGO_SARTORY.png" width="50%" heigth="50%" alt="Logo sartory"  title="Sartory | Promocionales"/></td>

        <td></td>

    </tr>

    </table>

    <table style="padding-left:25px;" class="datos">

    <tr>

    <td></td>

    </tr>

    <tr>

    <td></td>

    </tr>';

    $codigoHTML.='<tr>

    <td>'.$fex.'</td></tr>';

    //$codigoHTML.='<td>'.$fex.'</td></tr><tr>';

    /*$usuario=$_GET['us'];

    $fecha= $_GET['f'];

                           $query6="Select * from registro where usuario='$usuario';";

                           $resultado6=mysql_query($query6, $link);

            while($row6=mysql_fetch_array($resultado6)){

                $nom2=$row6['nombres'];

                $ape2=$row6['apellidos'];

                $empresa=$row6['empresa'];

            }*/





$codigoHTML.='<tr><td>'.$destinatario.'<br/>'.$empresa.'</td></tr><tr><td></td></tr>';
$codigoHTML.='<tr><td>'.$contacto_empresa.'</td></tr>';
$codigoHTML.='<tr><td>'.$email_empresa.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$celular_empresa.'</td></tr>';

$codigoHTML.='<tr><td>'.$saludo.'</td></tr>

<tr><td></td></tr><tr><td></td></tr>';

//$codigoHTML.='</tr>';

$codigoHTML.='

</table>

<br/>

<table width="600" height="402" class="centrada" style="padding-left:25px;" >';



                            $usuario=$_POST['usuario'];

                            $fecha= $_POST['fecha'];

                            $cambio=implode(',',$_POST['seleccion']);



                            $query="Select * from cotizacion where idcotizacion IN (".$cambio.");";



                            //$query="Select * from cotizacion where usuario='$usuario' and estatus=2 and fecha='$fecha';";

                           $resultado=mysql_query($query, $link);

            while($row=mysql_fetch_array($resultado)){



                $id_articulo=$row['id_articulo'];

                $unidad=$row['unidad'];

                $color=$row['color'];

                $nombre=html_entity_decode($row['nombre'],ENT_QUOTES);

                $codigo=$row['codigo'];

                $precio_venta=$row['precio_venta'];

                $personalizacion=utf8_decode($row['persona']);

                $precio_persona=$row['precio_persona'];
                $nota_personalizacion = $row['notas_personalizacion'];
                $descuento_valor = $row['descuento_valor'];
                $gran_total = $row['gran_total'];
                $descuento = $row['descuento'];

$codigoHTML.='<tr>';

$query2="Select imagen from articulos where id_articulo=$id_articulo;";

$resultado2=mysql_query($query2, $link);

            while($row2=mysql_fetch_array($resultado2)){

$codigoHTML.='<td width="151" HEIGHT="150px"><img src="../articulos/'.$row2[0].'" width="150" height="150"/></td>';

}

$codigoHTML.='<td>';

//$codigoHTML.='';

$codigoHTML.='<table><tr><td><strong>ARTICULO:</strong></td><td>'.$nombre.' - '.$codigo.'</td></tr>';

$codigoHTML.='<tr><td><strong>COLOR: </strong></td><td>'.$color.'</td></tr>';

$codigoHTML.='<tr><td><strong>PERSONALIZADO: </strong></td><td> '.$personalizacion.'&nbsp;&nbsp;&nbsp;&nbsp;'.$nota_personalizacion.'</td></tr>';

$sub2=$precio_persona+$precio_venta;

$codigoHTML.='<tr><td><strong>CANTIDAD: </strong></td><td> '.$unidad.'</td></tr>';

$codigoHTML.='<tr><td><strong>PRECIO UNITARIO: </strong></td><td> $ '.$sub2.'</td></tr>';

$sub1=$sub2*$unidad;
$sub3 = $precio_venta*$unidad;
//$descuento_aplica = number_format($sub1*($descuento_valor/100),2);
$porcentaje = $descuento_valor/100;
$precio_descuento = $sub3*$porcentaje;
$precio_descuento= round($precio_descuento,2);

$codigoHTML.='<tr><td><strong>SUBTOTAL: </strong></td><td> $ '.$sub1.'</td></tr>';
if($descuento == 1){
    $codigoHTML.='<tr><td><strong>DESCUENTO:</strong></td><td>'.$descuento_valor.'% </td></tr>';
}
$total_descuento = $sub1-$precio_descuento;
$codigoHTML.='<tr><td><strong>TOTAL: </strong></td><td>'.$total_descuento.'</td></tr>';


//$totals=$total_descuento*1.16;
$total_neto = $total_descuento*1.16;
//$totals=$total_descuento*1.16;
$total_neto=round($total_neto,2);


$codigoHTML.='<tr><td><strong>TOTAL NETO : </strong></td><td> $ '.$total_neto.'</td></tr>';

$codigoHTML.='</table>';

//$codigoHTML.='<li><strong>Costo unitario personalizaci&oacute;n: </strong> $ '.$precio_persona.'</li>';

//$codigoHTML.='</tr> <br/>';

//$codigoHTML.='<strong>PRECIOS MAS IVA</strong>';

$sub3 = $sub1+$sub2;

//$codigoHTML.='<strong>Subtotal unidades:</strong> $ '.$sub1.'<br/>';

//$codigoHTML.='<strong> unidad/personalizado</strong> $ '.$sub2.' + iva.<br/>';

//$codigoHTML.='<strong>Subtotal: </strong> $ '.$sub3.'.' ;

$codigoHTML.='</td>';

$codigoHTML.='</tr>';

}

$codigoHTML.='</table>';

$codigoHTML.='<table style="padding-left:25px;" class="datos">';

$codigoHTML.='<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

<tr><td></td></tr><tr><td></td></tr>';

$codigoHTML.='<tr><td>'.$despedida.'</td></tr>';

$codigoHTML.='<tr><td>Atte. </td></tr><tr><td></td></tr><tr><td>'.$cotizo.'</td></tr>';

$codigoHTML.='<tr><td>'.$puesto.'</td></tr><tr><td></td></tr>';

$codigoHTML.='<tr><td>'.$telefono.'<br/>'.$email.'</td></tr>';

$codigoHTML.='<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>';

$codigoHTML.='<tr><td>'.$condicion.'</td></tr>';

$codigoHTML.='<tr><td>'.$nota.'</td></tr>';

$codigoHTML.='</table><br/><br/>';

$codigoHTML.='<table class="centrada"><tr><td class="centrada"><div aling="center"><img src="img/pie.png" style="text-align:center"/></div></td></tr>';

$codigoHTML.='</table>

</body>

</html>';

//comentar

$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();

$dompdf->load_html($codigoHTML);

ini_set("memory_limit","128M");

$dompdf->render();

$dompdf->stream("Cotizacion.pdf");
/*

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

$correo->SetFrom("noreply@sartory.mx", "SARTORY Cotizaciones-".$cotizo."");
$correo->AddAddress("santiago@sartory.mx", "Ventas Sartory");
$correo->AddBCC("bergman.pereira.novelo@gmail.com","Cotizaciones");
//$correo->AddBCC("tania@sartory.mx","Ventas Sartory");

$correo->Subject = "Cotizacion de ".$cotizo;



$correo->Body = $codigoHTML;

//Para adjuntar archivo

//$mail->AddAttachment($archivo, $archivo);

$correo->MsgHTML($codigoHTML);

  

//Avisar si fue enviado o no y dirigir al index

if($correo->Send())

{

    

    $dompdf=new DOMPDF();

$dompdf->load_html($codigoHTML);

ini_set("memory_limit","128M");

$dompdf->render();

$dompdf->stream("Cotizacion.pdf");

}

else{

    echo'<script type="text/javascript">

            alert("NO ENVIADO, intentar de nuevo");

         </script>';

}
*/


?>