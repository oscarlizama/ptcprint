<?php
	session_start();
	if($_SESSION['autenticadop'] != 'si'){		
		header('Location: ../privado/index.php');
		session_destroy();
	}
	else{
		$id_usr = $_SESSION['idusr'];
	}
?>