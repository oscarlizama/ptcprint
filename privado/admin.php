<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
	include 'procesos/lifeprivate.php';
	include 'procesos/validaciones.php';
	$error = false;
	$errormsg = "";
	if (isset($_POST['agregar'])) {
		$imagen_temporal = "";
		$final = "";
		$imagen = $_FILES['file'];
		if (!empty($imagen['name'])) {
			$imagen_temporal = $imagen['tmp_name'];
			if ($imagen['type'] == "image/jpeg" || $imagen['type'] == "image/png" || $imagen['type'] == "image/gif" || $imagen['type'] == "image/bmp") {
				$mTipo = exif_imagetype($imagen_temporal);
				if (($mTipo != IMAGETYPE_JPEG) && ($mTipo != IMAGETYPE_PNG)) {
					$error = true;
					$errormsg = "La imagen tiene un formato inválido o un archivo enmascarado.";
				}else{
					$fp = fopen($imagen_temporal, 'r+b');
					$data = fread($fp, filesize($imagen_temporal));
					$final = base64_encode($data);
					fclose($fp);
				}
			}else{
				$error = true;
				$errormsg = "La imagen tiene un formato inválido.";
			}
		}
		else{
			$error = true;
			$errormsg = "La imagen está vacía";
		}
		if (!$error) {
			$sql = "INSERT INTO imagenes(imagen) VALUES(?)";
			$stmt = $con->prepare($sql);
			if (!$stmt->execute(array($final))) {
				$error = true;
				$errormsg = "Hubo un error al tratar de ejecutar la consulta";
			}
		}
	}
	if (isset($_POST['eliminar'])) {
		$id = $_POST['id'];
		if (validarNumeroEntero($id)) {
			$sql = "DELETE FROM imagenes WHERE id_imagen=?";
			$stmt = $con->prepare($sql);
			if (!$stmt->execute(array($id))) {
				$error = true;
			}	
		}else{
			$error = true;
			$errormsg = "El ID tiene un formato inválido.";
		}
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
			<div class="col-lg-8 col-lg-offset-2">
				<h1 class="h-negro">BIENVENIDO AL ADMINISTRADOR DE PUNTO PRINT</h1>
				<br>
			</div>
		</div>	
	</div>
	<br>
	<div class="container-fluid">
		<h2 class="h-negro text-center">AÑADE IMÁGENES AL SLIDER</h2>
		<div class="row">
			<div class="col-lg-6" id="nuevaimg">
				<form action="admin" method="post" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading text-center">Añadir nueva imagen</div>
						<div class="panel-body">
							<img src="/resources/img/plus.png" alt="" class="center-block">
							<div id="upload-drop" class="uk-placeholder uk-text-center">
	                    		<i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
						    	<span id="textoup">Selecciona una imagen por favor</span> <a class="uk-form-file">aquí<input type="file" name="file"></a>.
							</div>
						</div>
						<div class="panel-footer">
							<button class="btn btn-default btn-block" name="agregar">AÑADIR IMAGEN</button>
						</div>
					</div>
				</form>
			</div>
			<?php 
				$div = "";
				$sqlimagenes = "SELECT * FROM imagenes";
				$stmtimagen = $con->prepare($sqlimagenes);
				$stmtimagen->execute(array());
				while ($datos  = $stmtimagen->fetch(PDO::FETCH_NUM)) {
					$div = "<div class='col-lg-6'>";
						$div .= "<form action='admin' method='post' enctype='multipart/form-data'>";
							$div .= "<div class='panel panel-default'>";
								$div .= "<div class='panel-heading text-center'>IMAGEN</div>";
									$div .= "<div class='panel-body'>";
										$div .= "<input type='text' class='hide' value='$datos[0]' name='id'>";
										$div .= "<img src='data:image/*;base64,$datos[1]' class='imagendivslide'>";
									$div .= "</div>";
									$div .= "<div class='panel-footer'>";
										$div .= "<button class='btn btn-default btn-block' name='eliminar'>ELIMINAR IMAGEN</button>";
									$div .= "</div>";
								$div .= "</div>";
						$div .= "</form>";
					$div .= "</div>";
					print($div);
				}
			?>
			
		</div>
	</div>
	<br>
	<?php 
		include 'scripts.php';
		if ($error) {
			echo "<script>swal('Error','".$errormsg."','error');</script>";
		}
	?>
</body>
</html>