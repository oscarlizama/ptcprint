<?php 
  //$nombrep="";
  $id_max = 0;
  $idtipx = 0;
  $descripcion = "";
  $foto_producto = "";
  $pt_mx = 0;
  $producto = "";
  $productoa = array();
  $calificacion_promedio = 0;
  ///OBTENER EL ID DEL TIPO DE PRODUCTO
  $idtip = "SELECT id_tipo_producto from tipos_producto WHERE nombre_tipo_producto=?";
  $stmt = $con->prepare($idtip);
  $stmt->execute(array($nombrepr));
  $idtipf = $stmt->fetch(PDO::FETCH_BOTH);
  $idtipx = $idtipf[0];

  $puntuacion_max = "SELECT max(c.calificacion) from comentarios c";
  $stmt = $con->prepare($puntuacion_max);
  $stmt->execute(array());
  while ($ptmx = $stmt->fetch(PDO::FETCH_BOTH)){
    $pt_mx = $ptmx[0];
  }
  if($pt_mx != null){
    $maximo = "SELECT p.id_producto FROM productos p INNER JOIN comentarios c ON p.id_producto = c.id_producto WHERE p.id_tipo_producto=? AND c.calificacion = ? LIMIT 1";
    $stmt = $con->prepare($maximo);
    $stmt->execute(array($idtipx,$pt_mx));
    $producto = "SELECT p.nombre_producto, p.descripcion_producto, ROUND(AVG(c.calificacion),1),f.foto_producto FROM (productos p INNER JOIN fotos_productos f ON f.id_producto = p.id_producto) INNER JOIN comentarios c ON c.id_producto = p.id_producto WHERE p.id_producto=?";
  }else{
    $maximo = "SELECT p.id_producto FROM productos p WHERE p.id_tipo_producto=? LIMIT 1";
    $stmt = $con->prepare($maximo);
    $stmt->execute(array($idtipx));
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
        print($divin);
?>