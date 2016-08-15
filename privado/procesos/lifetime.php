<?php  
	if(!isset($_SESSION)){
    	session_start();
    	if (!empty($_SESSION['autenticado'])) {
    		if ($_SESSION["autenticado"] == "si") { 
    			require 'conexion.php';
    			$nuevo = "SELECT estado_sesion FROM clientes WHERE correo_cliente=?";
				$stmt = $con->prepare($nuevo);
				$stmt->execute(array($_SESSION['email']));
				$estado = $stmt->fetch(PDO::FETCH_BOTH);
				if ($estado[0] != session_id()) {
					$iniciado = "UPDATE clientes SET estado_sesion=? WHERE correo_cliente=?";
					$stmt = $con->prepare($iniciado);
					$stmt->execute(array(0,$_SESSION['email']));
					unset($_SESSION['autenticado']);
					unset($_SESSION['email']);
					$con = null;
					header('Location: inicio.php');
				}
				else{
					$fechaGuardada = $_SESSION["ultimoAcceso"]; 
		    		$ahora = date("Y-n-j H:i:s"); 
		    		$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
		    		if($tiempo_transcurrido >= 600) { 
				    	//si pasaron 10 minutos o más 
				    	$iniciado = "UPDATE clientes SET estado_sesion=? WHERE correo_cliente=?";
						$stmt = $con->prepare($iniciado);
						$stmt->execute(array(0,$_SESSION['email']));
						unset($_SESSION['autenticado']);
						unset($_SESSION['email']);
						$con = null;
						header('Location: ../publico/index.php');
				      	//sino, actualizo la fecha de la sesión 
				    }else { 
				    	$_SESSION["ultimoAcceso"] = $ahora; 
				   } 	
				}
			}
    	}
	}
?>