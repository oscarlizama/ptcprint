<?php 
	session_start();
	require 'conexion.php';
	$cerrar = "UPDATE usuarios SET estado_sesion=? WHERE correo_usuario=?";
	$stmt = $con->prepare($cerrar);
	$stmt->execute(array(0,$_SESSION['emailc']));
	unset($_SESSION['autenticadop']);
	unset($_SESSION['emailc']);
	unset($_SESSION['idusr']);
	header('Location: ../index.php');
?>