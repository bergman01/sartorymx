<?php 
error_reporting();
include_once("lib/template.php");
	

	$membership = new loginActions();

	$membership->confirm_Member2();

	

//	include_once("librerias/rutas.php");

	cabezal();
 ?>

<style>

.fila_par{

	background-color:#FFFFFF;

}

.fila_impar{

	background-color:#E5E5E5;

}

.new_row{

	background:#FFFFCC;

}

.tabla_encabezado {

	background-color:#D1D1D1;

	color:#000000;

	font-family:'Arial';

	font-size:11px;

	font-weight:bold;

}



#modTitle{

	font-family:Verdana, Arial, Helvetica, sans-serif; 

	font-weight:bold;

}





#msgContainer{

	padding-top:10px;

	padding-bottom:10px;

	text-align:center;

	font-family:Verdana, Arial, Helvetica, sans-serif;

	font-size:12px;

	width:100%;

}



#msgContainer a{

	text-decoration:none;

	color:#0066FF;

}




div.saved{

	background:#99FF99;

	border-top:1px solid #339900;

	border-bottom:1px solid #339900;

}



div.error{

	background:#FFCCCC;

	border-top:1px solid #FF3366;

	border-bottom:1px solid #FF3366;

}
.form-control{
	width:auto;
}

ul{
  
  margin-bottom:20px;
  border-top:1px solid #ccc;
}
#li{
  line-height:1.5em;
  border-bottom:1px solid #ccc;
  float:left;
  display:inline;
}
#double li  { width:50%;} <span class="code-comment">/* 2 col */</span>
#triple li  { width:33.333%; } <span class="code-comment">/* 3 col */</span>
#quad li    { width:25%; } <span class="code-comment">/* 4 col */</span>
#six li     { width:16.666%; } <span class="code-comment">/* 6 col */</span>


</style>

<link rel="stylesheet" type="text/css" href="css/rounded_borders.css">


<script language="javascript" src="js/jquery-1.2.6.min.js" type="text/javascript"></script>

<script language="javascript" src="js/get2post.js" type="text/javascript"></script>

<script language="javascript">
function fEliminarSeccion(idseccion){
	if (confirm("¿Está seguro de querer eliminar esta seccion?"))
		$(".InfoBarContent").load("eliminar_doc.php",{t:'del',ids:idseccion, prmsection:2 ,rnd:Math.random()});
}


function pregunta(){ 
    if (confirm('¿Está seguro de querer eliminar este ddepartamento?')){ 
       document.v.submit() 
    } 
} 
function confirmar ( mensaje ) { 
return confirm( mensaje ); 
} 

//<![CDATA[
function selecto(){
var marca = document.getElementById('marcar2');
var cb = document.getElementsByName('seleccion[]');
 
for (i=0; i<cb.length; i++){
if(marca.checked == true){
cb[i].checked = true
}else{
cb[i].checked = false;
}
}
 
}
//]]>

</script>
<?	



   body();?>
   
            <div id="page-wrapper">
            <div class="row">

          <div class="col-lg-10">

            <h2 style="color:#FE0000;text-align: center;">ADMINISTRADOR DE CATEGORIAS MULTIPLES</h2>

          </div>

        </div>


            <div class="table-responsive">
            <form action="" method="post"> 
             <h2>Buscador</h2>
             <table class="table table-bordered table-hover table-striped tablesorter">
            	<tr>
             		<td>Codigo </td> <td><input type="text" name="codigo"></td>
             		<td>Nombre </td> <td><input type="text" name="palabra"></td>
             		<td>Precio</td><td><span>
             		<select name="operador">
             		<option value="">Seleccionar</option>
             		<option value="=">Igual a</option>
             		<option value="<=">Menor a</option>
             		<option value=">=">Mayor a</option>
             		</select></span ><input type="text" name="precio"></td>
            		<td>Categoria </td><td> <select class="form-control" name="categoria" id="categoria">
                                     <option value="">Seleccionar Categoria</option>
   		<?php
		$link=conectarse();
		
		$query="SELECT id_categoria,categoria FROM categorias where estatus = 1 order by categoria asc";
		
        $resultado=mysql_query($query, $link);

		while($row=mysql_fetch_array($resultado)){

			?>
	     <option  value="<? echo html_entity_decode($row[0], ENT_QUOTES); ?>" <?php if($categoria == $row[0]){ echo 'selected="selected"';} ?> ><?php echo html_entity_decode($row[1], ENT_QUOTES); ?></option>
         <?php } ?>
         </select></td>
         <td>Proveedor</td>
         <td> <select class="form-control" name="proveedor" id="categoria">
                                     <option value="">Seleccionar Proveedor</option>
   		<?php
		$link=conectarse();
		
		$query="SELECT id_proveedor,nombre FROM proveedores where estatus = 1 order by nombre asc";
		
        $resultado=mysql_query($query, $link);

		while($row=mysql_fetch_array($resultado)){

			?>
	     <option  value="<? echo html_entity_decode($row[0], ENT_QUOTES); ?>" <?php if($categoria == $row[0]){ echo 'selected="selected"';} ?> ><?php echo html_entity_decode($row[1], ENT_QUOTES); ?></option>
         <?php } ?>
         </select></td>
         <td><input type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Buscar"></td>
            	</tr>
            </table>
            </form>

             <form action="" method="post">
             <h2>Cambios Selección multiple</h2>
              <table class="table table-bordered table-hover table-striped tablesorter">
            	<tr>
            		<td>Categorias<input type="hidden" name="opcion1" value="1"> </td>
            		<td><ul id='double'>
   		<?php
		$link=conectarse();
		
		$query="SELECT * FROM categorias where estatus = 1";
		
        $resultado=mysql_query($query, $link);

		while($row=mysql_fetch_array($resultado)){

			?>
	     <li id="li"><input type="checkbox" name="tipo[]"  value="<?php echo $row[0];?>"> <?php echo html_entity_decode($row[1],ENT_QUOTES);?></li>
         <?php } ?>
         </ul></td>
         <td><input type="submit" class="btn btn-primary" onClick="this.form.action='actualizar_categoria.php';this.form.submit()" name="guardar" id="guardar" value="Agregar Categorias"></td>
         <td><input type="submit" class="btn btn-primary" onClick="this.form.action='revertir_categorias.php';this.form.submit()" name="guardar" id="guardar" value="Revertir Asignación"></td>
            	</tr>
            </table>
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                  	<td><input type="checkbox" id="marcar2" onclick="selecto();" value=""></td>
                  	
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                    <th>Precio Venta</th>
                    <th>Ver Publicación</th>
                    <th>Personalizado</th>
                    <th>Estatus</th>
                  </tr>
                </thead>
                <tbody>
                <?
							$link=conectarse_servicios();
							$codigo=$_POST['codigo'];
							$categoria=$_POST['categoria'];
							$proveedor=$_POST['proveedor'];
							$palabra=$_POST['palabra'];
							$precio=$_POST['precio'];
							$operador=$_POST['operador'];
							$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,a.categoria as idcat,p.id_proveedor,p.nombre as proveedor FROM articulos a, proveedores p,categorias c where a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							if($codigo != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.codigo like '%$codigo%' and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							}
							if($codigo != '' && $categolria != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.codigo like '%$codigo%' and a.categoria=$categoria and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							} 
							if($precio != '' && $operador != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.precio_venta $operador round('$precio', 2) and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							}
								if($palabra != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.nombre like '%$palabra%' and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							}
							if($categoria != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.categoria=$categoria and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							}
							if($proveedor != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.id_proveedor = $proveedor and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							}
							if($proveedor != '' && $categoria != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.id_proveedor = $proveedor and a.categoria=$categoria and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							}
							if($precio != '' && $categoria != ''){
								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.precio_venta <= round('$precio', 2) and FIND_IN_SET('$categoria', a.categoria) and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
							
							}
							if($proveedor != '' && $precio != ''){

								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.categoria as idcat,a.nombre,a.agotado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria FROM articulos a, proveedores p,categorias c where a.id_proveedor = $proveedor and a.precio_venta <= round('$precio', 2) and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";

							

							}
							if($proveedor != '' && $palabra != ''){

								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.categoria as idcat,a.nombre,a.agotado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria FROM articulos a, proveedores p,categorias c where a.id_proveedor = $proveedor and a.nombre like '%$palabra%' and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";

							

							}
							if($categoria ='' && $proveedor='' && $codigo=''){
							$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.id_proveedor = p.id_proveedor  and a.categoria=c.id_categoria and a.estatus = 1 order by a.id_articulo Asc;";
						}
						if($categoria ='' && $proveedor='' && $precio=''){
							$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.personalizado,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria,a.categoria as idcat FROM articulos a, proveedores p,categorias c where a.id_proveedor = $proveedor  and FIND_IN_SET('$categoria', a.categoria) and a.precio_venta <= round('$precio', 2) and a.estatus = 1 order by a.id_articulo Asc;";
						}

							$resultado=mysql_query($query, $link);
							//echo $resultado;

							$icont=0;
							$class='success';
							
									

							if(mysql_num_rows($resultado)>0){

								while($row = mysql_fetch_array($resultado)){ 

									$icont++;
									if($class=='success'){
								$class='active';
								}else{
									$class='success';
								}

									$laclase=($icont%2==0?"fila_par":"fila_impar");

									$imagen='no_publicado.gif';
									$visible='no_publicado.gif';
									

									if($row['estatus']==1){

										$imagen='publicado.gif';

									}
										if($row['precio_publicado']==1){

										$visible='publicado.gif';

									}
									if($imagen=='no_publicado.gif'){
										$class='danger';
									}
									


								?>
                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">

                  <td><input type="checkbox" name="seleccion[]" value="<?php echo $row['id_articulo']; ?>" requerit><?php echo $row['id_articulo']; ?></td>
                   
                    <td><? echo html_entity_decode($row['codigo'], ENT_QUOTES); ?></td>
                    <td><? echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></td>
                    <td><?php  $query2="select * from categorias where id_categoria in(".$row['idcat'].");";
									$resultado2=mysql_query($query2, $link);
									if(mysql_num_rows($resultado2)>0){

								while($row2 = mysql_fetch_array($resultado2)){
                                    
									echo $persona=html_entity_decode($row2[1], ENT_QUOTES).'-'; 
                                    }
									}?></td>
                    <td><? echo html_entity_decode($row['proveedor'], ENT_QUOTES); ?></td>
                    <td><? echo round($row['precio_venta'], 2); ?></td>
                    <td><a href="../detalle.php?id=<?php echo $row['id_articulo']; ?>" target="_blank">Ver Articulo</td>
                    <td><?php  $query2="select * from personalizacion where idpersonalizacion in(".$row['personalizado'].");";
									$resultado2=mysql_query($query2, $link);
									if(mysql_num_rows($resultado2)>0){

								while($row2 = mysql_fetch_array($resultado2)){
                                    
									echo $persona=html_entity_decode($row2[1], ENT_QUOTES).'-'; 
                                    }
									}?></td> 

                    
                    <td><img src="img/<? echo $imagen; ?>" border="0" /></td>
                  </tr>
                  <?
                  }
                  }

							?>
                            
                </tbody>
              </table>
              <? if(mysql_num_rows($resultado) <= 0){?>
         <h1 style="text-align:center;" class="danger">No hay Artículos por el momento</h1>
         <?php }?>
            </div>
            </div>
            <?php footer(); ?>
         
