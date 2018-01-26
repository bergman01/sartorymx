<?php

include_once("lib/template.php");

$user=$_SESSION['admin_user'];

cabezal();?>

<style>

#contenido {

   overflow:hidden;

    white-space:nowrap;

    text-overflow: ellipsis;

}

.side-nav {

    top: 99px !important;

}

div:hover {

  color: #47a447;

}

</style>

<?php body();?>

<div id="page-wrapper">



        <div class="row">

          <div class="col-lg-12 col-sm-11 col-md-8 col-xs-14">

            <h1 style="color:#FE0000;text-align: center;">PANEL DE CONTROL</h1>

            <br/>         

          </div>

        </div>

        <div class="row">

<div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="../index.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Ir al Catalogo</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php $busca = explode(',', $permiso); if (in_array(2,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_articulos.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">
                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-picture-o fa-3x"> Artículos</i>

                  </div>

                 

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>

          <?php $busca = explode(',', $permiso); if (in_array(5,$busca)==TRUE) {  ?>

<div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_banners.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-file-o fa-3x"> Banners</i>

                  </div>

                 

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                    </div>

                  </div>

                </div>

              </div>

              </a>

          </div>

          <?php }?>
        <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(1,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="usuarios.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Administradores</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>

          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(1,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="admin.subir.archivo.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Catálogos PDF</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>

          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(6,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_categorias.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Categorias</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>
          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(11,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_categorias_masivo.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Categorias multiples</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>
          <?php $busca = explode(',', $permiso); if (in_array(4,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_cotizacion.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-book fa-3x"> Cotizaciones</i>

                  </div>

                 

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                    </div>

                  </div>

                </div>

              </div>

              </a>

          </div>

          <?php }?>
          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(13,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_clientes.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Clientes</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>
          <?php $busca = explode(',', $permiso); if (in_array(14,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_categorias_master.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-outdent fa-3x"> Divisiones</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                    </div>

                  </div>

                </div>

             </div>

            </a>

          </div>

          <?php }?>

          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(12,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_eliminacion.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Eliminación</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>

          <?php $busca = explode(',', $permiso); if (in_array(3,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_precios.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-outdent fa-3x"> Listas de Precios</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                    </div>

                  </div>

                </div>

             </div>

            </a>

          </div>

          <?php }?>
          

<?php $busca = explode(',', $permiso); if (in_array(16,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_cancelaciones.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-outdent fa-3x"> No concretadas</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                    </div>

                  </div>

                </div>

             </div>

            </a>

          </div>

          <?php }?>
          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(9,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_personalizacion.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Personalización</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>

          
          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(7,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_proveedores.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Proveedores</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>
          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(10,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_tag.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Tags</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>

          <?php $busca = explode(',', $permiso); if (in_array(15,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="filtro_ventas.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-outdent fa-3x"> Ventas</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                    </div>

                  </div>

                </div>

             </div>

            </a>

          </div>

          <?php }?>
          <?php $permiso=$_SESSION['permiso'];

           $busca = explode(',', $permiso); if (in_array(1,$busca)==TRUE) {  ?>

          <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

          <a href="visitantes.php">

            <div class="panel panel-info" id="contenido">

              <div class="panel-heading">

                <div class="row">

                  <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                    <i class="fa fa-bookmark fa-3x"> Visitantes</i>

                  </div>

                  

                </div>

              </div>

              

                <div class="panel-footer announcement-bottom">

                  <div class="row">

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4">

                      

                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 col-xs-4 text-right">

                      

                    </div>

                  </div>

                </div>

              

            </div>

            </a>

          </div>

          <?php }?>
          <!--<script src="//code.tidio.co/sgby1uudlawajpdzs2yvfszlkk18egw2.js"></script>-->
         <!--Start of Tawk.to Script-->
<!--<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57f3e1a40814cc34e17db4eb/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>-->
<!--End of Tawk.to Script-->
         </div>
<?php footer();?>