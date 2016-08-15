<?php 
	$iniciar = true;
	$activo = false;
	session_start();
	require_once 'conexion.php';
	if (isset($_POST['iniciar'])) {
		$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
		$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : null;
		$iniciado = "SELECT estado_sesion FROM usuarios WHERE correo_usuario=?";
		$stmt = $con->prepare($iniciado);
		$stmt->execute(array($email));
		$estado = $stmt->fetch(PDO::FETCH_BOTH);
		$correo = $email;
		if ($estado[0] == "0") {
			//echo "holaaa";
			$usuario = "SELECT clave_usuario,id_usuario FROM usuarios WHERE correo_usuario=? AND estado_usuario=?";
			$stmt = $con->prepare($usuario);
			$stmt->execute(array($email,1));
			$res_usuario = $stmt->fetch(PDO::FETCH_BOTH);
			if (password_verify($pass,$res_usuario[0])) {
				$_SESSION['autenticadop'] = 'si';
				$_SESSION['emailc'] = $email;
				$_SESSION['idusr'] = $res_usuario[1];
				$_SESSION["ultimoAccesoP"] = date("Y-n-j H:i:s"); 
				$iniciado = "UPDATE usuarios SET estado_sesion=? WHERE correo_usuario=?";
				$stmt = $con->prepare($iniciado);
				$stmt->execute(array(session_id(),$email));
				header('Location: admin.php');
				$iniciar = true;
			}else{
				$iniciar = false;
			}
		}else{
			$activo = true;
		}
	}
	//echo $_SESSION['idusr'];
	$con = null;
?>