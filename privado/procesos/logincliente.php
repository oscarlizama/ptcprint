<?php 
	require_once 'conexion.php';
	session_start();
	if (isset($_POST['iniciar_sesion'])) {
		$email = !empty($_POST['correo']) ? trim($_POST['correo']) : null;
		$pass = !empty($_POST['clave']) ? trim($_POST['clave']) : null;
		$usuario = "SELECT COUNT(correo_cliente) AS correo FROM clientes WHERE correo_cliente=? AND clave_cliente=? AND estado_cliente=1";
		$stmt = $con->prepare($usuario);
		$stmt->execute(array($email,$pass));
		$res_usuario = $stmt->fetch(PDO::FETCH_BOTH);
		if ($res_usuario['correo']>0) {
			$_SESSION['autenticado'] = 'si';
			$_SESSION['email'] = $email;
			///echo $_SESSION['autenticado'];
			//setcookie('email',$email);
			//header('Location: ../../publico/index.php');
		}
		else{
			echo "<script>swal('No se pudo inicar sesion','Comprueba que el correo electrónico y la contraseña ingresada sean correctos','error');</script>";
		}
		header('Location: ../../publico/index.php');
	}
	$con = null;
?>