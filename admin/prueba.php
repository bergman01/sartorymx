<?php
require_once("phpAutocomplete_Lite/conf.php");
include_once("lib/conexion.php");
$link = conectarse();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP Autocomplete - Existing Select Element (Single)</title>
</head>
<body>

<h2>Existing Select Element (Single)</h2>
<?php
$pac2 = new C_PhpAutocomplete('foobar');
$pac2->display('SELECT');

?>
<select name="tiempo_entrega" id="foobar" style="float: left;">



      <?php

    $query="SELECT id_tiempo_entrega,tiempo_entrega FROM tiempo_entrega order by id_tiempo_entrega asc";

    $resultado=mysql_query($query, $link);

    while($row=mysql_fetch_array($resultado)){

      ?>



       <option  value="<? echo $row[0]; ?>" <?php if($row[0] == 4){ echo 'selected="selected"';}?>?><?php echo $row[1]; ?> </option>



         <?php } ?>



         </select>
<!--<select id="foobar">
    <option></option>
    <option id="1">Apple1</option>
    <option id="2">Google</option>
    <option id="3">Microsoft</option>
    <option id="4">Facebook</option>
    <option id="5">Twitter</option>
</select>-->



<div id="bottom" style="position:fixed;bottom: 0;width:98%;text-align: right">
    <a href="http://phpautocomplete.com">phpautocomplete.com</a> &copy; All rights reserved
</div>
</body>
</html>
