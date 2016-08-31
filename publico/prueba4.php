<?php 
	if (trim($_GET['nombre'])) {
		$nombre = $_GET['nombre'];
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
		<?php echo $nombre ?>
	</body>
</html>