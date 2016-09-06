<?php
	session_start();
	if($_SESSION['autenticadop'] != 'si'){		
		header('Location: administracion');
		session_destroy();
	}
	else{
		$id_usr = $_SESSION['idusr'];
	}
?>