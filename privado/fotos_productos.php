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
        $sql = "SELECT tbl_fotospr FROM permisos WHERE id_permiso=?";
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
					<p id="id_reg" class="hide"></p>
					<input type="text" class="hide omitir" value="10" id="tbl" autocomplete='off'>
					<label for="" class="labels">Producto</label>
                    <select class="form-control" name="usuarios[]" id="prod">
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
				</div>
				<div class="col-lg-6 col-md-6" id="uploaddiv">
					<output id="list"></output>
					<img id="vistaPrevia" src="" alt="" />
					<br>
					<form method="post" id="formulario" enctype="multipart/form-data">
                    	<!--<input type="file" class="input" id="imagen" name="file" autocomplete='off'>-->
                    	<div id="upload-drop" class="uk-placeholder uk-text-center">
                    		<i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
					    	<span id="textoup">Selecciona una imagen por favor</span> <a class="uk-form-file">aquí<input id="imagen" type="file" name="file"></a>.
						</div>
						<div id="progressbar" class="uk-progress uk-hidden">
                            <div class="uk-progress-bar" style="width: 0%;">0%</div>
                        </div>
                    	<input type="text" class="input hide omitir" id="imagenb64" name="antigua" value="ninguna" autocomplete='off'>
                    </form>
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
							<button class='btn btn-ed btn-scrud col-lg-3 col-md-3 col-sm-3 disabled' disabled=''>
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
                <input type="text" class="form-control" id="buscar">
                <br>
			</div>
			<div class="col-lg-12" id="tabla_div">
			<?php 
					$tabla = 
					"<table class='table-bk'>" .
						"<tr class='tb-heading'>".
							"<th><strong>#</strong></th>".
							"<th><strong>Producto</strong></th>".
							"<th><strong>Miniatura</strong></th>".
							"<th><strong></strong></th>".
						"</tr>";
				$sql = "SELECT id_foto_producto, P.nombre_producto, foto_producto FROM productos P, fotos_productos FP WHERE estado_foto_producto = ? AND P.id_producto = FP.id_producto";
				$stmt = $con->prepare($sql);
			    $stmt->execute(array(1));
				while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
					$tabla .= 
						"<tr>".
							"<td>$datos[0]</td>".
							"<td>$datos[1]</td>".
							"<td><img class='thumb img-responsive img-circle' src='data:image/*;base64, $datos[2]' width='70' height='60'/></td>".
							"<td>".
								"<button class='btn-table' onclick='seleccionar_foto_producto($datos[0])'>".
									"Ver imagen".
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