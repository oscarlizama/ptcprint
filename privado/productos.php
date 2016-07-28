<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administración de Productos
	</title>
	<?php include 'links.php' ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php include 'menu_admin.php' ?>
			<br>
			<br>
			<br>
			<br>
			<div class="col-lg-12" id="frm">
				<div class="col-lg-6 col-md-6">
					<p id="id_reg" class="hide"></p>
					<input type="text" class="hide omitir" value="7" id="tbl">
					<label for="" class="labels">Nombre del Producto</label>
                    <input type="text" class="form-control input" id="nombre">
                    <br>
                    <label for="" class="labels">Existencia</label>
                    <input type="text" class="form-control input" id="existencia">
                    <br>
                    <label for="" class="labels">Calificacion Promedio</label>
                    <input type="text" class="form-control input omitir" value='0' id="calificacion" disabled>
                    <br>
				</div>
				<div class="col-lg-6 col-md-6">
                    <label for="" class="labels">Tipo de producto</label>
                    <select class="form-control" name="usuarios[]" id="tipo-prod" >
                    	<option value="0" selected="">SELECCIONE EL TIPO DE PRODUCTO</option>
						<?php 
                            $sql = "SELECT * FROM tipos_producto where estado_tipo_producto=1";
                            foreach ($con->query($sql) as $datos) {
                                echo "<option value='$datos[0]'>$datos[1]</option>";
                            }
                        ?>
					</select>
					<br>
					<label for="" class="labels">Descripcion del producto</label>
                    <textarea type="text" id="descripcion" class="form-control input" rows="5"></textarea>
                    <br>
				</div>
				<div class="col-lg-12">
					<button class="btn btn-ag btn-scrud col-lg-3 col-md-3 col-sm-3">
						AGREGAR
						<span class="flaticon-correct icon-ag icon-button"></span>
						</button>
					<button class="btn btn-ed btn-scrud col-lg-3 col-md-3 col-sm-3 disabled" disabled="">
						EDITAR
						<span class="flaticon-new-file icon-button icon-ed"></span>
					</button>
					<button class="btn btn-el btn-scrud col-lg-3 col-md-3 col-sm-3 disabled" disabled="">
						ELIMINAR
						<span class="flaticon-cancel icon-button icon-el"></span>
					</button>
					<button class="btn btn-nv btn-scrud col-lg-2 col-md-2 col-sm-2">
						LIMPIAR
						<span class="flaticon-circular-arrow icon-button icon-nv"></span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<br>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<label for="" class="labels">Buscar</label>
                <input type="text" class="form-control" id="buscar">
                <br>
			</div>
			<div class="col-lg-12" id="tabla_div">
			<?php 
					$tabla = 
					"<table class='table-bk'>" .
						"<tr class='tb-heading'>".
							"<th><strong>#</strong></th>".
							"<th><strong>Nombre</strong></th>".
							"<th><strong>Existencia</strong></th>".
							"<th><strong>Tipo de Producto</strong></th>".
							"<th><strong></strong></th>".
						"</tr>";
				$sql = "SELECT id_producto,nombre_producto,existencias, TP.nombre_tipo_producto FROM productos P, tipos_producto TP WHERE estado_producto = 1 AND P.id_tipo_producto = TP.id_tipo_producto";
				foreach ($con->query($sql) as $datos) {
					$tabla .= 
						"<tr>".
							"<td>$datos[0]</td>".
							"<td>$datos[1]</td>".
							"<td>$datos[2]</td>".
							"<td>$datos[3]</td>".
							"<td>".
								"<button class='btn-table' onclick='seleccionar_producto($datos[0])'>".
									"SELECCIONAR".
									"<span class='flaticon-loupe'></span>".
								"</button>".
							"</td>".
						"</tr>";
					}
					$tabla .= "</table>";
					print($tabla);
				?>
			</div>
		</div>
	
	<?php include 'scripts.php';?>
</body>
</html>