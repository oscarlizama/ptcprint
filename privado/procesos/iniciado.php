<?php
	//HAGO LA CONEXION A LA BASE
	require 'conexion.php';
	$respuesta = 0;
	///OBTENGO LAS VARIABLES
	$correo = $_POST['correo'];
	$tipo = $_POST['tipo'];
	//VEO SI TRATA DE INGRESAR UN USUARIO O UN CLIENTE
	if ($tipo == 1) {
		$sql = "SELECT estado_sesion FROM clientes WHERE correo_cliente=?";
	}else if($tipo == 2){
		$sql = "SELECT estado_sesion FROM usuarios WHERE correo_usuario=?";
	}
	//PREPARO LA CONSULTA
	$stmt = $con->prepare($sql);
	$stmt->execute(array($correo));
	$estado = $stmt->fetch(PDO::FETCH_BOTH);
	//VEO SI ESTA INICIADA UNA SESIÓN
	if ($estado[0] == "0") {
		//SI NO ESTA LOGUEADO EN OTRO LADO LO DEJO PASAR
		$respuesta = 1;
	}else if ($estado[0] != "0") {
		//SI ESTA LOGUEADO LE MUESTRO UNA ALERTA
		$respuesta = 2;
	}
	echo json_encode($respuesta);
?>