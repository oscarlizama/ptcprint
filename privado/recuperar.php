<!DOCTYPE html>
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
				<form method="post" action="procesos/pass/recuperarbk.php">
					<h2 class="h-negro">Ingrese el correo electrónico</h2>
					<br>
					<input name="correo" placeholder="Email" class="form-control text-center input-lg" autocomplete="off"required autocomplete='off'>
					<br>
					<br>
					<button class="btn btn-primary btn-lg col-md-12 col-lg-12 col-xs-12 col-sm-12" name="iniciar">INICIAR SESIÓN</button>
				</form>
			</div>
		</div>
	</div>
</div>