<?php 
	$error = "";
    include 'validaciones.php';
	$respuesta = 0;
	$repetida = $_POST['repetida'];
	//$repetida = "Oscar123";
	$config = $_POST["valores"];
	//$config = array("Oscar","Lizama","Oscar123",12);
	$accion = $_POST['accion'];
	if ($accion == 1) {
		if(!(is_null($config[0])) && !(is_null($config[1]))){
			if(trim($config[0])!=""){
				if (validarNombrePersona($config[0]) && validarNombrePersona($config[1])) {
					require 'conexion.php';
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "UPDATE clientes SET nombre_cliente=?, apellido_cliente=? WHERE id_cliente=?";
					$stmt = $con->prepare($sql);
					$stmt->execute($config);
					$sql = null;
					$respuesta = 1;	
				}else{
					$respuesta = 3;
				}
			}
		}	
	}
	if ($accion == 2) {
		if($config[2] == $repetida && $config[0] != $config[2] && $config[1] != $config[2]){
			if (validar_clave($repetida,$error) && validarTexto($config[2]) && validarTexto($repetida)) {
				$passHash = password_hash($config[2],PASSWORD_BCRYPT);
				require 'conexion.php';
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sqla = "SELECT clave_cliente FROM clientes WHERE id_cliente=?";
				$stmta = $con->prepare($sqla);
				$stmta->execute(array($config[3]));
				$anterior = $stmta->fetch(PDO::FETCH_BOTH);
				if (!password_verify($config[2],$anterior[0])) {
					$sql = "UPDATE clientes SET clave_cliente=? WHERE id_cliente=?";
					$stmt = $con->prepare($sql);
					$stmt->execute(array($passHash,$config[3]));
					$sql = null;
					$respuesta = 1;	
				}else{
					$respuesta = 4;		
				}
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