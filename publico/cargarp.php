<?php 
  include '../privado/procesos/conexion.php';
  include '../privado/procesos/lifetime.php';
  if (trim($_GET['nombre'])) {
    $nombrepr = $_GET['nombre'];
    $valido = "SELECT * FROM tipos_producto WHERE nombre_tipo_producto=? AND estado_tipo_producto=1";
    $stmtex = $con->prepare($valido);
    $stmtex->execute(array($nombrepr));
    if (!$stmtex->fetch(PDO::FETCH_BOTH)) {
      header('Location: error.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Punto Print - Soluciones en impresiones</title>
  <!--Aqui incluyo los links de estilo, los links en general-->
  <?php include 'links.php' ?>
</head>
<body>
  <!--Aqui incluyo el menú-->
    <?php include 'menu.php' ?>
    <br>
    <br>
    <!--CREO EL HADER DE LA PAGINA-->
    <div class="uk-width-1-1 banners">
      <h1 class="titulos titulos-sublim uk-text-center"><?php  echo $nombrepr;?></h1>
    </div>
    <!--CONTENEDOR DE LA INFORMACION-->
    <br>
    <br>
    <?php
    /* 
      $id_max = 0;
      $descripcion = "";
      $foto_producto = "";
      $pt_mx = 0;
      $producto = "";
      $productoa = array();
      $calificacion_promedio = 0;
      $puntuacion_max = "SELECT max(c.calificacion) from comentarios c";
      $stmt = $con->prepare($puntuacion_max);
      $stmt->execute(array());
      while ($ptmx = $stmt->fetch(PDO::FETCH_BOTH)){
        $pt_mx = $ptmx[0];
      }
      if($pt_mx != null){
        $maximo = "SELECT p.id_producto FROM productos p INNER JOIN comentarios c ON p.id_producto = c.id_producto WHERE p.id_tipo_producto=? AND c.calificacion = ? LIMIT 1";
        $stmt = $con->prepare($maximo);
        $stmt->execute(array(1,$pt_mx));
        $producto = "SELECT p.nombre_producto, p.descripcion_producto, ROUND(AVG(c.calificacion),1),f.foto_producto FROM (productos p INNER JOIN fotos_productos f ON f.id_producto = p.id_producto) INNER JOIN comentarios c ON c.id_producto = p.id_producto WHERE p.id_producto=?";
      }else{
        $maximo = "SELECT p.id_producto FROM productos p WHERE p.id_tipo_producto=? LIMIT 1";
        $stmt = $con->prepare($maximo);
        $stmt->execute(array(1));
        $producto = "SELECT p.id_producto,p.nombre_producto, p.descripcion_producto,f.foto_producto FROM productos p INNER JOIN fotos_productos f ON f.id_producto = p.id_producto WHERE p.id_producto=?";
      }
      while ($maximos = $stmt->fetch(PDO::FETCH_BOTH)){
        $id_max = $maximos[0];
      }
      $stmt = $con->prepare($producto);
      $stmt->execute(array($id_max));
      while ($productoa = $stmt->fetch(PDO::FETCH_BOTH)){
        $descripcion = $productoa[1];
        if ($pt_mx != null) {
          $calificacion_promedio = $productoa[2];
        }
        $foto_producto = $productoa[3];
      }
      $divin = "";
      $divin .= "<p class='uk-hidden' id='id_prod'>$id_max</p>";
      $divin .= "<div class='container-fluid'>";
        $divin .= "<div class='container-fluid'>";
          $divin .= "<div class='uk-grid row'>";
            $divin .= "<p id='idcl' class='hide'>$id_cl</p>";
            $divin .= "<div class='uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-3-10'>";
              $divin .= "<img src='data:image/*;base64,$foto_producto' alt='' id='imgfirst'>";
              $divin .= "<a href='#imgfirst' data-uk-lightbox='' class='uk-button uk-button-link uk-button-large uk-flex uk-flex-center'>VER EJEMPLO</a>";
            $divin .= "</div>";
            //AQUI ESTA LA INFORMACION DEL PRODUCTO
            $divin .= "<div class='uk-width-small-5-10 uk-width-medium-6-10 uk-width-large-7-10'>";
              $divin .= "<div class='uk-grid'>";
                $divin .= "<div class='uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10'>";
                  $divin .= "<p>Medida:</p>";
                  $divin .= "<form class='uk-form' id='medidassl'>";
                      $medidas = "SELECT m.medida FROM medidas_producto m INNER JOIN productos p ON m.id_producto = p.id_producto WHERE p.id_producto=$id_max";
                      $stmt = $con->prepare($medidas);
                      $stmt->execute(array($id_max));
                      while ($medidasa = $stmt->fetch(PDO::FETCH_BOTH)){
                      $divin .= "<input type='radio' id='form-s-r' name='radio'><label for='form-s-r'>$medidasa[0]</label><br>";
                      }
                    $divin .= "</form>";
                    $divin .= "<div class='uk-width-small-1-1 uk-width-medium-5-10 uk-width-large-4-10'>";
                      $divin .= "<p>Cantidad:</p>";
                      $divin .= "<select class='form-control' placeholder='Cantidad' id='cantidad'>";
                          $divin .= "<option>1</option>";
                          $divin .= "<option>2</option>";
                          $divin .= "<option>3</option>";
                          $divin .= "<option>4</option>";
                          $divin .= "<option>103</option>";
                      $divin .= "</select>";
                    $divin .= "</div>";
                  $divin .= "</div>";
                  $divin .=  "<div class='uk-hidden-small uk-width-medium-5-10 uk-width-large-5-10'>";
                    $divin .= "<p>DESCRIPCION:</p>";
                    $divin .= "<p id='descripcion'><strong>$descripcion</strong></p>";
                    $divin .= "<p class='uk-hidden-medium uk-hidden-small' id='calift'>Calificacion del producto <strong>".$calificacion_promedio."</strong></p>";
                    $divin .= "<div class='stars'>";
                      $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar' id='star1'></span>";
                      $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar' id='star2'></span>";
                      $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar' id='star3'></span>";
                      $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar' id='star4'></span>";
                      $divin .= "<span class='uk-icon-star uk-icon-small uk-hidden-medium uk-hidden-small puntuar' id='star5'></span>";
                  //$divin .= "</div>";
                  print($divin)*/
                  require_once ("producto.php");
              ?>
              <!--AQUI SE PUNTUA-->
              <br>
              <!--SECCION DE COMENTARIOS-->
              <p class="uk-hidden" id="calificacionf"></p>
              <p class=" uk-hidden-small uk-hidden-medium">Mi comentario:</p>
                <form class="uk-form uk-hidden-small uk-hidden-medium">
                  <div class="uk-form-row">
                    <textarea cols="75" rows="3" placeholder="Danos tu opinón" class="uk-hidden-medium uk-hidden-small estira" id="comentario"></textarea>
                    <br>
                    <br>
                  </div>
                </form>
                </div>
                <button class="btn btn-default uk-width-4-10 uk-push-6-10 uk-hidden-medium" id="enviar_comment" type="button">PUNTUAR</button>
                <form action="mascomentarios" id="mas_comentarios" method="post">
                  <input type="text" name="idpd" class="hide" id="mascid" value="<?php echo $id_max?>">
                </form>
            </div>
          </div>
          <br>
          <!--BOTONES-->
          <div class="uk-grid">
            <div class="uk-width-1-1">
                <div class="uk-grid">
                    <button class="btn btn-primary uk-width-small-5-10 uk-width-medium-4-10 uk-width-large-5-10 btn-sb-xs"onclick="window.location.href='cotizarcliente.php'">CARGAR</button>
                    <button class="btn btn-success uk-width-small-4-10 uk-width-medium-4-10 uk-width-large-4-10 btn-sb-xs" id="btn-el">ELEGIR DISEÑO</button>
                    <button class="btn btn-default uk-width-small-9-10 uk-width-medium-8-10 btn-sb-xs uk-hidden-large">PUNTUAR</button>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="elegir_div">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-lg-11 text-center">
              <h4>¡ELIGE TU DISEÑO!</h4>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-4 col-xs-4">
              <button class="btn btn-default btn-small" id="btn-crrel">Cerrar</button>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <?php 
            /*$row = 1;
            $divoep = "";
            $sqlep = "SELECT DISTINCT productos.id_producto,foto_producto,nombre_producto FROM ((productos INNER JOIN tipos_producto ON productos.id_tipo_producto = tipos_producto.id_tipo_producto) INNER JOIN fotos_productos ON fotos_productos.id_producto = productos.id_producto) INNER JOIN medidas_producto ON medidas_producto.id_producto = productos.id_producto WHERE productos.id_tipo_producto=? AND estado_producto=? AND estado_foto_producto=?";
              $stmt = $con->prepare($sqlep);
              $stmt->execute(array(1,1,1));
              while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
                $divoep .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 imagenesael' id='imagenel".$datos[0]."'>";
                  $divoep .= "<a href='javascript:elegido($datos[0])'><img src='data:image/*;base64,$datos[1]' class='img-responsive' id='img$datos[0]'></a>";
                $divoep .= "</div>";
              }
              print($divoep);*/
              require_once ("elegir.php");
          ?>
        </div>
      </div>
    </div>
  </div>
  <!--FIN DE LA INFORMAICON PRINCIPAL-->
  <!--INICIA EL CONTENDIO QUE POSEEN-->
  <div class="uk-width-1-1 uk-text-center">
      <div id="productos-solicitados">
        <br>
        <p class="productos-titulo">
          <h2 class="titulos uk-hidden-small">NUESTROS PRODUCTOS</h2>
          <h3 class="titulos uk-hidden-large uk-hidden-medium">NUESTROS PRODUCTOS</h3>
        </p>
      </div>
      <br>
      <!--slidenav de los productos-->
      <?php 
        /*$slidenavb = "";
        $slidenavb .= "<div class='uk-slidenav-position' data-uk-slider>";
          $slidenavb .= "<div class='uk-slider-container'>";
            $slidenavb .= "<ul class='uk-slider uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4'>";
                $sql = "SELECT productos.id_producto,foto_producto,nombre_producto FROM (productos INNER JOIN tipos_producto ON productos.id_tipo_producto = tipos_producto.id_tipo_producto) INNER JOIN fotos_productos ON fotos_productos.id_producto = productos.id_producto WHERE productos.id_tipo_producto=? AND estado_producto=? AND estado_foto_producto=?";
                $stmt = $con->prepare($sql);
                $stmt->execute(array(1,1,1));
                while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
                  $slidenavb .= "<a href='#'><li><img src='data:image/*;base64,$datos[1]' alt='$datos[2]' id='$datos[0]'></li></a>";
                }
              $slidenavb .= "</ul>";
            $slidenavb .= "</div>";
          $slidenavb .= "<a href='#' class='uk-slidenav uk-slidenav-contrast uk-slidenav-previous' data-uk-slider-item='previous'></a>";
          $slidenavb .= "<a href='#' class='uk-slidenav uk-slidenav-contrast uk-slidenav-next' data-uk-slider-item='next'></a>";
        $slidenavb .= "</div>";
        //$con = null;
        print($slidenavb);*/
        require_once ("slide.php");
      ?>
    </div>
    <br>
    <br>
    <div class="container-fluid" id="elegir_div">
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php 
              $row = 1;
              $divoep = "";
              $sqlep = "SELECT productos.id_producto,foto_producto,nombre_producto FROM (productos INNER JOIN tipos_producto ON productos.id_tipo_producto = tipos_producto.id_tipo_producto) INNER JOIN fotos_productos ON fotos_productos.id_producto = productos.id_producto WHERE productos.id_tipo_producto=? AND estado_producto=? AND estado_foto_producto=? GROUP BY id_producto";
                $stmt = $con->prepare($sqlep);
                $stmt->execute(array(1,1,1));
                while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
                  $divoep .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 imagenesael' id='imagenel".$datos[0]."'>";
                    $divoep .= "<a href='javascript:elegido($datos[0])'><img src='data:image/*;base64,$datos[1]' class='img-responsive'></a>";
                  $divoep .= "</div>";
                }
                print($divoep);
            ?>
          </div>
        </div>
      </div>
    </div>
    <!--INCLUYO LOS SCRIPTS Y EL FOOTER-->    
    <?php include 'footer.php' ?>
    <?php include 'scripts.php' ?>
</body>
</html>