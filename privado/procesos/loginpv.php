<?php 
	session_start();
	require_once 'conexion.php';
	if (isset($_POST['iniciar'])) {
		$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
		$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : null;
		$usuario = "SELECT COUNT(correo_usuario) AS correo,id_usuario FROM usuarios WHERE correo_usuario=? AND clave_usuario=? AND estado_usuario=1";
		$stmt = $con->prepare($usuario);
		$stmt->execute(array($email,$pass));
		$res_usuario = $stmt->fetch(PDO::FETCH_BOTH);
		if ($res_usuario['correo']>0) {
			$_SESSION['autenticadop'] = 'si';
			$_SESSION['emailc'] = $email;
			$_SESSION['idusr'] = $res_usuario[1];
			header('Location: admin.php');
		}
		else{
			echo "<script>swal('No se pudo inicar sesion','Comprueba que el correo electrónico y la contraseña ingresada sean correctos','error');</script>";
		}
	}
	$con = null;
?>