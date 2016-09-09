<?php  
	if (!empty($_SESSION['autenticadop'])) {
		if ($_SESSION["autenticadop"] == "si") { 
			require 'conexion.php';
			$nuevo = "SELECT estado_sesion FROM usuarios WHERE correo_usuario=?";
			$stmt = $con->prepare($nuevo);
			$stmt->execute(array($_SESSION['emailc']));
			$estado = $stmt->fetch(PDO::FETCH_BOTH);
			if ($estado[0] != session_id()) {
				$iniciado = "UPDATE usuarios SET estado_sesion=? WHERE correo_usuario=?";
				$stmt = $con->prepare($iniciado);
				$stmt->execute(array(0,$_SESSION['emailc']));
				unset($_SESSION['autenticadop']);
				unset($_SESSION['emailc']);
				$con = null;
				header('Location: administracion');
			}else{
				$fechaGuardada = $_SESSION["ultimoAccesoP"]; 
	    		$ahora = date("Y-n-j H:i:s"); 
	    		$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
	    		if($tiempo_transcurrido >= 600) { 
			    	//si pasaron 10 minutos o más 
			    	$iniciado = "UPDATE usuarios SET estado_sesion=? WHERE correo_usuario=?";
					$stmt = $con->prepare($iniciado);
					$stmt->execute(array(0,$_SESSION['emailc']));
					unset($_SESSION['autenticadop']);
					unset($_SESSION['emailc']);
					$con = null;
					header('Location: administracion');
			      	//sino, actualizo la fecha de la sesión 
			    }else { 
			    	$_SESSION["ultimoAccesoP"] = $ahora; 
			   }
			}
		}
	}
?>