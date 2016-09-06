<?php 
  session_start();
  require '../privado/procesos/conexion.php';
  $ejecutar = false;
  $id_producto = $_POST['idpd'];
  //$id_producto=1;
  $sql = "SELECT p.nombre_producto,f.foto_producto FROM productos p INNER JOIN fotos_productos f ON f.id_producto = p.id_producto WHERE p.id_producto=?";
  $stmt = $con->prepare($sql);
  $stmt->execute(array($id_producto));
  $datos = $stmt->fetch(PDO::FETCH_BOTH);
  $foto_producto = $datos[1];
?>
<html lang="es">
<head>
	<title>Comentarios | Punto Print</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
  <?php include 'menu.php' ?>
  <br>
  <br>
  <div class="col-lg-12 col-md-12 col-sm-12 banners">
    <h1 class="titulos titulos-sublim uk-text-center"><?php echo $datos[0] ?></h1>
  </div>
  <div class="container-fluid">
    <div class="row">
        <!--incluyo el menu-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <br>
        <img src='data:image/*;base64,<?php echo $foto_producto?>' alt='' id='imgfirst'>
      </div>
      <?php  
        $comentariopa = "";
        if ($id_producto != 0) {
            $sql = "SELECT nombre_producto FROM productos WHERE id_producto=?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($id_producto));
            $nombre = $stmt->fetch(PDO::FETCH_BOTH);
            $comentariopa .= "<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12'>";
              $comentariopa .= "<br>";
              $comentariopa .= "<div class='panel panel-default'>";
                $comentariopa .= "<div class='panel-heading'>";
                  $comentariopa .= "<h3 class='h-negro text-center'>COMENTARIOS</h3>";
                $comentariopa .= "</div>";
                $comentariopa .= "<div class='panel-body'>";
                    //AQUI OBTENGO CUANTOS COMENTARIOS TIENE ESE PRODUCTO
                    $sql = "SELECT COUNT(id_comentario) FROM comentarios WHERE id_producto=?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($id_producto));
                    $comentariost = $stmt->fetch(PDO::FETCH_BOTH);
                    //echo $comentariost[0];
                    $sql = "SELECT c.id_comentario,CONCAT(cl.nombre_cliente,' ',cl.apellido_cliente),c.comentario,c.calificacion FROM comentarios c INNER JOIN clientes cl ON c.id_cliente = cl.id_cliente WHERE id_producto=?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($id_producto));
                          
                    while ($comentario = $stmt->fetch(PDO::FETCH_BOTH)){
                      $comentariopa .= "<div class='panel panel-default'>";
                        $comentariopa .= "<div class='panel-heading'>";
                            $comentariopa .= "<h4 class='text-center'>Cliente: $comentario[1] Calificacion: $comentario[3]</h4>";
                          $comentariopa .= "</div>";
                        $comentariopa .= "<div class='panel-body'>";
                          $comentariopa .= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                            $comentariopa .= "<p><strong>$comentario[2]</strong></p>";
                        $comentariopa .= "</div>";
                      $comentariopa .= "</div>";
                    $comentariopa .= "</div>";
                    }
              $comentariopa .= "</div>";
            $comentariopa .= "</div>";
          }
          print($comentariopa);
        ?>
    </div>
  </div>  
	<!--CONTENEDOR DE LA INFORMACION-->
	<?php include 'scripts.php' ?>
</body>
</html>