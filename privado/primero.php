<?php 
	require 'procesos/conexion.php';
	$sql = "SELECT * FROM usuarios";
	$stmt = $con->prepare($sql);
	$stmt->execute(array());
	if ($stmt->fetch(PDO::FETCH_BOTH)) {
		header('Location: administracion');
	}
	require 'procesos/validaciones.php';
	$error = "";
	$nombre = "";
	$apellido = "";
	$correo = "";
	$tipo = "";
	$clave = "";
	$claver = "";
	if (isset($_POST['agregar'])) {
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo = $_POST['correo'];
		//$tipo = $_POST['tipo'];
		$clave = $_POST['clave'];
		$claver = $_POST['claver'];
		if ($clave == $claver) {
			if(validar_clave($clave,$error)){
				if (validarNombrePersona($nombre) && validarNombrePersona($apellido)) {
					if ($claver != $correo && $claver != $nombre && $claver != $apellido) {
						if (!validarTexto($clave) ||
							!validarTexto($claver)) {
							$error = "La contraseña tiene caracteres inválidos";
						}else{
							if (validarCorreo($correo)) {
								$sqlpermiso = "INSERT INTO permisos(nombre_permiso,tbl_configuraciones,tbl_usuarios,tbl_permisos,tbl_fotospr,tbl_clientes,tbl_informacion_corporativa,tbl_redes_sociales,tbl_proveedores,tbl_facturacion,tbl_productos,tbl_medidas_productos,tbl_tipo_contactos,tbl_tipo_productos,tbl_mano_obra,tbl_contactos_proveedor,tbl_equipos,estado_permiso) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
								$stmtpermiso = $con->prepare($sqlpermiso);
								$stmtpermiso->execute(array('Administrador',7,7,7,7,7,7,7,7,7,7,7,7,7,7,7,7,1));

								$passHash = password_hash($claver,PASSWORD_BCRYPT);
								$sql = "INSERT INTO usuarios(nombre_usuario,apellido_usuario,clave_usuario,correo_usuario,id_permiso) VALUES(?,?,?,?,?)";
								$stmt = $con->prepare($sql);
								$stmt->execute(array($nombre,$apellido,$passHash,$correo,1));
								header('Location: administracion');
							}else{
								$error = "Verifica tu correo electrónico";
							}
						}
					}else{
						$error = "La clave coincide con algún dato personal como: nombre, apellido o correo electrónico";
					}
				}else{
					$error = "El nombre o apellido contiene caracteres inválidos.";
				}
			}else{
				$error = $error;
			}
		}else{
			$error = "Las contraseñas son distintas";
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
			<h1 class="h-negro text-center">PRIMER USUARIO</h1>
    		<!--incluyo el menu-->
			<!--<?php //include 'menu_admin.php' ?>-->
			<br>
			
			<br>
			<form action="primero" method="post">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="" class="labels">Nombres</label>
                    <input type="text" class="form-control input" name="nombre" id="nombre" autocomplete='off' value="<?php echo $nombre?>" tabindex="1">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="" class="labels">Apellidos</label>
                    <input type="text" class="form-control input" name="apellido" id="apellido" autocomplete='off' value="<?php echo $apellido?>" tabindex="2">
				</div>
				<div class="col-lg-12 col-md-12">
                    <br>
                    <label for="" class="labels">Correo electrónico</label>
                    <input type="text" class="form-control input" name="correo" id="correo" autocomplete='off' value="<?php echo $correo?>">
                    <br>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="" class="labels">Contraseña</label>
                    <input type="password" class="form-control input" name="clave" id="clave" autocomplete='off' >
                    <br>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="" class="labels">Repita contraseña</label>
                    <input type="password" class="form-control omitir input" name="claver" id="claver" autocomplete='off'>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>
					<br>
					<div class="error">
						<h3 class="h-negro text-center"><?php echo $error; ?></h3>
					</div>
				</div>
				<div class="col-lg-12">
					<button class='btn btn-ag btn-scrud col-lg-12 col-md-12 col-sm-12' name="agregar">
						AGREGAR
						<span class='flaticon-correct icon-ag icon-button'></span>
					</button>
				</div>
			</form>
		</div>
		<br>
		<br>
	</div>
	<script type="text/javascript" src="/publico/js/vendor/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/publico/js/vendor/uikit.min.js"></script>
	<script type="text/javascript" src="/publico/js/vendor/bootstrap.js"></script>
</body>
</html>