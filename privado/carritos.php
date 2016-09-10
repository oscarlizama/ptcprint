<?php 
  require 'procesos/conexion.php';
  include 'procesos/autenticar.php';
  include 'procesos/lifeprivate.php';
?>
<html lang="es">
<head>
	<title>Carrito - Pedidos | Punto Print</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
  <?php include 'menu_admin.php' ?>
  <br>
  <br>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="h-negro">PRODUCTOS A REALIZAR</h1>
      </div>
    </div>
    <br>
    <br>
    <ul class="nav nav-tabs nav-justified">
      <li class="active"><a data-toggle="tab" href="#home">CARRITO</a></li>
      <li><a data-toggle="tab" href="#menu1">PEDIDOS</a></li>
      <li><a data-toggle="tab" href="#menu2">CARRITOS TERMINADOS</a></li>
      <li><a data-toggle="tab" href="#menu3">PEDIDOS TERMINADOS</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="row">
          <div class="col-lg-12">
          <br>
            <?php 
              //HAGO LA CONSULTA PARA SABER SI HAY CARRITOS PARA HACER
              $carritocnt = "SELECT COUNT(id_carrito) FROM carritos WHERE estado_carrito=0";
              $stmt = $con->prepare($carritocnt);
              $stmt->execute(array());
              $cnt = $stmt->fetch(PDO::FETCH_BOTH);
              $tabla = "";
              //SI HAY MAS DE UN CARRITO A RELIZAR
              if ($cnt[0] > 0) {
                //HAGO LA CONSULYA
                $sql = "SELECT c.id_carrito,CONCAT(cl.nombre_cliente,' ',cl.apellido_cliente),p.nombre_producto,cantidad,c.fecha_solicitud FROM productos p, clientes cl, carritos c, medidas_producto m WHERE c.estado_carrito=? AND p.id_producto AND m.id_producto AND cl.id_cliente = c.id_cliente AND m.id_medida = c.id_medida ORDER BY c.fecha_solicitud ASC";
                //CREO EL MODELO DE LA TABLA
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                      $tabla .= "<thead>";
                          $tabla .= "<tr>";
                              $tabla .= "<th class='tabla-info' id='articulo'>Cliente</th>";
                              $tabla .= "<th class='tabla-info' id='articulo'>Articulo</th>";
                              $tabla .= "<th class='tabla-info' id='description'>Cantidad</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Fecha</th>";
                              $tabla .= "<th class='tabla-info'>Terminar</th>";
                          $tabla .= "</tr>";
                      $tabla .= "</thead>";
                      $tabla .= "<tbody>";
                      //LLENO LA TABLA CON TODOS LOS REGISTROS
                      $stmt = $con->prepare($sql);
                      $stmt->execute(array(0));
                      while ($datos = $stmt->fetch(PDO::FETCH_BOTH))  {
                        $tabla .= "<tr>";
                              $tabla .= "<td>$datos[1]</td>";
                              $tabla .= "<td>$datos[2]</td>";
                              $tabla .= "<td>$datos[3]</td>";
                              $tabla .= "<td>$datos[4]</td>";
                              $tabla .= "<td><button class='btn btn-buy eliminar_carrito' onclick='javascript:terminado($datos[0])'><span class='glyphicon glyphicon-ok'></span></button></td>";
                          $tabla .= "<tr>";
                      }
                    $tabla .= "</tbody>";
                $tabla .= "</table>";
              }else{
                //SI NO HAY PEDIDOS ENTONCES MUESTRO EL MENSAJE
                $tabla .= "<h2 class='text-center h-negro'>No hay servicios que realizar</h2>";
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
            //VEO SI HAY PEDIDOS POR REALIZAR
              $pedidocnt = "SELECT COUNT(p.id_pedido) FROM (pedidos p INNER JOIN archivos a ON p.id_archivo = a.id_archivo) INNER JOIN conversaciones c ON c.id_conversacion = a.id_conversacion WHERE p.estado_pedido=?";
              $stmtp = $con->prepare($pedidocnt);
              $stmtp->execute(array(0));
              $cntp = $stmtp->fetch(PDO::FETCH_BOTH);
              $tabla = "";
              //SI HAY PEDIDOS ENTONCES PASO EL IF
              if ($cntp[0] > 0) {
                //CREO LA CONSULTA PARA SABER QUE PEDIDOS HAY QUE HACER
                $sql = "SELECT p.id_pedido,CONCAT(cl.nombre_cliente,' ',cl.apellido_cliente),a.nombre_archivo,p.fecha_pedido FROM pedidos p, archivos a, conversaciones c, clientes cl WHERE p.id_archivo = a.id_archivo AND c.id_conversacion = a.id_conversacion AND cl.id_cliente = c.id_cliente AND p.estado_pedido=? ORDER BY p.fecha_pedido ASC";
                //CREO EL MODELO DE LA TABLA
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                      $tabla .= "<thead>";
                          $tabla .= "<tr>";
                              $tabla .= "<th class='tabla-info' id='description'>Cliente</th>";
                              $tabla .= "<th class='tabla-info' id='description'>Nombre del archivo</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Fecha del pedido</th>";
                              $tabla .= "<th class='tabla-info'>Terminar</th>";
                          $tabla .= "</tr>";
                      $tabla .= "</thead>";
                      $tabla .= "<tbody>";
                      //LLENO LA TABLA CON LOS REGISTROS
                      $stmt = $con->prepare($sql);
                      $stmt->execute(array(0));
                      while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
                        $tabla .= "<tr>";
                              $tabla .= "<td>$datos[1]</td>";
                              $tabla .= "<td>$datos[2]</td>";
                              $tabla .= "<td>$datos[3]</td>";
                              $tabla .= "<td><button class='btn btn-buy eliminar_carrito' onclick='javascript:terminadop($datos[0])'><span class='glyphicon glyphicon-ok'></span></button></td>";
                          $tabla .= "<tr>";
                      }
                    $tabla .= "</tbody>";
                $tabla .= "</table>";
              }else{
                //SI NO ME MUESTRA ESTE MENSAJE
                $tabla .= "<h2 class='text-center h-negro'>No hay pedidos por realizar</h2>";
              }
              print($tabla);
            ?>
          </div>
      </div>
      <div id="menu2" class="tab-pane fade">
        <br>
        <div class="col-lg-12">
          <?php 
            //HAGO LA CONSULTA PARA SABER SI HAY CARRITOS TERMINADOS
              $carritocnt = "SELECT COUNT(id_carrito) FROM carritos WHERE estado_carrito=1";
              $stmt = $con->prepare($carritocnt);
              $stmt->execute(array());
              $cnt = $stmt->fetch(PDO::FETCH_BOTH);
              $tabla = "";
              //SI HAY MAS DE UNO ENTONCES PASA
              if ($cnt[0] > 0) {
                //CREO LA CONSULTA PAR OBTENER
                $sql = "SELECT c.id_carrito,CONCAT(cl.nombre_cliente,' ',cl.apellido_cliente),p.nombre_producto,cantidad,c.fecha_solicitud,c.recogido FROM productos p, clientes cl, carritos c, medidas_producto m WHERE c.estado_carrito=? AND p.id_producto AND m.id_producto AND cl.id_cliente = c.id_cliente AND m.id_medida = c.id_medida ORDER BY c.fecha_solicitud ASC";
                //CREO EL MODELO DE LA TABLA
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                      $tabla .= "<thead>";
                          $tabla .= "<tr>";
                              $tabla .= "<th class='tabla-info' id='articulo'>Cliente</th>";
                              $tabla .= "<th class='tabla-info' id='articulo'>Articulo</th>";
                              $tabla .= "<th class='tabla-info' id='description'>Cantidad</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Fecha</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Recogido</th>";
                          $tabla .= "</tr>";
                      $tabla .= "</thead>";
                      $tabla .= "<tbody>";
                      //LLENO LA TABLA CON LOS REGISTROS
                      $stmt = $con->prepare($sql);
                      $stmt->execute(array(1));
                      while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
                        $tabla .= "<tr>";
                              $tabla .= "<td>$datos[1]</td>";
                              $tabla .= "<td>$datos[2]</td>";
                              $tabla .= "<td>$datos[3]</td>";
                              $tabla .= "<td>$datos[4]</td>";
                              if ($datos[5] == 0) {
                                $tabla .= "<td><button class='btn btn-buy eliminar_carrito' onclick='javascript:recogido($datos[0])'><span class='glyphicon glyphicon-ok'></span></button></td>";
                              }else{
                                $tabla .= "<td>Sí</td>";
                              }
                          $tabla .= "<tr>";
                      }
                    $tabla .= "</tbody>";
                $tabla .= "</table>";
              }else{
                ///MUESTRO EL MENSAJE
                $tabla .= "<h2 class='text-center h-negro'>No hay servicios terminados</h2>";
              }
              print($tabla);
            ?>
          </div>
      </div>
      <div id="menu3" class="tab-pane fade">
        <br>
        <div class="col-lg-12">
          <?php 
              //VEO SI HAY PEDIDOS PARA REALIZAR
              $pedidocnt = "SELECT COUNT(p.id_pedido) FROM (pedidos p INNER JOIN archivos a ON p.id_archivo = a.id_archivo) INNER JOIN conversaciones c ON c.id_conversacion = a.id_conversacion WHERE p.estado_pedido=?";
              $stmtp = $con->prepare($pedidocnt);
              $stmtp->execute(array(1));
              $cntp = $stmtp->fetch(PDO::FETCH_BOTH);
              $tabla = "";
              // SI HAY PEDIDOS HECHO ENTRA AL IF
              if ($cntp[0] > 0) {
                //CREO LA CONSULTA
                $sql = "SELECT p.id_pedido,CONCAT(cl.nombre_cliente,' ',cl.apellido_cliente),a.nombre_archivo,p.fecha_pedido,p.recogido FROM pedidos p, archivos a, conversaciones c, clientes cl WHERE p.id_archivo = a.id_archivo AND c.id_conversacion = a.id_conversacion AND cl.id_cliente = c.id_cliente AND p.estado_pedido=? ORDER BY p.fecha_pedido ASC";
                //CREO EL MODELO DE LA TABLA
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                      $tabla .= "<thead>";
                          $tabla .= "<tr>";
                              $tabla .= "<th class='tabla-info' id='description'>Cliente</th>";
                              $tabla .= "<th class='tabla-info' id='description'>Nombre del archivo</th>";
                              $tabla .= "<th class='tabla-info' id='precio-unit'>Fecha del pedido</th>";
                              $tabla .= "<th class='tabla-info'>Recogido</th>";
                          $tabla .= "</tr>";
                      $tabla .= "</thead>";
                      $tabla .= "<tbody>";
                      ///SI HAY REGISTROS LOS PONGO EN LA TABLA
                      $stmt = $con->prepare($sql);
                      $stmt->execute(array(1));
                      while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
                        $tabla .= "<tr>";
                              $tabla .= "<td>$datos[1]</td>";
                              $tabla .= "<td>$datos[2]</td>";
                              $tabla .= "<td>$datos[3]</td>";
                              if ($datos[4] == 0) {
                                $tabla .= "<td><button class='btn btn-buy eliminar_carrito' onclick='javascript:recogidop($datos[0])'><span class='glyphicon glyphicon-ok'></span></button></td>";
                              }else{
                                $tabla .= "<td>Sí</td>";
                              }
                          $tabla .= "<tr>";
                      }
                    $tabla .= "</tbody>";
                $tabla .= "</table>";
              }else{
                ///SI NO HAY ME MUESTRA EL MENSAJE
                $tabla .= "<h2 class='text-center h-negro'>No hay pedidos terminados</h2>";
              }
              print($tabla);
            ?>
          </div>
      </div>
    </div>
  </div>
	<!--CONTENEDOR DE LA INFORMACION-->
	<?php include 'scripts.php' ?>
</body>
</html>