<?php
	$correo = "";
	require 'procesos/conexion.php';
	$sql = "SELECT * FROM usuarios";
	$stmt = $con->prepare($sql);
	$stmt->execute(array());
	if ($stmt->fetch(PDO::FETCH_BOTH)) {
		require 'procesos/loginpv.php';
		if (isset($_SESSION['autenticadop'])) {
			header('Location: admin');	
		}
	}else{
		header('Location: primero');
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
	<!--<div class="container-fluid" id="login-p">
		<div class="overlay"></div>
		<div class="row">
			<br>
			<div class="col-lg-4 col-md-4 col-sm-6 col-sm-offset-3 col-lg-offset-4 col-md-offset-4 text-center" id="frm">
				<form method="post">
					<label class="text-center login-header">INICIAR SESIÓN</label>
					<br>
					<label class="text-center login-header">Punto Print</label>
					<br>
					<br>
					<br>
					<label for="inputEmail" class="labels-blanco">CORREO ELECTRÓNICO</label>
					<input id="correo" type="email" name="email" placeholder="Email" class="form-control text-center input-lg" required autocomplete='off' value='<?php echo $correo?>'>
					<br>
					<br>
					<label for="inputEmail" class="labels-blanco">CONTRASEÑA</label>
					<input type="password" name="pass" placeholder="Contraseña" class="form-control text-center input-lg" required autocomplete='off'>
					<br>
					<a href="recuperaradmin">OLVIDÉ MI CONTRASEÑA</a>
					<br>
					<br>
					<button class="btn btn-primary btn-lg col-md-12 col-lg-12 col-xs-12 col-sm-12" name="iniciar">INICIAR SESIÓN</button>
				</form>
			</div>
		</div>
	</div>-->
	<div class="container-fluid" id="login-p">
		<br>
		<br>
		<br>
		<br>
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-2" id="logindiv">
			<br>
			<div id="formulariol">
				<div class="panel-body">
					<h1 class="text-center h-negro">INICIAR SESIÓN</h1>
					<br>
					<form action="" class="text-center" method="post">
						<label for="">CORREO ELECTRÓNICO</label>
						<br>
						<br>
						<div class="uk-form-icon uk-width-1-1 uk-text-left">
	                        <i class="uk-icon-envelope"></i>
	                        <input class="form-control" type="text" placeholder="Correo electrónico" autocomplete="off" name="email" value="<?php echo $correo;?>" id="correo">
	                    </div>
						<br>
						<br>
						<label for="">CONTRASEÑA</label>
						<br>
						<br>
						<div class="uk-form-icon uk-width-1-1 uk-text-left">
	                        <i class="uk-icon-lock"></i>
	                        <input class="form-control" type="password" autocomplete="off" name="pass">
	                    </div>
						<br>
						<br>
						<button class="btn btn-medium btn-primary btn-block" name="iniciar">Iniciar sesión</button>
						<br>
						<br>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include 'scripts.php';
		if ($activo == true) {
			echo ("<script>cerrar_sesion(2);</script>");
		}
		if ($iniciar == false) {
			echo ("<script>swal('No se puede iniciar sesion','Comprueba que los datos ingresados sean correctos','error');</script>");
		}
	?>
</body>
</html>