<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
	include 'procesos/lifeprivate.php';
	$button = "";
    if(!empty($_SESSION['autenticadop'])){
        $nombre = $_SESSION['autenticadop'];
        require '../privado/procesos/conexion.php';
        $sql = "SELECT id_permiso FROM usuarios WHERE id_usuario=?";
        $id = $_SESSION['idusr'];
        $stmt = $con->prepare($sql);
        $stmt->execute(array($id));
        $permiso = $stmt->fetch(PDO::FETCH_BOTH);
        $sql = "SELECT tbl_usuarios FROM permisos WHERE id_permiso=?";
        $id = $_SESSION['idusr'];
        $stmt = $con->prepare($sql);
        $stmt->execute(array($permiso[0]));
        $valor = $stmt->fetch(PDO::FETCH_BOTH);
    }
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
					<p id="id_reglog" class="hide"><?php echo $id ?></p>
					<p id="id_reg" class="hide"></p>
					<input type="text" class="hide omitir" name="usuarios[]" value="1" id="tbl" autocomplete='off'>
					<label for="" class="labels">Nombres</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="nombre" autocomplete='off'>
                    <br>
                    <label for="" class="labels">Correo electrónico</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="correo" autocomplete='off'>
                    <br>
                    <label for="" class="labels">Contraseña</label>
                    <input type="password" class="form-control input" name="usuarios[]" id="clave" autocomplete='off'>
                    <br>
                    <label for="" class="labels">Repita contraseña</label>
                    <input type="password" class="form-control omitir input" name="usuarios[]" id="claver" autocomplete='off'>
                    <br>
				</div>
				<div class="col-lg-6 col-md-6">
					<label for="" class="labels">Apellidos</label>
                    <input type="text" class="form-control input" name="usuarios[]" id="apellido" autocomplete='off'>
                    <br>
                    <label for="" class="labels">Tipo de usuario</label>
                    <select class="form-control" name="usuarios[]" id="permiso">
                    	<option value="0" selected="">SELECCIONA UN PERMISO</option>
						<?php 
                            $sql = "SELECT * FROM permisos where estado_permiso=?";
                            $stmt = $con->prepare($sql);
			    			$stmt->execute(array(1));
							while ($datos = $stmt->fetch(PDO::FETCH_BOTH)){
                                echo "<option value='$datos[0]'>$datos[1]</option>";
                            }
                        ?>
					</select>
					<br>
				</div>
				<div class="col-lg-12">
					<?php  
						if ($valor[0] >= 4) {
							$button = 
							"<button class='btn btn-ag btn-scrud col-lg-3 col-md-3 col-sm-3'>
									AGREGAR
									<span class='flaticon-correct icon-ag icon-button'></span>
								</button>";
						}
						print($button);
						$button = "";
					?>
					<?php 
						if ($valor[0] == 2 || $valor[0] == 3 || $valor[0] == 6 || $valor[0] == 7) {
							$button = "
							<button class='btn btn-edusr btn-scrud col-lg-3 col-md-3 col-sm-3 disabled' disabled=''>
								EDITAR
								<span class='flaticon-new-file icon-button icon-ed'></span>
							</button>";
							
						}
						print($button);
						$button = "";
					?>
					<?php 
						if ($valor[0] == 1 || $valor[0] == 3 || $valor[0] == 5 || $valor[0] == 7) {
							$button = 
							"<button class='btn btn-el btn-scrud col-lg-3 col-md-3 col-sm-3 disabled' disabled=''>
								ELIMINAR
								<span class='flaticon-cancel icon-button icon-el'></span>
							</button>";
						}
						print($button);
						$button = "";
					?>
					<?php 
						if ($valor[0] > 0) {
							$button = 
							"<button class='btn btn-nv btn-scrud col-lg-2 col-md-2 col-sm-2'>
								LIMPIAR
								<span class='flaticon-circular-arrow icon-button icon-nv'></span>
							</button>";
						}
						print($button);
						$button = "";
					?>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<label for="" class="labels">Buscar</label>
                <input type="text" class="form-control" id="buscar" autocomplete='off'>
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
				$sql = "SELECT id_usuario,nombre_usuario,apellido_usuario,correo_usuario FROM usuarios WHERE estado_usuario=? AND id_usuario !=?";
				$stmt = $con->prepare($sql);
			    $stmt->execute(array(1,$id));
				while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
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