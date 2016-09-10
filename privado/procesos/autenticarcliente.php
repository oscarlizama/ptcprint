<?php
	//session_start();
	if($_SESSION['autenticado'] != 'si'){		
		header('Location: inicio');
		//session_destroy();
		unset($_SESSION['autenticado']);
		unset($_SESSION['email']);
	}
?>