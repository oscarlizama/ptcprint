<?php 
	require 'conexion.php';
	session_start();
	$iniciado = "UPDATE clientes SET estado_sesion=? WHERE correo_cliente=?";
	$stmt = $con->prepare($iniciado);
	$stmt->execute(array(0,$_SESSION['email']));
	unset($_SESSION['autenticado']);
	unset($_SESSION['email']);
	$con = null;
	header('Location: ../../inicio.php');
?>