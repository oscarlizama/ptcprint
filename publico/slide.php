<?php 
  $slidenavb = "";
  $slidenavb .= "<div class='uk-slidenav-position' data-uk-slider>";
    $slidenavb .= "<div class='uk-slider-container'>";
      $slidenavb .= "<ul class='uk-slider uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4'>";
          $sql = "SELECT productos.id_producto,foto_producto,nombre_producto FROM (productos INNER JOIN tipos_producto ON productos.id_tipo_producto = tipos_producto.id_tipo_producto) INNER JOIN fotos_productos ON fotos_productos.id_producto = productos.id_producto WHERE productos.id_tipo_producto=? AND estado_producto=? AND estado_foto_producto=?";
          $stmt = $con->prepare($sql);
          $stmt->execute(array($idtipx,1,1));
          while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
            $slidenavb .= "<a href='#'><li><img src='data:image/*;base64,$datos[1]' alt='$datos[2]' id='$datos[0]'></li></a>";
          }
        $slidenavb .= "</ul>";
      $slidenavb .= "</div>";
    $slidenavb .= "<a href='#' class='uk-slidenav uk-slidenav-contrast uk-slidenav-previous' data-uk-slider-item='previous'></a>";
    $slidenavb .= "<a href='#' class='uk-slidenav uk-slidenav-contrast uk-slidenav-next' data-uk-slider-item='next'></a>";
  $slidenavb .= "</div>";
  //$con = null;
  print($slidenavb);
?>