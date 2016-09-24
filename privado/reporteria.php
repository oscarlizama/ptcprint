<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
	include 'procesos/lifeprivate.php';
	include 'procesos/validaciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Punto Print - Soluciones en impresiones</title>
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
	</div>
	<br>
	<div class="container-fluid">
		<div class="row">
			<h1 class="h-negro text-center">CENTRO DE REPORTERIA DEL SITIO</h1>
			<br>
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5>LISTADO DE PRODUCTOS</h5>
					</div>
					<div class="panel-body">
						<form action="listadotiposproductos" method="post" target="_blank">
							<label for="">Muestra el listado de los tipos productos que están activos en el sistema.</label>
							<br>
							<br>
							<button class="btn btn-scrud btn-block">
								GENERAR REPORTE
								<span class='flaticon-pdf icon-buttons'></span>
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5>LISTADO DE PRODUCTOS</h5>
					</div>
					<div class="panel-body">
						<form action="listadoproductos" method="post" target="_blank">
							<label for="">Muestra el listado de los productos que están activos en el sistema.</label>
							<br>
							<br>
							<button class="btn btn-scrud btn-block">
								GENERAR REPORTE
								<span class='flaticon-pdf icon-buttons'></span>
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5>MEDIDAS DE PROUCTOS</h5>
					</div>
					<div class="panel-body">
						<form action="medidasproductos" method="post" target="_blank">
							<label for="">Muestra el listado de las medidas que poseen cada producto y que están activos en el sistema.</label>
							<br>
							<br>
							<select class="form-control" name="productos" id="prod">
		                    	<option value="0" selected="">SELECCIONE EL PRODUCTO</option>
								<?php 
		                            $sql = "SELECT * FROM productos where estado_producto=?";
		                            $stmt = $con->prepare($sql);
					    			$stmt->execute(array(1));
									while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
		                                echo "<option value='$datos[0]'>$datos[1]</option>";
		                            }
		                        ?>
							</select>
							<br>
							<button class="btn btn-scrud btn-block">
								GENERAR REPORTE
								<span class='flaticon-pdf icon-buttons'></span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5>COTIZACION DE UN PRODUCTO</h5>
					</div>
					<div class="panel-body">
						<form action="" method="post">
							<label for="">Realizar una cotizacion aproximada de un producto deseado, junto con otros parametros que se toman en cuenta para la obtención de un precio final.</label>
							<br>
							<br>
							<br>
							<a href="cotizarprecio" class="btn btn-scrud btn-block nodecor" style="">
								GENERAR REPORTE
								<span class='flaticon-pdf icon-buttons'></span>
							</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<?php include 'scripts.php';?>
</body>
</html>