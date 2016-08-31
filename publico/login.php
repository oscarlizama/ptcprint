<?php 
	$error = false;
	$errormsg = null;
	$noregistrado = false;
	$inicioanterior = false;
	$validacion = true;
	$email = "";
	if (isset($_POST['iniciar'])) {
		require_once '../privado/procesos/conexion.php';
		require_once '../privado/procesos/validaciones.php';
		session_start();
		//if (isset($_POST['iniciar_sesion'])) {
		$email = !empty($_POST['correo']) ? trim($_POST['correo']) : null;
		$pass = !empty($_POST['clave']) ? trim($_POST['clave']) : null;
		
		$emailv = "SELECT * FROM clientes WHERE correo_cliente=?";
		$stmt = $con->prepare($emailv);
		$stmt->execute(array($email));

		if (!validarCorreo($email)) {
			$error = true;
			$errormsg = "El correo ingresado no es válido.";
			$validacion = false;
		}

		if (!validarTexto($pass)) {
			$error = true;
			$errormsg = "La clave ingresada ingresado contiene caracteres invalidos inválidos.";
			$validacion = false;	
		}

		if (!$stmt->fetch(PDO::FETCH_BOTH)) {
			$noregistrado = true;
			$error = true;
			$errormsg = "El correo ingresado no está registrado.";
		}

		$iniciado = "SELECT estado_sesion FROM clientes WHERE correo_cliente=?";
		$stmt = $con->prepare($iniciado);
		$stmt->execute(array($email));
		$estado = $stmt->fetch(PDO::FETCH_BOTH);
		
		//$correo = $email;
		if ($estado[0] == "0" && !$error) {
			$usuario = "SELECT clave_cliente AS correo FROM clientes WHERE correo_cliente=? AND estado_cliente=?";
			$stmt = $con->prepare($usuario);
			$stmt->execute(array($email,1));
			$res_usuario = $stmt->fetch(PDO::FETCH_BOTH);
			if (password_verify($pass,$res_usuario[0])) {
				///echo "hoñaaa";
				$_SESSION['autenticado'] = 'si';
				$_SESSION['email'] = $email;
				$_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s"); 
				$iniciado = "UPDATE clientes SET estado_sesion=? WHERE correo_cliente=?";
				$stmt = $con->prepare($iniciado);
				$stmt->execute(array(session_id(),$email));
				header('Location: inicio');
			}else{
				//header('Location: iniciarsesion');
				$errormsg = "El correo que ha ingresado no existe o su contraseña es errónea.";
				$error = true;
			}
		}else{
			if (!$error) {
				$inicioanterior = true;
			}
		}
	//}
		$con = null;
	}
?>
<html>
	<head>
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
						<h1 class="text-center">INICIA SESIÓN</h1>
						<br>
						<form action="iniciarsesion" class="text-center" method="post">
							<label for="">CORREO ELECTRÓNICO</label>
							<br>
							<br>
							<div class="uk-form-icon uk-width-1-1 uk-text-left">
		                        <i class="uk-icon-envelope"></i>
		                        <input class="form-control" type="text" placeholder="Correo electrónico" autocomplete="off" name="correo" value="<?php echo $email;?>" id="correolg">
		                    </div>
							<br>
							<br>
							<label for="">CONTRASEÑA</label>
							<br>
							<br>
							<div class="uk-form-icon uk-width-1-1 uk-text-left">
		                        <i class="uk-icon-lock"></i>
		                        <input class="form-control" type="password" autocomplete="off" name="clave">
		                    </div>
							<br>
							<br>
							<button class="btn btn-medium btn-pink btn-block" name="iniciar">Iniciar sesión</button>
							<a class="btn btn-link pull-right" href="recuperar">Olvidé mi contraseña</a>
							<br>
							<br>
							<br>
							<div class="center-block">
								<a class="btn-registrarme center-block" href="registrarme">¡Registrarme ahora!</a>
							</div>
							<br>
							<div class="center-block">
								<a class="btn-registrarme center-block" href="inicio">Volver al inicio</a>
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