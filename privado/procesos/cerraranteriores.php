<?php
	//HAGO LA CONEXION A LA BASE
	require 'conexion.php';
	$respuesta = 0;
	///OBTENGO LAS VARIABLES
	//$correo = 'oslizama@gmail.com';
	//$tipo = 1;
	$correo = $_POST['correo'];
	$tipo = $_POST['tipo'];
	//VEO SI TRATA DE INGRESAR UN USUARIO O UN CLIENTE
	if ($tipo == 1) {
		$sql = "UPDATE clientes SET estado_sesion=? WHERE correo_cliente=?";
	}else if($tipo == 2){
		$sql = "UPDATE usuarios SET estado_sesion=? WHERE correo_usuario=?";
	}
	//PREPARO LA CONSULTA
	$stmt = $con->prepare($sql);
	if($stmt->execute(array(0,$correo))){
		$respuesta = 1;
	}else{
		$respuesta = 2;
	}
	echo json_encode($respuesta);
?>