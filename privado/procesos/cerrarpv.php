<?php 
	session_start();
	unset($_SESSION['autenticadop']);
	unset($_SESSION['emailc']);
	unset($_SESSION['idusr']);
	header('Location: ../index.php');
?>