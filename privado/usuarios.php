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
					<input type="text" class="hide omitir" name="usuarios[]" value="1" id="tbl">
					<label for="" class="labels">Nombres</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="nombre">
                    <br>
                    <label for="" class="labels">Correo electrónico</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="correo">
                    <br>
                    <label for="" class="labels">Contraseña</label>
                    <input type="password" class="form-control input" name="usuarios[]" id="clave">
                    <br>
                    <label for="" class="labels">Repita contraseña</label>
                    <input type="password" class="form-control omitir input" name="usuarios[]" id="claver">
                    <br>
				</div>
				<div class="col-lg-6 col-md-6">
					<label for="" class="labels">Apellidos</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="apellido">
                    <br>
                    <label for="" class="labels">Tipo de usuario</label>
                    <select class="form-control" name="usuarios[]" id="permiso">
                    	<option value="0" selected="">SELECCIONA UN PERMISO</option>
						<?php 
                            $sql = "SELECT * FROM permisos where estado_permiso=1";
                            foreach ($con->query($sql) as $datos) {
                                echo "<option value='$datos[0]'>$datos[1]</option>";
                            }
                        ?>
					</select>
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
							"<th><strong>Apellidos</strong></th>".
							"<th><strong>Correo electrónico</strong></th>".
							"<th><strong></strong></th>".
						"</tr>";
				$sql = "SELECT id_usuario,nombre_usuario,apellido_usuario,correo_usuario FROM usuarios WHERE estado_usuario=1";
				foreach ($con->query($sql) as $datos) {
					$tabla .= 
						"<tr>".
							"<td>$datos[0]</td>".
							"<td>$datos[1]</td>".
							"<td>$datos[2]</td>".
							"<td>$datos[3]</td>".
							"<td>".
								"<button class='btn-table' onclick='seleccionar_usuario($datos[0])'>".
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