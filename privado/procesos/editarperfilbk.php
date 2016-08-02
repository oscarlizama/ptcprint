<?php 
	$error = "";
	include_once 'validaciones.php';
	$respuesta = 0;
	$repetida = $_POST['repetida'];
	$config = $_POST["valores"];
	if ($_POST['accion'] == 1) {
		if(!(is_null($config[0])) && !(is_null($config[1]))){
			if(trim($config[0])!="")
			{
				require 'conexion.php';
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE usuarios SET nombre_usuario=?, apellido_usuario=? WHERE id_usuario=?";
				$stmt = $con->prepare($sql);
				$stmt->execute($config);
				$sql = null;
				$respuesta = 1;	
			}
		}
	}
	if ($_POST['accion'] == 2) {
		if($config[2] == $repetida && $config[0] != $config[2] && $config[1] != $config[2]){
			if (validar_clave($config[2],$error) && validarTexto($config[2]) && validarTexto($repetida)) {
				$passHash = password_hash($config[2],PASSWORD_BCRYPT);
				require 'conexion.php';
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE usuarios SET clave_usuario=? WHERE id_usuario=?";
				$stmt = $con->prepare($sql);
				$stmt->execute(array($passHash,$config[3]));
				$sql = null;
				$respuesta = 1;	
			}else{
				$respuesta = $error;
			}
		}else{
			$respuesta = 2;
		}	
	}
	//header('Location: ../../publico/index.php');
	echo json_encode($respuesta);
	$con = null;
?>