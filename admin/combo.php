
<script language="javascript" src="js/jquery-1.2.6.min.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#category").change(function () {
           $("#category option:selected").each(function () {
            id_category = $(this).val();
            $.post("clientes.php", { id_category: id_category }, function(data){
                $("#subcategory").html(data);
            });            
        });
   })
});
</script>

<select class="form-control" name="proveedor" id="proveedor">

                                     <option value="">Seleccionar Proveedor</option>

   		<?php

		include_once("lib/conexion.php");

		$link=conectarse();

		

		$query="SELECT id_clientes,destinatario FROM clientes";

		

        $resultado=mysql_query($query, $link);



		while($row=mysql_fetch_array($resultado)){



			?>

	     <option  value="<? echo html_entity_decode($row[0], ENT_QUOTES); ?>" <?php if($row[0] == 2){ echo 'selected="selected"';} ?><?php echo html_entity_decode($row[1], ENT_QUOTES); ?>></option>

         <?php } ?>

         </select>
   <div id="subcategory">
   	
   </div>

