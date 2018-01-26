<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
</head>
<body>
  <form>
    <div id="container">
      <div id="content">

      <div class="side-by-side clearfix">
        <?php mysql_connect("45.40.164.16","sartory","S4RT0Ry#"); mysql_select_db("sartory"); ?>

        <div>
          <em>Select option with DB using autocomplete</em>
          <select data-placeholder="Choose a Country..." class="chosen-select" style="width:350px;" tabindex="2">
            <option value=""></option>
            <?php $sorgug = mysql_query("SELECT * FROM clientes order by id_clientes asc");
                while( $yyy = mysql_fetch_array($sorgug)){
            ?>
                <option value="<?php echo $yyy["id_clientes"]; ?>"><?php echo $yyy["destinatario"]; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  </form>

</body>
</html>