<?php 
  include '../privado/procesos/conexion.php';
  include '../privado/procesos/lifetime.php';
  include '../privado/procesos/logueado.php';
  if($_SESSION['autenticado'] != 'si'){   
    header('Location: inicio');
    session_destroy();
  }
?>
<html lang="es">
<head>
	<title>Carrito - Pedidos | Punto Print</title>
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
		<h1 class="titulos titulos-sublim uk-text-center">MI CARRITO</h1>
	</div>

  <br>
  <br>
  <div class="container-fluid">
    <ul class="nav nav-tabs nav-justified">
      <li class="active"><a data-toggle="tab" href="#home">CARRITO</a></li>
      <li><a data-toggle="tab" href="#menu1">PEDIDOS</a></li>
      <li><a data-toggle="tab" href="#menu2">MIS COMPRAS</a></li>
      <li><a data-toggle="tab" href="#menu3">REPORTES</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="row">
          <div class="col-lg-12">
          <br>
            <?php 
              //OBTENGO LOS REGISTROS DE LOS CARRITOS
              $carritocnt = "SELECT COUNT(id_carrito) FROM carritos WHERE id_cliente=? AND estado_carrito=0";
              $stmt = $con->prepare($carritocnt);
              $stmt->execute(array($id_cl));
              $cnt = $stmt->fetch(PDO::FETCH_BOTH);
              $tabla = "";
              //SI HAY UN REGISTRO AL MENOS ENTONCES ENTRA
              if ($cnt[0] > 0) {
                //HAGO LA CONSULTA PARA OBTENER LOS CARRITOS
                $sql = "SELECT c.id_carrito,p.nombre_producto,cantidad,c.fecha_solicitud,c.estado_carrito FROM (productos p INNER JOIN medidas_producto md ON p.id_producto = md.id_producto) INNER JOIN carritos c ON c.id_medida = md.id_medida WHERE c.id_cliente = $id_cl AND c.estado_carrito=0 ORDER BY c.fecha_solicitud ASC";
                //HACER EL MODELO DE LA TABLA
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                      $tabla .= "<thead>";
                          $tabla .= "<tr>";
                              $tabla .= "<th class='tabla-info' id='articulo'>Articulo</th>";
                              $tabla .= "<th class='tabla-info' id='description'>Cantidad</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Fecha</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Estado</th>";
                          $tabla .= "</tr>";
                      $tabla .= "</thead>";
                      $tabla .= "<tbody>";
                      //PONGO LOS REGISTROS EN LA TABLA
                      foreach ($con->query($sql) as $datos) {
                        $tabla .= "<tr>";
                              $tabla .= "<td>$datos[1]</td>";
                              $tabla .= "<td>$datos[2]</td>";
                              $tabla .= "<td>$datos[3]</td>";
                              if ($datos[4] == 0) {
                                $tabla .= "<td>En proceso</td>";
                              }
                          $tabla .= "<tr>";
                      }
                    $tabla .= "</tbody>";
                $tabla .= "</table>";
              }else{
                //SI NO HAY CARRITOS MUESTRA EL MENSAJE
                $tabla .= "<h2 class='text-center'>No has agregado ningun producto</h2>";
              }
              print($tabla);
            ?>
          </div>
        </div>
      </div>
      <div id="menu1" class="tab-pane fade">
        <br>
        <div class="col-lg-12">
          <?php 
              //HAGO LA CONSULTA PARA OBTENER LOS PEDIDOS DEL CLIENTE
              $pedidocnt = "SELECT COUNT(p.id_pedido) FROM (pedidos p INNER JOIN archivos a ON p.id_archivo = a.id_archivo) INNER JOIN conversaciones c ON c.id_conversacion = a.id_conversacion WHERE c.id_cliente=? AND p.estado_pedido=0";
              $stmtp = $con->prepare($pedidocnt);
              $stmtp->execute(array($id_cl));
              $cntp = $stmtp->fetch(PDO::FETCH_BOTH);
              $tabla = "";
              ///SI HAY AL MENOS UN REGISTRO ENTONCES ENTRA
              if ($cntp[0] > 0) {
                $sql = "SELECT p.id_pedido,a.nombre_archivo,p.fecha_pedido,p.estado_pedido FROM (pedidos p INNER JOIN archivos a ON p.id_archivo = a.id_archivo) INNER JOIN conversaciones c ON c.id_conversacion = a.id_conversacion WHERE c.id_cliente=$id_cl AND p.estado_pedido=0 ORDER BY p.fecha_pedido ASC";
                //HAGO EL MODELO DE LA TABLA
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                      $tabla .= "<thead>";
                          $tabla .= "<tr>";
                              $tabla .= "<th class='tabla-info' id='description'>Nombre del archivo</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Fecha del pedido</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Estado</th>";
                          $tabla .= "</tr>";
                      $tabla .= "</thead>";
                      $tabla .= "<tbody>";
                      ///LLENO LA TABLA CON LOS REGISTROS
                      foreach ($con->query($sql) as $datos) {
                        $tabla .= "<tr>";
                              $tabla .= "<td>$datos[1]</td>";
                              $tabla .= "<td>$datos[2]</td>";
                              $tabla .= "<td>En proceso</td>";
                          $tabla .= "<tr>";
                      }
                    $tabla .= "</tbody>";
                $tabla .= "</table>";
              }else{
                ///SI NO HAY PEDIDOS ME DEVULVE ESTE MENSAJE
                $tabla .= "<h2 class='text-center'>No has agregado ningun pedido</h2>";
              }
              print($tabla);
            ?>
          </div>
      </div>
      <div id="menu2" class="tab-pane fade">
        <br>
        <div class="col-lg-12">
          <?php 
              $pedidost = false;
              $carritost = false;
              //AQUI VEO SI HAY PRODUCTOS DE PEDIDOS O CARRITOS QUE YE ESTAN TERMINADOS
              $pedidocnt = "SELECT COUNT(p.id_pedido) FROM (pedidos p INNER JOIN archivos a ON p.id_archivo = a.id_archivo) INNER JOIN conversaciones c ON c.id_conversacion = a.id_conversacion WHERE c.id_cliente=? AND p.estado_pedido=1";
              //HAGO LA CONEXION
              $stmtp = $con->prepare($pedidocnt);
              $stmtp->execute(array($id_cl));
              //OBTENGO EL RESULTADO
              $cntp = $stmtp->fetch(PDO::FETCH_BOTH);
              ///AHORA VEO SI HAY COSAS TERMINADAS EN EL CARRITO
              $carritocnt = "SELECT COUNT(id_carrito) FROM carritos WHERE id_cliente=? AND estado_carrito=1";
              $stmt = $con->prepare($carritocnt);
              $stmt->execute(array($id_cl));
              //OBTENGO EL RESULTADO
              $cnt = $stmt->fetch(PDO::FETCH_BOTH);
              $tabla = "";
              //SI HAY AL MENOS UNO EN PEDIDOS
              if ($cntp[0] > 0) {
                  $pedidost = true;
              }
              //SI HAY AL MENOS UNO EN CARRITOS
              if ($cnt[0] > 0) {
                $carritost = true;
              }
              ///SI HAY EN ALGUNO DE LOS DOS PASA AQUI
              if ($pedidost || $carritost) {
                //SE CREA LA TABLA POR DEFECTO
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                      $tabla .= "<thead>";
                          $tabla .= "<tr>";
                              $tabla .= "<th class='tabla-info' id='description'>Articulo</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Fecha de la compra</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Tipo de compra</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Recogido</th>";
                          $tabla .= "</tr>";
                      $tabla .= "</thead>";
                      $tabla .= "<tbody>";
                if($pedidost){
                  //SI HAY PEDIDOS ENTONCES OBTENGO LOS DATOS QUE OCUPARE
                  //HAGO LA CONSULTA
                  $sql = "SELECT a.nombre_archivo,p.fecha_pedido,p.recogido FROM pedidos p, archivos a,conversaciones c WHERE p.id_archivo = a.id_archivo AND c.id_conversacion = a.id_conversacion AND c.id_cliente=? AND p.estado_pedido=1 ORDER BY p.fecha_pedido ASC";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($id_cl));
                      //RECORRO LOS DATOS CON FOREACH
                    while ($datos =  $stmt->fetch(PDO::FETCH_BOTH)){
                      $tabla .= "<tr>";
                        $tabla .= "<td>$datos[0]</td>";
                        $tabla .= "<td>$datos[1]</td>";
                        $tabla .= "<td>Diseño personalizado</td>";
                        if ($datos[2] == 0) {
                            $tabla .= "<td>Pendiente</td>";
                          }else{
                            $tabla .= "<td>Sí</td>";
                          }
                        $tabla .= "<tr>";
                    }
                }
                //SI HAY REGISTROS EN CARRITOS
                if ($carritost) {
                  //HAGO LA CONSULTA
                  $sql = "SELECT p.nombre_producto,c.fecha_solicitud,c.recogido FROM productos p, medidas_producto md, carritos c WHERE p.id_producto = md.id_producto AND c.id_medida = md.id_medida AND c.id_cliente=? AND c.estado_carrito=1 ORDER BY c.fecha_solicitud ASC";
                  $stmt = $con->prepare($sql);
                  $stmt->execute(array($id_cl));
                  while ($datos =  $stmt->fetch(PDO::FETCH_BOTH)) {
                    $tabla .= "<tr>";
                      $tabla .= "<td>$datos[0]</td>";
                      $tabla .= "<td>$datos[1]</td>";
                      $tabla .= "<td>Diseño predefinido</td>";
                      if ($datos[2] == 0) {
                          $tabla .= "<td>Pendiente</td>";
                        }else{
                          $tabla .= "<td>Sí</td>";
                        }
                    $tabla .= "<tr>";
                  }
                }
                    $tabla .= "</tbody>";
                $tabla .= "</table>";
              }
              else{
                //SI NO HAY REGISTROS MUESTRO UN MENSAJE
                $tabla .= "<h2 class='text-center'>No hay compras realizadas</h2>";
              }
              print($tabla);
            ?>
          </div>
      </div>
      <div id="menu3" class="tab-pane fade">
        <br>
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h5>RESUMEN DE PRODUCTOS SIN RECOGER</h5>
            </div>
            <div class="panel-body">
              <form action="norecogidos" method="post" target="_blank">
              <div>
                <?php
                  $comrasm = false;
                  $seleccion = "";
                  $fechassql = "SELECT c.fecha_solicitud FROM carritos c, clientes cl WHERE cl.id_cliente = c.id_cliente AND cl.id_cliente=? GROUP BY c.fecha_solicitud";
                  $stmtfecha = $con->prepare($fechassql);
                  $stmtfecha->execute(array($id_cl));
                  $seleccion .= "<select name='fechacl' id='' class='form-control'>";
                  while ($fechas = $stmtfecha->fetch(PDO::FETCH_BOTH)) {
                      $comrasm = true;
                      $seleccion .= "<option value='$fechas[0]'>".$fechas[0]."</option>";
                  }
                  $fechassql = "SELECT p.fecha_pedido FROM pedidos p, clientes cl, archivos a, conversaciones c WHERE a.id_conversacion = c.id_conversacion AND c.id_cliente = cl.id_cliente AND p.id_archivo = a.id_archivo AND cl.id_cliente=? GROUP BY c.fecha_solicitud";
                  $stmtfecha = $con->prepare($fechassql);
                  $stmtfecha->execute(array($id_cl));
                  while ($fechas = $stmtfecha->fetch(PDO::FETCH_BOTH)) {
                      $comrasm = true;
                      $seleccion .= "<option value='$fechas[0]'>".$fechas[0]."</option>";
                  }
                  $seleccion .= "</select>";
                  if ($comrasm) {
                    echo "<label for=''>Fecha de comprobante:</label>";
                    print($seleccion);
                    echo "<br>";
                    echo "<button class='btn-pink btn btn-block'>Generar comprobante</button>";
                  }else{
                    echo "<h3 class='text-center'>No hay datos para mostrar.</h3>";
                  }
                ?>
                <br>
                <br>
                <br>
                <br>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h5>HISTORIAL DE COMPRAS Y PEDIDOS</h5>
            </div>
            <div class="panel-body">
              <form action="recogidos" method="post" target="_blank">
              <div>
                <?php
                  $comprash = false;
                  $seleccion = "";
                  $fechassql = "SELECT c.fecha_solicitud FROM carritos c, clientes cl WHERE cl.id_cliente = c.id_cliente AND cl.id_cliente=? AND c.recogido=1 GROUP BY c.fecha_solicitud";
                  $stmtfecha = $con->prepare($fechassql);
                  $stmtfecha->execute(array($id_cl));
                  $seleccion .= "<select name='fechacl' id='' class='form-control'>";
                  while ($fechas = $stmtfecha->fetch(PDO::FETCH_BOTH)) {
                      $comprash = true;
                      $seleccion .= "<option value='$fechas[0]'>".$fechas[0]."</option>";
                  }
                  $fechassql = "SELECT p.fecha_pedido FROM pedidos p, clientes cl, archivos a, conversaciones c WHERE a.id_conversacion = c.id_conversacion AND c.id_cliente = cl.id_cliente AND p.id_archivo = a.id_archivo AND cl.id_cliente=? AND p.recogido=1 GROUP BY c.fecha_solicitud";
                  $stmtfecha = $con->prepare($fechassql);
                  $stmtfecha->execute(array($id_cl));
                  while ($fechas = $stmtfecha->fetch(PDO::FETCH_BOTH)) {
                      $comprash = true;
                      $seleccion .= "<option value='$fechas[0]'>".$fechas[0]."</option>";
                  }
                  $seleccion .= "</select>";
                  if ($comprash){
                      echo "<label for=''>Fecha de comprobante:</label>";
                      print($seleccion);
                      echo "<br>";
                      echo "<button class='btn-pink btn btn-block'>Generar comprobante</button>";
                  }else{
                    echo "<h3 class='text-center'>No hay datos para mostrar.</h3>";
                  }
                ?>
                <br>
                <br>
                <br>
                <br>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h5>RESUMEN DE PRODUCTOS RECOGIDOS</h5>
            </div>
            <div class="panel-body">
              <form action="historialcompras" method="post" target="_blank">
              <div>
                <?php 
                  if ($comprash) {
                    $meshoy = date('m');
                    $aniohoy = date('Y');
                    $ultimodiames = date("d",(mktime(0,0,0,$meshoy+1,1,$aniohoy)-1));
                    $fechai_mostrar = $aniohoy . "-" . $meshoy . "-01";;
                    $fechaf_mostrar = $aniohoy . "-" . $meshoy . "-" . $ultimodiames;
                    printf("
                  <label for=''>Fecha de inicio:</label>
                  <input type='text' name='fecha_inicio' placeholder='Fecha de inicio' class='form-control datepicker' data-date-format='yyyy-mm-dd' autocomplete='off' value='$fechai_mostrar'>
                  <br>
                  <label for=''>Fecha de finalización:</label>
                  <input type='text' name='fecha_fin' placeholder='Fecha de inicio' class='form-control datepicker' data-date-format='yyyy-mm-dd' autocomplete='off' value='$fechaf_mostrar'>
                  <br>
                  <button class='btn-pink btn btn-block'>Generar comprobante</button>");
                  }else{
                    echo "<h3 class='text-center'>No hay datos para mostrar.</h3>";
                  }
                ?>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
	<!--CONTENEDOR DE LA INFORMACION-->
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>
</body>
</html>