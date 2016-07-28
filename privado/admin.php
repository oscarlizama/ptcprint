<?php 
	require 'procesos/conexion.php';
	include 'procesos/autenticar.php';
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
			</div>
		</div>	
	</div>
	<?php include 'scripts.php';?>
</body>
</html>