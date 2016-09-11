<?php 
	$error = false;
	$errormsg = null;
	$noregistrado = false;
	$inicioanterior = false;
	$validacion = true;
	$correo = "";
	if (isset($_POST['recuperar'])) {
		require_once 'procesos/conexion.php';
		require_once 'procesos/validaciones.php';
		//if (isset($_POST['iniciar_sesion'])) {
		$correo = !empty($_POST['correo']) ? trim($_POST['correo']) : null;
		
		if (!validarCorreo($correo)) {
			$error = true;
			$errormsg = "El correo ingresado no es válido.";
			$validacion = false;
		}else{
			$emailv = "SELECT * FROM usuarios WHERE correo_usuarios=?";
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
			require_once "procesos/pass/recuperarbk.php";
		}
		$con = null;
	}
?>
<html lang="es">
<head>
	<title>Punto Print - Soluciones en impresiones</title>
	<!--Aqui incluyo los links de estilo, los links en general-->
	<?php include 'links.php' ?>
</head>
<body>
	<div class="container-fluid" id="login-p">
		<div class="row">
			<br>
			<br>
			<br>
			<br>
			<h1 class="h-negro text-center">Recuperar contarseña de Punto Print</h1>
			<br>
			<br>
			<br>
			<div class="col-lg-4 col-md-4 col-sm-6 col-sm-offset-3 col-lg-offset-4 col-md-offset-4 text-center" id="frm">
				<form method="post" action="recuperaradmin">
					<h2 class="h-negro">Ingrese el correo electrónico</h2>
					<br>
					<input name="correo" placeholder="Email" class="form-control text-center input-lg" autocomplete="off"required autocomplete='off'>
					<br>
					<br>
					<button class="btn btn-primary btn-lg col-md-12 col-lg-12 col-xs-12 col-sm-12" name="recuperar">INICIAR SESIÓN</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/publico/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script type="text/javascript" src="/publico/js/vendor/uikit.min.js"></script>
	<script type="text/javascript" src="/publico/js/vendor/sweetalert.min.js"></script>
	<?php 
		if($error){
			echo "<script>swal('Error','$errormsg','error');</script>";
		}
	?>
</body>
</html>
