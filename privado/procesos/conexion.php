<?php  	
 	$DB_host = "localhost";
 	$DB_usuario = "admin_print";
 	$DB_clave = "12345";
 	$DB_base = "punto_print";
	
	try {
		$con = new PDO("mysql:host=".$DB_host."; dbname=".$DB_base, $DB_usuario, $DB_clave);
	} catch (PDOException $e) {
		die($e->getMessage());
	}
?>