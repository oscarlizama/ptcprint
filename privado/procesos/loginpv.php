<?php 
	session_start();
	require_once 'conexion.php';
	if (isset($_POST['iniciar'])) {
		$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
		$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : null;
		$usuario = "SELECT clave_usuario,id_usuario FROM usuarios WHERE correo_usuario=? AND estado_usuario=?";
		$stmt = $con->prepare($usuario);
		$stmt->execute(array($email,1));
		$res_usuario = $stmt->fetch(PDO::FETCH_BOTH);
		if (password_verify($pass,$res_usuario[0])) {
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