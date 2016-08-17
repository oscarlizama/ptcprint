<?php 
	require_once 'conexion.php';
	require_once 'validaciones.php';
	session_start();
	//if (isset($_POST['iniciar_sesion'])) {
		$email = !empty($_POST['correo']) ? trim($_POST['correo']) : null;
		$pass = !empty($_POST['clave']) ? trim($_POST['clave']) : null;
		$iniciado = "SELECT estado_sesion FROM clientes WHERE correo_cliente=?";
		$stmt = $con->prepare($iniciado);
		$stmt->execute(array($email));
		$estado = $stmt->fetch(PDO::FETCH_BOTH);
		//$correo = $email;
		if ($estado[0] == "0") {
			$usuario = "SELECT clave_cliente AS correo FROM clientes WHERE correo_cliente=? AND estado_cliente=?";
			$stmt = $con->prepare($usuario);
			$stmt->execute(array($email,1));
			$res_usuario = $stmt->fetch(PDO::FETCH_BOTH);
			if (password_verify($pass,$res_usuario[0])) {
				$_SESSION['autenticado'] = 'si';
				$_SESSION['email'] = $email;
				$_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s"); 
				$iniciado = "UPDATE clientes SET estado_sesion=? WHERE correo_cliente=?";
				$stmt = $con->prepare($iniciado);
				$stmt->execute(array(session_id(),$email));
				header('Location: ../../inicio.php');
			}
			else{
				header('Location: ../../inicio.php');	
			}
		}
	//}
	$con = null;
	//echo session_id();
?>