<?php 
	require 'conexion.php';
	if($_POST['sql'] == 1){
		$i = 0;
		$sql = "SELECT id_usuario,nombre_usuario,apellido_usuario,correo_usuario FROM usuarios WHERE estado_usuario=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_usuario'], 
				1 => $datos['nombre_usuario'], 
				2 => $datos['apellido_usuario'],
				3 => $datos['correo_usuario'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 2){
		$i = 0;
		$sql = "SELECT id_permiso,nombre_permiso FROM permisos WHERE estado_permiso=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_permiso'], 
				1 => $datos['nombre_permiso']
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}
	
	if($_POST['sql'] == 15){
		$i = 0;
		$sql = "SELECT * FROM configuraciones WHERE estado_configuracion=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_configuracion'],
				1 => $datos['nombre_configuracion'], 
				2 => $datos['configuracion'],
				3 => $datos['descripcion_configuracion'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}	
	if($_POST['sql'] == 17){
		$i = 0;
		$sql = "SELECT id_contacto_proveedor,proveedores.proveedor proveedor,contactos_proveedor.contacto_proveedor,tipos_contacto.tipo_contacto FROM contactos_proveedor INNER JOIN proveedores ON contactos_proveedor.id_proveedor = proveedores.id_proveedor INNER JOIN tipos_contacto ON contactos_proveedor.id_tipo_contacto = tipos_contacto.id_tipo_contacto WHERE estado_contacto_proveedor=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_contacto_proveedor'],
				1 => $datos['proveedor'], 
				2 => $datos['contacto_proveedor'],
				3 => $datos['tipo_contacto'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}	
	if($_POST['sql'] == 16){
		$i = 0;
		$sql = "SELECT * FROM tipos_contacto WHERE estado_tipo_contacto=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_tipo_contacto'],
				1 => $datos['tipo_contacto'], 
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 7){
		$i = 0;
		$sql = "SELECT id_producto,nombre_producto,existencias, TP.nombre_tipo_producto FROM productos P, tipos_producto TP WHERE estado_producto = 1 AND P.id_tipo_producto = TP.id_tipo_producto";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_producto'],
				1 => $datos['nombre_producto'],
				2 => $datos['existencias'], 
				3 => $datos['nombre_tipo_producto'], 
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 8){ //info de la tabla del crud de tipo de productos
		$i = 0;
		$sql = "SELECT id_tipo_producto, nombre_tipo_producto FROM tipos_producto WHERE estado_tipo_producto = 1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_tipo_producto'],
				1 => $datos['nombre_tipo_producto'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 9){ //info de la tabla del crud de tipo de productos
		$i = 0;
		$sql = "SELECT id_medida, P.nombre_producto, medida FROM medidas_producto M, productos P WHERE M.id_producto = P.id_producto AND estado_medida = 1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array( //orden establecido previamente
				0 => $datos['id_medida'],
				1 => $datos['nombre_producto'],
				2 => $datos['medida'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}


	if($_POST['sql'] == 10){
		$i = 0;
		$sql = "SELECT id_foto_producto, P.nombre_producto, foto_producto FROM productos P, fotos_productos FP WHERE estado_foto_producto = 1 AND P.id_producto = FP.id_producto";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_producto'], 
				1 => $datos['foto_producto'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 21){
		$i = 0;
		$sql = "SELECT * FROM proveedores WHERE estado_proveedor=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_proveedor'],
				1 => $datos['proveedor'],
				2 => $datos['direccion_proveedor'], 
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 22){
		$i = 0;
		$sql = "SELECT * FROM equipos WHERE estado_equipo=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_equipo'], 
				1 => $datos['equipo'], 
				2 => $datos['costo_click_equipo'],
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

	if($_POST['sql'] == 23){
		$i = 0;
		$sql = "SELECT * FROM mano_obra WHERE estado_obra=1";
		foreach ($con->query($sql) as $datos) {
			$valores[$i] = array(
				0 => $datos['id_actividad'], 
				1 => $datos['actividad'], 
				2 => $datos['costo_hora'],
				3 => $datos['descripcion_actividad']
			);
			$i = $i + 1;
		}
		echo json_encode($valores);
		$con = null;
	}

?>