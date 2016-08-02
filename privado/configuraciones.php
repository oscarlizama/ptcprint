<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
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
			<br>
			<br>
			<div class="col-lg-12" id="frm">
				<div class="col-lg-6 col-md-6">
					<p id="id_reg" class="hide"></p>
					<input type="text" class="hide omitir" name="usuarios[]" value="15" id="tbl" autocomplete="off">
					<label for="" class="labels">Nombre configuración</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="nombre" autocomplete="off">
                    <br>
                    <label for="" class="labels">Configuración</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="configuracion" autocomplete="off">
                    <br>
                    <label for="" class="labels">Descripción</label>
                    <textarea type="text" class="form-control input estira" name="usuarios[]" id="descripcion" rows="5" autocomplete="off"></textarea> 
                    <br>
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
		<br>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<label for="" class="labels">Buscar</label>
                <input type="text" class="form-control" id="buscar" autocomplete="off">
                <br>
			</div>
			<div class="col-lg-12" id="tabla_div">
			<?php 
					$tabla = 
					"<table class='table-bk'>" .
						"<tr class='tb-heading'>".
							"<th><strong>#</strong></th>".
							"<th><strong>Nombre configuracion</strong></th>".
							"<th><strong>Configuración</strong></th>".
							"<th><strong>Descripción</strong></th>".
							"<th><strong></strong></th>".
						"</tr>";
				$sql = "SELECT * FROM configuraciones WHERE estado_configuracion=?";
				$stmt = $con->prepare($sql);
			    $stmt->execute(array(1));
				while ($datos = $stmt->fetch(PDO::FETCH_BOTH))  {
					$tabla .= 
						"<tr>".
							"<td>$datos[0]</td>".
							"<td>$datos[1]</td>".
							"<td>$datos[2]</td>".
							"<td>$datos[3]</td>".
							"<td>".
								"<button class='btn-table' onclick='seleccionar_configuracion($datos[0])'>".
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
	</div>
	<?php include 'scripts.php';?>
</body>
</html>