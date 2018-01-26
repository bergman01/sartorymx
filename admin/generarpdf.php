<?php

include_once("lib/conexion.php"); 

require_once("lib/dompdf/dompdf_config.inc.php");

$link=conectarse();

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fex="M&eacute;rida, Yucat&aacute;n a ".utf8_decode($dias[date('w')])." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

$hora=$_POST['hora'];
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

$codigoHTML.='

</table>

<br/>

<table width="600" height="402" class="centrada" style="padding-left:25px;" >';



                            $categoria=$_POST['categoria'];

                            $etiqueta= $_POST['etiqueta'];

                            $proveedor=$_POST['proveedor'];

                            if($categoria != ''){
                            $query="Select * from articulos where categoria ='".$categoria."';";
                        }
                        if($proveedor != ''){
                             $query="Select * from articulos where id_proveedor ='".$proveedor."';";
                        }
                        if($categoria != '' && $proveedor != ''){
                             $query="Select * from articulos where categoria ='".$categoria."' and id_proveedor ='".$proveedor."';";
                        }




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

$codigoHTML.='<tr>';

$query2="Select imagen from articulos where id_articulo=$id_articulo;";

$resultado2=mysql_query($query2, $link);

            while($row2=mysql_fetch_array($resultado2)){

$codigoHTML.='<td width="151" HEIGHT="150px"><img src="../articulos/'.$row2[0].'" width="150" height="150"/></td>';

}

$codigoHTML.='<td>';

//$codigoHTML.='';

$codigoHTML.='<table><tr><td>'.$nombre.'</td></tr>';

$codigoHTML.='<tr><td> $ '.round($precio_venta,2).'</td></tr>';
$codigoHTML.='</table>';
$codigoHTML.='</td>';

$codigoHTML.='</tr>';

}

$codigoHTML.='</table>';

$codigoHTML.='<table class="centrada"><tr><td class="centrada"><div aling="center"><img src="img/pie.png" style="text-align:center"/></div></td></tr>';

$codigoHTML.='</table>

</body>

</html>';



$codigoHTML=utf8_encode($codigoHTML);

$dompdf=new DOMPDF();

$dompdf->load_html($codigoHTML);

ini_set("memory_limit","850M"); 

set_time_limit('1000'); 

$dompdf->render();

$dompdf->stream("lista_articulos.pdf");

?>