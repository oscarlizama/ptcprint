<?php 
	$error = false;
	$errormsg = null;
	$noregistrado = false;
	$inicioanterior = false;
	$validacion = true;
	$correo = "";
	if (isset($_POST['recuperar'])) {
		require_once '../privado/procesos/conexion.php';
		require_once '../privado/procesos/validaciones.php';
		//if (isset($_POST['iniciar_sesion'])) {
		$correo = !empty($_POST['correo']) ? trim($_POST['correo']) : null;
		
		if (!validarCorreo($correo)) {
			$error = true;
			$errormsg = "El correo ingresado no es válido.";
			$validacion = false;
		}else{
			$emailv = "SELECT * FROM clientes WHERE correo_cliente=?";
			$stmt = $con->prepare($emailv);
			$stmt->execute(array($correo));
			if (!$stmt->fetch(PDO::FETCH_BOTH)) {
				$noregistrado = true;
				$error = true;
				$errormsg = "El correo ingresado no está registrado.";
			}
		}
		
		//$correo = $email;
		if (!$error) {
			require_once "../privado/procesos/pass/recuperar.php";
		}
		$con = null;
	}
?>
<html>
	<head>
		<meta name="theme-color" content="#ec407a">
		<?php 
			include "links.php";
		?>
		<title>Recuperar contraseña | Punto Print</title>
	</head>
	<body id="bodylogin">
		<br>
		<div class="container-fluid">
			<br>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-2" id="logindiv">
				<br>
				<div class="panel panel-default">
					<div class="panel-body">
						<h1 class="text-center">RECUPERAR CONTRASEÑA</h1>
						<br>
						<form action="recuperar" class="text-center" method="post">
							<label for="">CORREO ELECTRÓNICO</label>
							<br>
							<br>
							<div class="uk-form-icon uk-width-1-1 uk-text-left">
		                        <i class="uk-icon-envelope"></i>
		                        <input class="form-control" type="text" placeholder="Correo electrónico" autocomplete="off" name="correo" value="<?php echo $correo;?>" id="correolg">
		                    </div>
							<br>
							<br>
							<br>
							<button class="btn btn-medium btn-pink btn-block" name="recuperar">Recuperar contraseña</button>
							<br>
							<br>
							<div class="center-block">
								<a class="btn-registrarme center-block" href="iniciarsesion">Volver al inicio de sesión</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--FIN DEL FOOTER-->
		<?php 
			include "scripts.php";
		?>
		<?php 
			if($error){
				echo "<script>error_registrar('$errormsg');</script>";
			}
			if ($inicioanterior) {
				echo "<script>cerrar_sesion(1);</script>";	
			}
		?>
	</body>
</html>