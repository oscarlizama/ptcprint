<html lang="es">
<head>
	<title>Cotizar | Punto Print</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
	<!--Aqui incluyo el menú-->
    <?php include 'menu.php' ?>
    <br>
    <br>
	<!--CREO EL HADER DE LA PAGINA-->
  	<div class="col-lg-12">
  		<br>
    	<h2 class="text-center">MI CARRITO | PUNTO PRINT</h2>
  	</div>
  	<div class="container-fluid">
	    <div class="col-lg-12">
	    	<?php 
                include '../privado/procesos/conexion.php';
                $total_pagar = 0;
                $email = $_SESSION['email'];
                $id_sql = "SELECT id_cliente FROM clientes WHERE correo_cliente=?";
                $stmt = $con->prepare($id_sql);
                $stmt->execute(array($email));
                $id = $stmt->fetch(PDO::FETCH_BOTH);
                ///OBTENER EL CARRITO PARA VER SI ESTA VACIO
                //$stmt = $con->prepare($id_sql);
                //$stmt->execute(array($email));
                //$id = $stmt->fetch(PDO::FETCH_BOTH);
                $carrito_sql = "";
                $tabla = "<table class='table table-striped table-responsive tabla-info'>";
                    $tabla .= "<thead>";
                        $tabla .= "<tr>";
                            $tabla .= "<th class='tabla-info' id='articulo'>Articulo</th>";
                            $tabla .= "<th class='tabla-info' id='description'>Descripcion</th>";
                            $tabla .= "<th class='tabla-info' id='precio-unit'>Precio unitario</th>";
                            $tabla .= "<th class='tabla-info' id='cantidad-item'>Cantidad</th>";
                            $tabla .= "<th class='tabla-info' id='cantidad-item'>Talla</th>";
                            $tabla .= "<th class='tabla-info'></th>";
                        $tabla .= "</tr>";
                    $tabla .= "</thead>";
                    $tabla .= "<tbody>";
                    foreach ($con->query($carrito_sql) as $datos) {
                        $tabla .= "<tr>";
                            $tabla .= "<td>$datos[1]</td>";
                            $tabla .= "<td>$datos[2]</td>";
                            $tabla .= "<td>$datos[3]</td>";
                            $tabla .= "<td>$datos[4]</td>";
                            $tabla .= "<td>$datos[6]</td>";
                            $tabla .= "<td><button class='btn btn-buy eliminar_carrito' onclick=javascript:abrirc($datos[0],$datos[5],$datos[4]);><span class='glyphicon glyphicon-remove'></span></button></td>";
                        $tabla .= "<tr>";
                        $total_pagar = $total_pagar + ($datos[3] * $datos[4]);
                    }
                    $tabla .= "<tr>";
                        $tabla .= "<td></td>";
                        $tabla .= "<td><strong>TOTAL DE LA COMPRA:</strong></td>";
                        $tabla .= "<td>".$total_pagar."</td>";
                        $tabla .= "<td><button class='btn btn-buy pull-right hidden-xs show-md pagar-btn'>CONFIRMAR Y PAGAR</button></td>";
                        $tabla .= "<td><strong></strong></td>";
                        $tabla .= "<td></td>";
                    $tabla .= "</tr>";
                $tabla .= "</tbody>";
            $tabla .= "</table>";
            print($tabla);
            ?>
	    </div>
  	</div>
	<!--CONTENEDOR DE LA INFORMACION-->
	<?php include 'footer.php' ?>
	<?php include 'scripts.php' ?>
</body>
</html>