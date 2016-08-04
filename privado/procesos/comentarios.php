<?php 
	require 'conexion.php';
	include 'validaciones.php';
	$valores = [];
	$respuesta = 0;
	$sql = "";
	$accion = $_POST['accion'];
	$valores = $_POST['valores'];
	$ejecutar = false;
	$array_valores = [];
	//MIRA QUE ACCION DE COMENTARIOS VA A HACER
	if ($accion == 1) {
		//mira si la calificacion es numerica
		if (is_numeric($valores[1])){
			//mira si no esta vacia1
			if (!empty($valores[0])){
				if(!validarTexto($valores[0])){
					$respuesta = 3;
				}else{
					//include 'insertar.php';
					$sql = "INSERT INTO comentarios(comentario,calificacion,id_producto,id_cliente) VALUES(?,?,?,?)";
					array_push($array_valores,$valores[0],$valores[1],$valores[2],$valores[3]);
					$ejecutar = true;
					$respuesta = 1;	
				}
			}else{
				//EL COMENTARIO ESTÁ VACÍO
				$respuesta = 3;
			}
		}else{
			//NO ES UN NUMERO LA CALIFICACION
			$respuesta = 2;
		}
	}
	if ($accion == 2) {
		//include 'actualizar.php';
		$sql = "UPDATE comentarios SET comentario=?, calificacion=? WHERE id_comentario=?";
		array_push($array_valores, $valores[0],$valores[1],$valores[2]);
		$ejecutar = true;
	}
	if ($accion == 3) {
		//include 'eliminar.php';
		$sql = "DELETE FROM comentarios WHERE id_producto=? AND id_cliente=?";
		array_push($array_valores, $valores[0], $valores[1]);
		$ejecutar = true;
		$respuesta = 4;
	}
	if ($accion == 4) {
		//include 'eliminar.php';
		$sql = "DELETE FROM comentarios WHERE id_comentario=?";
		array_push($array_valores, $valores[0]);
		$ejecutar = true;
		$respuesta = 4;
	}
	if ($ejecutar == true) {
		$stmt = $con->prepare($sql);
		$stmt->execute($array_valores);
	}
	echo json_encode($respuesta);
	$con = null;	
?>