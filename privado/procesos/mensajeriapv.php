<?php 
require_once 'validaciones.php';
	//EMPIEZA LA MENSAJERIA
	//CERO SIGNIFICA QUE NO HA ESCRITO UN ASUNTO
	$respuesta = 0;
	require 'conexion.php';
	//OBTENGO LOS DATOS PARA EJECUTAR LA CONSULTA
	//$mensaje = $_POST['mensaje'];
	//$id_conver = $_POST['idconver'];
	$valores = [];
	$valores = $_POST["valores"];
	// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ((

			!validarNumeroEntero($valores[0]) ||
			!validarTexto($valores[1]) ||
			!validarTexto($valores[2]) 

			)) exit(json_encode(2));
	//$asunto = "PRUEBA";
	//$mensaje = "FUNCIONA";
	//$id_conver = 6;
	//VEO QUE EL ASUNTO ES VALIDO
	if(!(is_numeric($valores[1]))){
		if ($valores[1] != null) {
			//EJECUTO EL PROCEDIMIENTO
			$sqlmsjrspd = "INSERT INTO mensajes(id_conversacion,mensaje,emisor) VALUES(?,?,?)";
			$stmtc = $con->prepare($sqlmsjrspd);
			$stmtc->execute($valores);
			//EL UNO SIGNIFICA QUE SE AGREGO
			$respuesta = 1;
		}
	}else{
		//EL DOS SIGNIFICA QUE HA ESCRITO UN ASUNTO NO VALIDO
		$respuesta = 2;
	}
	//header('Location: ../cotizaciones.php');
	echo json_encode($respuesta);
	$con = null;
?>