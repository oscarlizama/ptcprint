<?php    
  $row = 1;
  $divoep = "";
  $sqlep = "SELECT DISTINCT productos.id_producto,foto_producto,nombre_producto FROM ((productos INNER JOIN tipos_producto ON productos.id_tipo_producto = tipos_producto.id_tipo_producto) INNER JOIN fotos_productos ON fotos_productos.id_producto = productos.id_producto) INNER JOIN medidas_producto ON medidas_producto.id_producto = productos.id_producto WHERE productos.id_tipo_producto=? AND estado_producto=? AND estado_foto_producto=?";
  $stmt = $con->prepare($sqlep);
  $stmt->execute(array($idtipx,1,1));
  while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
    $divoep .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 imagenesael' id='imagenel".$datos[0]."'>";
      $divoep .= "<a href='javascript:elegido($datos[0])'><img src='data:image/*;base64,$datos[1]' class='img-responsive' id='img$datos[0]'></a>";
    $divoep .= "</div>";
  }
  print($divoep);
?>