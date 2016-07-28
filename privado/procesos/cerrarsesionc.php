<?php 
	session_start();
	unset($_SESSION['autenticado']);
	unset($_SESSION['email']);
	header('Location: ../../publico/index.php');
?>