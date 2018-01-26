<?php
include_once("lib/conexion.php"); 


$link=conectarse();


$categoria = 34;//implode(',',$_POST["categoria"]);

$etiqueta= $_POST['etiqueta'];

$proveedor=2;//implode(',',$_POST["proveedor"]);

$ordenar = 2;

$codigoHtml='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<style type="text/css">

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
<body>';
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacutebado");



$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");



$fex="<br\><br\><br\><br\><br\>M&eacute;rida, Yucat&aacute;n a ".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

$codigoHtml.='<table class="centrada">
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;"><img src="img/LOGO_SARTORY.png" width="50%" heigth="50%" alt="Logo sartory"  title="Sartory | Promocionales"/><br/><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br/><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\>'.$fex.'</td>';
    $codigoHtml.='</tr>
    </table>
<br/><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\><br\>
    <table class="centrada" ><tr>';
                            if($ordenar == 0){

                              $orden='order by nombre asc';

                            }

                            if($ordenar == 1){

                              $orden='order by nombre asc';

                            }

                            if($ordenar == 2){

                              $orden='order by ROUND(precio_venta,2) asc';                              

                            }

                            if($ordenar == 3){

                              $orden='order by ROUND(precio_venta,2) desc';                              

                            }

                            if($ordenar == 4){

                              $orden='order by codigo asc,round(precio_venta,2) asc';                              

                            }

                            if($ordenar == 5){

                              $orden='order by codigo asc,nombre asc';                              

                            }

                            if($categoria != ''){

                            $query="Select * from articulos where categoria in (".$categoria.") and estatus=1 ".$orden.";";

                        }

                        if($proveedor != ''){

                             $query="Select * from articulos where id_proveedor in (".$proveedor.") and estatus=1 ".$orden.";";

                        }

                        if($categoria != '' && $proveedor != ''){

                             $query="Select * from articulos where categoria in(".$categoria.") and id_proveedor in(".$proveedor.") and estatus=1 ".$orden.";";

                        }

                            //$query="Select * from cotizacion where usuario='$usuario' and estatus=2 and fecha='$fecha';";



                           $resultado=mysql_query($query, $link);

                           $columna=1;



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

                $imagen=$row['imagen'];

                if ($columna<=3){ // Si es la primer columna abro una fila 
      $codigoHtml.='<td style="text-align: center;">';

            $codigoHtml.='<img src="../articulos/'.$imagen.'" height="150" width="150"><br/>';

            $codigoHtml.='<strong>'.$nombre.'</strong><br/>';

            $codigoHtml.=$codigo.'<br/><strong><span style="color: #FE0000">$'.round($precio_venta,2).'</span></strong></td>';

      $columna++;  // Incremento el contador 

   } 

if ($columna==4){ // Si es diferente a 1 es porque ya despleguó la 2da columna 

    $codigoHtml.='</tr>';
    $columna=1;   // Vuelvo al valor original el contador 

   } 
}
$codigoHtml.='</table>';
$codigoHtml.='<table class="centrada"><tr><td colspan="3" style="text-align: center;"><h4>* PRECIOS ANTES DE IVA SIN PERSONALIZAR</h4></td></tr></table>';
$codigoHtml.='<table class="centrada"><tr><td class="centrada"><div aling="center"><img src="img/pie.png" style="text-align:center;width: 635px"/></div></td></tr></table>
</body>
</html>';
require_once("lib/dompdf/dompdf_config.inc.php");
$codigoHTML=utf8_encode($codigoHtml);
//echo $codigoHTML;
$dompdf=new DOMPDF();



$dompdf->load_html($codigoHTML);



ini_set("memory_limit","128M");



$dompdf->render();



$dompdf->stream("Cotizacion.pdf", array("Attachment" => 0));