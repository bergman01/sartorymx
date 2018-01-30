<?php
set_time_limit(300);


include_once("lib/conexion.php"); 



require_once("lib/dompdf/dompdf_config.inc.php");



$link=conectarse();

 $cotizado=1;
 if($_POST["gt"]=='on'){
                $gt=1;
            }

 $cambio=implode(',',$_POST['seleccion']);



 $destinatario=$_POST['destinatario'];

 $destinatario2 = $_POST['destinatario2'];



 if($destinatario == ''){

    $destinatario = $destinatario2;

 }



$empresa=$_POST['empresa'];

$contacto_empresa=$_POST['contacto_empresa'];

$email_empresa=$_POST['email_empresa'];

$celular_empresa=$_POST['celular_empresa'];



$saludo=$_POST['saludo'];



$condicion=$_POST['condicion'];

$tiempo_id =$_POST['tiempo_entrega'];

$despedida=$_POST['despedida'];



$cotizo=$_POST['cotizo'];



$nota=$_POST['nota'];



$puesto=$_POST['puesto'];



$telefono=$_POST['telefono'];



$email=$_POST['email'];



$id_cliente = $_POST['id_cliente'];



$codigo_cotizacion = $_POST['cc'];


$query_tiempo="select tiempo_entrega from tiempo_entrega where id_tiempo_entrega = $tiempo_id;";

$resultado_tiempo=mysql_query($query_tiempo, $link);

while($row_tiempo=mysql_fetch_array($resultado_tiempo)){
        $tiempo_ent = 'Tiempo de entrega '.$row_tiempo['tiempo_entrega'];
}


$query_select="select destinatario,empresa,contacto_empresa,email,celular,nota from clientes where id_clientes = $id_cliente;";

$resultado_select=mysql_query($query_select, $link);

while($row_select=mysql_fetch_array($resultado_select)){

        $empresa = $row_select['empresa'];

        $contacto_empresa = $row_select['contacto_empresa'];

        $email_empresa = $row_select['email'];

        $celular_empresa = $row_select['celular'];

        $destinatario = $row_select['destinatario'];
        $not = $row_select['nota'];
}



$tranx2="update cotizacion set envio=$cotizado,destinatario='$destinatario',empresa2='$empresa',contacto_empresa='$contacto_empresa',email_empresa='$email_empresa',celular_empresa='$celular_empresa',saludo='$saludo',despedida='$despedida',cotizado_por2='$cotizo',puesto='$puesto',celular='$celular',email='$email',condiciones='$condicion',notas='$nota' where idcotizacion IN (".$cambio.");";



$rtranx2=mysql_query($tranx2, $link);                 

                    if(!$rtranx2){

                        mysql_query("ROLLBACK");

                        $estatus="ERROR"; 

                    }else{

                        mysql_query("COMMIT");

                        $estatus="OK";

                    }

if($id_cliente !=''){

$tranx_update="update clientes set destinatario='$destinatario',empresa='$empresa',contacto_empresa='$contacto_empresa',email='$email_empresa',celular='$celular_empresa' where id_clientes = $id_cliente;";

$rtranx_update=mysql_query($tranx_update, $link);                 

                    if(!$rtranx_update){

                        mysql_query("ROLLBACK");

                        $estatus="ERROR"; 

                    }else{

                        mysql_query("COMMIT");

                        $estatus="OK";

                    }

}else{

    $tranx_insert="insert into clientes(destinatario,empresa,contacto_empresa,email,celular) values('$destinatario','$empresa','$contacto_empresa','$email_empresa','$celular_empresa');";

    $rtranx_insert=mysql_query($tranx_insert, $link);                 



                    if(!$rtranx_insert){

                        mysql_query("ROLLBACK");

                        $estatus="ERROR"; 

                    }else{

                        mysql_query("COMMIT");

                        $estatus="OK";

                    }

}



$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");



$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");



$fex="M&eacute;rida, Yucat&aacute;n a ".utf8_decode($dias[date('w')])." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;



$hora=$_POST['hora'];

 if($_POST["gt"]=='on'){
                $gt=1;
            }else{
                $gt=0;
            }

$destinatario=utf8_decode($destinatario);

$empresa=utf8_decode($empresa);

$contacto_empresa=utf8_decode($contacto_empresa);

$email_empresa=utf8_decode($email_empresa);

$celular_empresa=utf8_decode($celular_empresa);
$not = utf8_decode($not);

$saludo=utf8_decode($_POST['saludo']);

$condicion=utf8_decode($_POST['condicion']);

$tiempo_entrega =utf8_decode($tiempo_ent);

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



<title>Sartory Cotizaciones</title>
<link rel="shortcut icon" href="img/favico.png" type="image/x-icon">

<link rel="icon" href="img/favico.png" type="image/x-icon">



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



        <td><img src="../img/SARTORYlogo_.jpg" width="30%" heigth="30%" alt="Logo sartory"  title="Sartory | Promocionales"/></td>



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



    <td>'.$fex.'</td><td> Hora: '.date('h:i:s').'</td></tr>';



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
$codigoHTML.='<tr><td>Nota: '.$not.'</td></tr>';



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
                $idcotizacion = $row['idcotizacion'];



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

                $gran_total = $row['gran_total'];
                if($descuento == 1){
                    $pers = $unidad * $precio_persona;
                    $venta = $unidad * round($precio_venta,2);
                    $porcentaje = $descuento_valor/100;
                    $precio_descuento = $venta*$porcentaje;
                    $precio_descuento= round($precio_descuento,2);
                    $descuento = $venta-$precio_descuento;
                    $total_b = $descuento + $pers;

                }else{
                $venta = $unidad * round($precio_venta,2);
                $pers = $unidad * $precio_persona;
                $total_b = $venta + $pers;
            }



                $tranx="update cotizacion set total=$total_b where idcotizacion = $idcotizacion";
                $rtranx=mysql_query($tranx, $link);
                $idreg = mysql_insert_id($link);



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

$total_descuento = $sub1-$precio_descuento;



$codigoHTML.='<tr><td><strong>SUBTOTAL: </strong></td><td> $ '.number_format($sub1,2).'</td></tr>';

if($descuento == 1){

    $codigoHTML.='<tr><td><strong>DESCUENTO:</strong></td><td>($'.number_format($precio_descuento,2).') </td></tr>';

    $codigoHTML.='<tr><td><strong>TOTAL: </strong></td><td>$'.number_format($total_descuento,2).'</td></tr>';

}









//$totals=$total_descuento*1.16;

$total_neto = $total_descuento*1.16;

//$totals=$total_descuento*1.16;

$total_neto=round($total_neto,2);





$codigoHTML.='<tr><td><strong>TOTAL IVA INCLUIDO : </strong></td><td> $ '.number_format($total_neto,2) .'</td></tr>';







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





    $query3="Select SUM(total) as total from cotizacion where idcotizacion in (".$cambio.");";

      $resultado3=mysql_query($query3, $link);



            while($row3=mysql_fetch_array($resultado3)){

                $gran_total_neto=$row3['total'];

            }

            $gran_total_total = $gran_total_neto * 1.16;

            if($gt == 1){

$codigoHTML.="<table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>GRAN TOTAL IVA INCLUIDO:</strong></td><td>$ ".number_format(round($gran_total_total,2),2)."<td></tr></table>";
}









$codigoHTML.='<table style="padding-left:25px;" class="datos">';



$codigoHTML.='<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>



<tr><td></td></tr><tr><td></td></tr>';



$codigoHTML.='<tr><td>'.$despedida.'</td></tr>';



$codigoHTML.='<tr><td>Atte. </td></tr><tr><td></td></tr><tr><td>'.$cotizo.'</td></tr>';



$codigoHTML.='<tr><td>'.$puesto.'</td></tr><tr><td></td></tr>';



$codigoHTML.='<tr><td>'.$telefono.'<br/>'.$email.'</td></tr>';



$codigoHTML.='<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>';



$codigoHTML.='<tr><td>'.$condicion.' '.$tiempo_entrega.'</td></tr>';



$codigoHTML.='<tr><td>'.$nota.'</td></tr>';



$codigoHTML.='</table><br/><br/>';



$codigoHTML.='<table class="centrada"><tr><td class="centrada"><div aling="center"><img src="img/pie.png" width="100%" style="text-align:center"/></div></td></tr>';



$codigoHTML.='</table>



</body>



</html>';



//comentar



$codigoHTML=utf8_encode($codigoHTML);

$dompdf=new DOMPDF();



$dompdf->load_html($codigoHTML);



ini_set("memory_limit","128M");



$dompdf->render();



$dompdf->stream("Cotizacion.pdf", array("Attachment" => 0));

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