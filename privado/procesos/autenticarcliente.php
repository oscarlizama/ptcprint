<?php
	//session_start();
	if($_SESSION['autenticado'] != 'si'){		
		header('Location: inicio');
		session_destroy();
	}
?>