<?php 
require_once 'validaciones.php';
	//EMPIEZA LA MENSAJERIA
	//CERO SIGNIFICA QUE NO HA ESCRITO UN ASUNTO
	$respuesta = 0;
	require 'conexion.php';
	//OBTENGO LOS DATOS PARA EJECUTAR LA CONSULTA
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	$id_cliente = $_POST['id_cl'];
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ((

			!validarTexto($asunto) ||
			!validarTexto($mensaje) ||
			!validarNumeroEntero($id_cliente)

			)) {
				header('Location: ../../publico/cotizarcliente.php');
				exit;
			}
	//$asunto = "PRUEBA";
	//$mensaje = "FUNCIONA";
	//$id_cliente = 5;
	//VEO QUE EL ASUNTO ES VALIDO
	if(!(is_numeric($asunto))){
		//EJECUTO EL PROCEDIMIENTO
		$sqliniciarmsj = "CALL mensajes_iniciar(?,?,?)";
		$stmtc = $con->prepare($sqliniciarmsj);
		$stmtc->execute(array($asunto,$id_cliente,$mensaje));
		//EL UNO SIGNIFICA QUE SE AGREGO
		$respuesta = 1;
	}else{
		//EL DOS SIGNIFICA QUE HA ESCRITO UN ASUNTO NO VALIDO
		$respuesta = 2;
	}
	header('Location: ../../publico/cotizarcliente.php');
	//echo json_encode($respuesta);
	$con = null;
?>