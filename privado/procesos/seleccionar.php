<?php 
	require 'conexion.php';
	$tbl = $_POST['tbl'];
	$valores = "";
	if($tbl == 1){
		$id = $_POST['id'];
		$sql = "SELECT id_usuario,nombre_usuario,apellido_usuario,clave_usuario,correo_usuario,id_permiso FROM usuarios WHERE id_usuario=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['nombre_usuario'], 
				1 => $datos['apellido_usuario'],
				2 => $datos['clave_usuario'],
				3 => $datos['correo_usuario'],
				4 => $datos['id_permiso'],
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 2){
		$id = $_POST['id'];
		$sql = "SELECT * FROM permisos WHERE id_permiso=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos[1], 
				1 => $datos[2],
				2 => $datos[3],
				3 => $datos[4],
				4 => $datos[5],
				5 => $datos[6],
				6 => $datos[7],
				7 => $datos[8],
				8 => $datos[9],
				9 => $datos[10],
				10 => $datos[11],
				11 => $datos[12],
				12 => $datos[13],
				13 => $datos[14],
				14 => $datos[15],
				15 => $datos[16],
				16 => $datos[17],
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 15){
		$id = $_POST['id'];
		$sql = "SELECT * FROM configuraciones WHERE id_configuracion=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['nombre_configuracion'], 
				1 => $datos['configuracion'],
				2 => $datos['descripcion_configuracion'],
				
			);
		}
		echo json_encode($valores);
		$con = null;
	}
	if($tbl == 17){
		$id = $_POST['id'];
		$sql = "SELECT * FROM contactos_proveedor WHERE id_contacto_proveedor=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['id_proveedor'], 
				1 => $datos['contacto_proveedor'],
				2 => $datos['id_tipo_contacto'],
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 16){
		$id = $_POST['id'];
		$sql = "SELECT * FROM tipos_contacto WHERE id_tipo_contacto=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['tipo_contacto'],
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 20){
		$id = $_POST['id'];
		$sql = "SELECT * FROM redes_sociales WHERE id_red_social=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['nombre_red_social'], 
				1 => $datos['link_red_social'],
				2 => $datos['icono_red_social']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 7){ // Seleccionar para la tabla de productos
		$id = $_POST['id'];
		$sql = "SELECT * FROM productos WHERE id_producto=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array( //aqui se asigna el orden para utilizar luego
				0 => $datos['nombre_producto'], 
				1 => $datos['existencias'],
				2 => $datos['calificacion_promedio'],
				3 => $datos['descripcion_producto'],
				4 => $datos['id_tipo_producto']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 8){ //Seleccionar para la tabla de tipo de productos
		$id = $_POST['id'];
		$sql = "SELECT * FROM tipos_producto WHERE id_tipo_producto =$id";
		foreach ($con->query($sql) as $datos) {
			$valores = array( //aqui se asigna el orden para utilizar luego
				0 => $datos['nombre_tipo_producto']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	//prueba para medidas xd

	if($tbl == 9){ //Seleccionar para la tabla de tipo de productos
		$id = $_POST['id'];
		$sql = "SELECT * FROM medidas_producto WHERE id_medida=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array( //aqui se asigna el orden para utilizar luego
				0 => $datos['id_producto'],
				1 => $datos['medida']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 10){ // Seleccionar para la tabla de productos
		$id = $_POST['id'];
		$sql = "SELECT * FROM fotos_productos WHERE id_foto_producto=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array( //aqui se asigna el orden para utilizar luego
				0 => $datos['id_producto'], 
				1 => $datos['foto_producto']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 21){
		$id = $_POST['id'];
		$sql = "SELECT * FROM proveedores WHERE id_proveedor=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['proveedor'], 
				1 => $datos['direccion_proveedor']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 22){
		$id = $_POST['id'];
		$sql = "SELECT * FROM equipos WHERE id_equipo=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['equipo'], 
				1 => $datos['costo_click_equipo']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 23){
		$id = $_POST['id'];
		$sql = "SELECT * FROM mano_obra WHERE id_actividad=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$valores = array(
				0 => $datos['actividad'], 
				1 => $datos['costo_hora'],
				2 => $datos['descripcion_actividad']
			);
		}
		echo json_encode($valores);
		$con = null;
	}

	if($tbl == 33){
		$i = 0;
		$mdp = array();
		$id = $_POST['id'];
		$sql = "SELECT * FROM medidas_producto M WHERE id_producto=?";
		$stmt = $con->prepare($sql);
	    $stmt->execute(array($id));
		while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
			$mdp[$i] = array( //orden establecido previamente
				0 => $datos['id_medida'],
				1 => $datos['medida']
			);
			$i = $i + 1;
		}
		echo json_encode($mdp);
		$con = null;
	}

?>