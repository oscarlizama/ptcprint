<?php  
	if (!empty($_SESSION['autenticadop'])) {
		if ($_SESSION["autenticadop"] == "si") { 
	    	$fechaGuardada = $_SESSION["ultimoAccesoP"]; 
    		$ahora = date("Y-n-j H:i:s"); 
    		$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
    		if($tiempo_transcurrido >= 600) { 
		    	//si pasaron 10 minutos o más 
		    	require 'conexion.php';
		    	$iniciado = "UPDATE usuarios SET estado_sesion=? WHERE correo_usuario=?";
				$stmt = $con->prepare($iniciado);
				$stmt->execute(array(0,$_SESSION['emailc']));
				unset($_SESSION['autenticadop']);
				unset($_SESSION['emailc']);
				$con = null;
				header('Location: private.php');
		      	//sino, actualizo la fecha de la sesión 
		    }else { 
		    	$_SESSION["ultimoAccesoP"] = $ahora; 
		   } 	
		}
	}
?>