<?php 
	require_once 'conexion.php';
	session_start();
	if (isset($_POST['iniciar_sesion'])) {
		$email = !empty($_POST['correo']) ? trim($_POST['correo']) : null;
		$pass = !empty($_POST['clave']) ? trim($_POST['clave']) : null;
		$usuario = "SELECT clave_cliente AS correo FROM clientes WHERE correo_cliente=? AND estado_cliente=?";
		$stmt = $con->prepare($usuario);
		$stmt->execute(array($email,1));
		$res_usuario = $stmt->fetch(PDO::FETCH_BOTH);
		if (password_verify($pass,$res_usuario[0])) {
			$_SESSION['autenticado'] = 'si';
			$_SESSION['email'] = $email;
			header('Location: ../../publico/index.php');
		}
		else{

		}
	}
	$con = null;
?>