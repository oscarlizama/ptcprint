<?php
	session_start();
	if($_SESSION['autenticadop'] != 'si'){		
		header('Location: administracion');
		//session_destroy();
		unset($_SESSION['autenticadop']);
		unset($_SESSION['emailc']);
	}
	else{
		$id_usr = $_SESSION['idusr'];
	}
?>