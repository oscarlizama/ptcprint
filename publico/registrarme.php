<?php 
	$agregado = false;
	$error = false;
	$nombre = "";
	$apellido = "";
	$correo = "";
	$clave = "";
	$claver = "";
	if (isset($_POST['registrarbtn'])) {
		$errorclave = "";
		include "../privado/procesos/validaciones.php";
		include "../privado/procesos/vrfcaptcha.php";
		//echo $respuestav;
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo = $_POST['correo'];
		$clave = $_POST['clave'];
		$claver = $_POST['claver'];
		if ($respuestav == "bueno") {
			if (validarNombrePersona($nombre) && trim($nombre)) {
				if (validarNombrePersona($apellido) && trim($apellido)) {
					if (validarCorreo($correo) && trim($correo)) {
						if (validar_clave($clave,$errorclave) && validar_clave($claver,$errorclave) && trim($clave) && trim($claver)) {
							if ($claver == $clave) {
								require_once '../privado/procesos/conexion.php';
								$sql = "SELECT * FROM clientes WHERE correo_cliente=?";
								$stmt = $con->prepare($sql);
								$stmt->execute(array($correo));
								if (!$stmt->fetch(PDO::FETCH_BOTH)) {
									$passHash = password_hash($claver,PASSWORD_BCRYPT);
							        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							        //CONSTRUYO LA CONSULTA EN BASE AL FORMATO QUE LES DI EN EL FOREACH
							        $sql = "INSERT INTO clientes(nombre_cliente,apellido_cliente,correo_cliente,clave_cliente,estado_cliente) VALUES (?,?,?,?,?);";
							        $stmt = $con->prepare($sql);
							        $stmt->execute(array($nombre,$apellido,$correo,$passHash,2));
							        require_once '../privado/procesos/pass/correoregistro.php';
							        //$enlace = "https://www.puntoprintsv.com/verificarcuenta?vrf=".$
							        //LIMPIO LA CONSULTA Y CIERRO LA CONXION
							        $sql = null;
							        $con = null;
							        $agregado = true;
							        $nombre = "";
									$apellido = "";
									$correo = "";
									$clave = "";
									$claver = "";
								}else{
									$errormsg = "Ya existe una cuenta con este correo. ¿Has olvidado la contraseña?";	
									$error = true;
									$nombre = "";
									$apellido = "";
									//$correo = "";
									$clave = "";
									$claver = "";
								}
							}else{
								$errormsg = "Las contraseñas no coniciden.";	
								$error = true;
							}
						}else{
							$errormsg = $errorclave;	
							$error = true;
						}
					}else{
						$errormsg = "El correo contiene caractéres inválidos.";	
						$error = true;
						$correo = "";
					}
				}else{
					$errormsg = "El apellido contiene caractéres inválidos.";	
					$error = true;
					$apellido = "";
				}
			}else{
				$errormsg = "El nombre contiene caractéres inválidos.";	
				$error = true;
				$nombre = "";
			}
		}else{
			$errormsg = "No se ha resuelto el catpcha. Por favor completalo para registrarte.";
			$error = true;
		}
	}
?>
<html>
	<head>
		<meta name="theme-color" content="#ec407a">
		<?php include "links.php" ?>
		<title>Registrarme | Punto Print</title>
	</head>
	<body id="bodylogin">
		<br>
		<br>
		<div class="container-fluid">
			<div class="col-xs-12 col-sm-10 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-1" id="logindiv">
				<br>
				<div class="panel panel-default">
					<div class="panel-body">
						<h1 class="text-center">REGISTRO</h1>
						<br>
						<form action="registrarme" method="post">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label for="">NOMBRES</label>
								<div class="uk-form-icon uk-width-1-1 uk-text-left">
			                        <i class="uk-icon-user"></i>
			                        <input class="form-control" type="text" placeholder="Nombres" autocomplete="off" name="nombre" value="<?php echo($nombre)?>">
			                    </div>
			                    <br>
			                    <br>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label for="">APELLIDOS</label>
								<div class="uk-form-icon uk-width-1-1 uk-text-left">
			                        <i class="uk-icon-user"></i>
			                        <input class="form-control" type="text" placeholder="Apellidos" autocomplete="off" name="apellido" value="<?php echo($apellido)?>">
			                    </div>
			                    <br>
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
								<br>
								<label for="">CORREO ELECTRÓNICO</label>
								<div class="uk-form-icon uk-width-1-1 uk-text-left">
			                        <i class="uk-icon-envelope"></i>
			                        <input class="form-control" type="text" placeholder="Correo electrónico" autocomplete="off" name="correo" value="<?php echo($correo)?>">
			                    </div>
			                    <br>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<br>
								<label for="">CONTRASEÑA</label>
								<div class="uk-form-icon uk-width-1-1 uk-text-left">
			                        <i class="uk-icon-lock"></i>
			                        <input class="form-control" type="password" autocomplete="off" name="clave">
			                    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<br>
								<label for="">REPITA LA CONTRASEÑA</label>
								<div class="uk-form-icon uk-width-1-1 uk-text-left">
			                        <i class="uk-icon-lock"></i>
			                        <input class="form-control" type="password" autocomplete="off" name="claver">
			                    </div>
			                    <br>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        	<br>
	                        	<div class="uk-grid">
	                           		<div class="uk-container-center">
	                           			<div class="g-recaptcha" data-sitekey="6LeVzScTAAAAAGhYA3ikaTrxUduK2ejq5Nf_0yV5"></div>
	                           		</div>
	                        	</div>
	                        	<br>
	                     	</div>
							<button class="btn btn-medium btn-success btn-block" name="registrarbtn">REGISTRARME</button>
							<br>
							<div class="center-block">
								<a class="btn-registrarme center-block" href="inicio">VOLVER AL INICIO</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--FIN DEL FOOTER-->
		
		<?php include "scripts.php" ?>
	</body>
	<?php 
		if ($agregado) {
			echo "<script>error_registrar('¡REGISTRO EXITOSO!');</script>";
		}
		if($error){
			echo "<script>error_registrar('$errormsg');</script>";
		}
	?>
</html>