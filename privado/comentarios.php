<?php 
  require 'procesos/conexion.php';
  include 'procesos/autenticar.php';
  include 'procesos/lifeprivate.php';
  $ejecutar = false;
  $id_producto = 0;
  if(isset($_POST['ver'])){
    $id_producto = $_POST['producto'];
    $ejecutar= true;
  }
?>
<html lang="es">
<head>
	<title>Comentarios | Punto Print</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
        <!--incluyo el menu-->
      <?php include 'menu_admin.php' ?>
      <br>
      <br>
      <br>
      <div class="col-lg-12">
        <h1 class="h-negro text-center">COMENTARIOS</h1>
        <br>
        <br>
      </div>
      <div class="col-lg-3">
        <p class="text-center">Elige un producto</p>
        <form action="comentarios.php" method="post">
          <select class="form-control" name="producto" id="permiso">
            <option value="0" selected="">SELECCIONA UN PRODUCTO</option>
              <?php 
                  $sql = "SELECT DISTINCT productos.id_producto,productos.nombre_producto FROM productos INNER JOIN comentarios ON productos.id_producto = comentarios.id_producto";
                  $stmt = $con->prepare($sql);
                  $stmt->execute(array());
                  while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
                      echo "<option value='$datos[0]'>$datos[1]</option>";
                  }
              ?>
            </select>
            <br>
            <button name="ver" class="btn btn-scrud col-lg-12 col-md-12 col-sm-12">VER COMENTARIOS</button>
          </form>
      </div>
      <?php  
        $comentariopa = "";
        if ($ejecutar == true && $id_producto != 0) {
            $sql = "SELECT nombre_producto FROM productos WHERE id_producto=?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($id_producto));
            $nombre = $stmt->fetch(PDO::FETCH_BOTH);
            $comentariopa .= "<div class='col-lg-9'>";
              $comentariopa .= "<div class='panel panel-default'>";
                $comentariopa .= "<div class='panel-heading'>";
                  $comentariopa .= "<h3 class='h-negro text-center'>$nombre[0]</h3>";
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
                          $comentariopa .= "<h4 class='h-negro text-center'>CLIENTE: $comentario[1] - CALIFICACION: $comentario[0]</h4>";
                        $comentariopa .= "</div>";
                        $comentariopa .= "<div class='panel-body'>";
                          $comentariopa .= "<div class='col-lg-9'>";
                            $comentariopa .= "<p>$comentario[2]</p>";
                          $comentariopa .= "</div>";
                          $comentariopa .= "<div class='col-lg-3'>";
                            $comentariopa .= "<button class='btn btn-scrud' onclick='javascript:eliminar_comentario($comentario[0])'>ELIMINAR</button>";
                          $comentariopa .= "</div>";
                        $comentariopa .= "</div>"; 
                      $comentariopa .= "</div>";
                    }
                $comentariopa .= "</div>";
              $comentariopa .= "</div>";
            $comentariopa .= "</div>";
          }else{
            $comentariopa = "<h3 class='h-negro text-center'>Selecciona un producto</h3>";
          }
          print($comentariopa);
        ?>
    </div>
  </div>  
	<!--CONTENEDOR DE LA INFORMACION-->
	<?php include 'scripts.php' ?>
</body>
</html>