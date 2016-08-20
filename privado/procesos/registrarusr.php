<?php 
	include_once 'validaciones.php';
	$valores = $_POST['valores'];
	$error = "";
	if (!validarNombrePersona($valores[0]) ||
		!validarCorreo($valores[1]) ||
		!validarNombrePersona($valores[3]) ||
		!validarNumeroEntero($valores[4])) 
		exit("invalid");
		
		if (validar_clave($valores[2],$error)) {
			if ($valores[2] == $_POST['repetida'] && $valores[2] != $valores[1] && $valores[2] != $valores[0] && $valores[2] != $valores[3]) {
				//FUNCION PARA ENCRIPTAR
				//POR DEFECTO VIENE PASSWORD_BCRYPT
				//CON UNA LONGITUD DE 60 CARACTERES
				///PUEDE SER DEFAULT O EL BCRYPT
				//USA EL ALGORITMO CRPYT_BLOW_FISH
				$passHash = password_hash($valores[2],PASSWORD_BCRYPT);
	        	require_once 'conexion.php';
	        	//CUANDO HAYA UN ERROR EN LA CONSULTA O UN ERROR EN LA CONSULTA
	        	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        	//CONSTRUYO LA CONSULTA EN BASE AL FORMATO QUE LES DI EN EL FOREACH
	        	$sql = "INSERT INTO usuarios(nombre_usuario,correo_usuario,clave_usuario,apellido_usuario,id_permiso,estado_usuario) VALUES (?,?,?,?,?,?);";
	        	$stmt = $con->prepare($sql);
	        	$stmt->execute(array($valores[0],$valores[1],$passHash,$valores[3],$valores[4],1));
	        	//LIMPIO LA CONSULTA Y CIERRO LA CONXION
	        	$sql = null;
	        	$con = null;
	        	exit("success");	
			}else{
				exit("mala");
			}	
		}else{
			exit("invalid");
		}
	echo json_encode($error);
?>